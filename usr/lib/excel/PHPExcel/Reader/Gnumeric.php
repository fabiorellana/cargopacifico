<?php

/** PHPExcel root directory */
if (!defined('PHPEXCEL_ROOT')) {
    /**
     * @ignore
     */
    define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
    require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}

/**
 * PHPExcel_Reader_Gnumeric
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Reader
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
class PHPExcel_Reader_Gnumeric extends PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader
{
    /**
     * Formats
     *
     * @var array
     */
    private $styles = array();

    /**
     * Shared Expressions
     *
     * @var array
     */
    private $expressions = array();

    private $referenceHelper = null;

    /**
     * Create a new PHPExcel_Reader_Gnumeric
     */
    public function __construct()
    {
        $this->readFilter     = new PHPExcel_Reader_DefaultReadFilter();
        $this->referenceHelper = PHPExcel_ReferenceHelper::getInstance();
    }

    /**
     * Can the current PHPExcel_Reader_IReader read the file?
     *
     * @param     string         $pFilename
     * @return     boolean
     * @throws PHPExcel_Reader_Exception
     */
    public function canRead($pFilename)
    {
        // Check if file exists
        if (!file_exists($pFilename)) {
            throw new PHPExcel_Reader_Exception("Could not open " . $pFilename . " for reading! File does not exist.");
        }

        // Check if gzlib functions are available
        if (!function_exists('gzread')) {
            throw new PHPExcel_Reader_Exception("gzlib library is not enabled");
        }

        // Read signature data (first 3 bytes)
        $fh = fopen($pFilename, 'r');
        $data = fread($fh, 2);
        fclose($fh);

        if ($data != chr(0x1F).chr(0x8B)) {
            return false;
        }

        return true;
    }

    /**
     * Reads names of the worksheets from a file, without parsing the whole file to a PHPExcel object
     *
     * @param     string         $pFilename
     * @throws     PHPExcel_Reader_Exception
     */
    public function listWorksheetNames($pFilename)
    {
        // Check if file exists
        if (!file_exists($pFilename)) {
            throw new PHPExcel_Reader_Exception("Could not open " . $pFilename . " for reading! File does not exist.");
        }

        $xml = new XMLReader();
        $xml->xml($this->securityScanFile('compress.zlib://'.realpath($pFilename)), null, PHPExcel_Settings::getLibXmlLoaderOptions());
        $xml->setParserProperty(2, true);

        $worksheetNames = array();
        while ($xml->read()) {
            if ($xml->name == 'gnm:SheetName' && $xml->nodeType == XMLReader::ELEMENT) {
                $xml->read();    //    Move onto the value node
                $worksheetNames[] = (string) $xml->value;
            } elseif ($xml->name == 'gnm:Sheets') {
                //    break out of the loop once we've got our sheet names rather than parse the entire file
                break;
            }
        }

        return $worksheetNames;
    }

    /**
     * Return worksheet info (Name, Last Column Letter, Last Column Index, Total Rows, Total Columns)
     *
     * @param   string     $pFilename
     * @throws   PHPExcel_Reader_Exception
     */
    public function listWorksheetInfo($pFilename)
    {
        // Check if file exists
        if (!file_exists($pFilename)) {
            throw new PHPExcel_Reader_Exception("Could not open " . $pFilename . " for reading! File does not exist.");
        }

        $xml = new XMLReader();
        $xml->xml($this->securityScanFile('compress.zlib://'.realpath($pFilename)), null, PHPExcel_Settings::getLibXmlLoaderOptions());
        $xml->setParserProperty(2, true);

        $worksheetInfo = array();
        while ($xml->read()) {
            if ($xml->name == 'gnm:Sheet' && $xml->nodeType == XMLReader::ELEMENT) {
                $tmpInfo = array(
                    'worksheetName' => '',
                    'lastColumnLetter' => 'A',
                    'lastColumnIndex' => 0,
                    'totalRows' => 0,
                    'totalColumns' => 0,
                );

                while ($xml->read()) {
                    if ($xml->name == 'gnm:Name' && $xml->nodeType == XMLReader::ELEMENT) {
                        $xml->read();    //    Move onto the value node
                        $tmpInfo['worksheetName'] = (string) $xml->value;
                    } elseif ($xml->name == 'gnm:MaxCol' && $xml->nodeType == XMLReader::ELEMENT) {
                        $xml->read();    //    Move onto the value node
                        $tmpInfo['lastColumnIndex'] = (int) $xml->value;
                        $tmpInfo['totalColumns'] = (int) $xml->value + 1;
                    } elseif ($xml->name == 'gnm:MaxRow' && $xml->nodeType == XMLReader::ELEMENT) {
                        $xml->read();    //    Move onto the value node
                        $tmpInfo['totalRows'] = (int) $xml->value + 1;
                        break;
                    }
                }
                $tmpInfo['lastColumnLetter'] = PHPExcel_Cell::stringFromColumnIndex($tmpInfo['lastColumnIndex']);
                $worksheetInfo[] = $tmpInfo;
            }
        }

        return $worksheetInfo;
    }

    private function gzfileGetContents($filename)
    {
        $file = @gzopen($filename, 'rb');
        if ($file !== false) {
            $data = '';
            while (!gzeof($file)) {
                $data .= gzread($file, 1024);
            }
            gzclose($file);
        }
        return $data;
    }

    /**
     * Loads PHPExcel from file
     *
     * @param     string         $pFilename
     * @return     PHPExcel
     * @throws     PHPExcel_Reader_Exception
     */
    public function load($pFilename)
    {
        // Create new PHPExcel
        $objPHPExcel = new PHPExcel();

        // Load into this instance
        return $this->loadIntoExisting($pFilename, $objPHPExcel);
    }

    /**
     * Loads PHPExcel from file into PHPExcel instance
     *
     * @param     string         $pFilename
     * @param    PHPExcel    $objPHPExc