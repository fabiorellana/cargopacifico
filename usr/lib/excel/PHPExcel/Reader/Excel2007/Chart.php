<?php
/**
 * PHPExcel
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
 * @category    PHPExcel
 * @package        PHPExcel_Reader_Excel2007
 * @copyright    Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license        http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version        ##VERSION##, ##DATE##
 */

/**
 * PHPExcel_Reader_Excel2007_Chart
 *
 * @category    PHPExcel
 * @package        PHPExcel_Reader_Excel2007
 * @copyright    Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_Excel2007_Chart
{
    private static function getAttribute($component, $name, $format)
    {
        $attributes = $component->attributes();
        if (isset($attributes[$name])) {
            if ($format == 'string') {
                return (string) $attributes[$name];
            } elseif ($format == 'integer') {
                return (integer) $attributes[$name];
            } elseif ($format == 'boolean') {
                return (boolean) ($attributes[$name] === '0' || $attributes[$name] !== 'true') ? false : true;
            } else {
                return (float) $attributes[$name];
            }
        }
        return null;
    }


    private static function readColor($color, $background = false)
    {
        if (isset($color["rgb"])) {
            return (string)$color["rgb"];
        } elseif (isset($color["indexed"])) {
            return PHPExcel_Style_Color::indexedColor($color["indexed"]-7, $background)->getARGB();
        }
    }

    public static function readChart($chartElements, $chartName)
    {
        $namespacesChartMeta = $chartElements->getNamespaces(true);
        $chartElementsC = $chartElements->children($namespacesChartMeta['c']);

        $XaxisLabel = $YaxisLabel = $legend = $title = null;
        $dispBlanksAs = $plotVisOnly = null;

        foreach ($chartElementsC as $chartElementKey => $chartElement) {
            switch ($chartElementKey) {
                case "chart":
                    foreach ($chartElement as $chartDetailsKey => $chartDetails) {
                        $chartDetailsC = $chartDetails->children($namespacesChartMeta['c']);
                        switch ($chartDetailsKey) {
                            case "plotArea":
                                $plotAreaLayout = $XaxisLable = $YaxisLable = null;
                                $plotSeries = $plotAttributes = array();
                                foreach ($chartDetails as $chartDetailKey => $chartDetail) {
                                    switch ($chartDetailKey) {
                                        case "layout":
                                            $plotAreaLayout = self::chartLayoutDetails($chartDetail, $namespacesChartMeta, 'plotArea');
                                            break;
                                        case "catAx":
                                            if (isset($chartDetail->title)) {
                                                $XaxisLabel = self::chartTitle($chartDetail->title->children($namespacesChartMeta['c']), $namespacesChartMeta, 'cat');
                                            }
                                            break;
                                        case "dateAx":
                                            if (isset($chartDetail->title)) {
                                                $XaxisLabel = self::chartTitle($chartDetail->title->children($namespacesChartMeta['c']), $namespacesChartMeta, 'cat');
                                            }
                                            break;
                                        case "valAx":
                                            if (isset($chartDetail->title)) {
                                                $YaxisLabel = self::chartTitle($chartDetail->title->children($namespacesChartMeta['c']), $namespacesChartMeta, 'cat');
                                            }
                                            break;
                                        case "barChart":
                                        case "bar3DChart":
                                            $barDirection = self::getAttribute($chartDetail->barDir, 'val', 'string');
                                            $plotSer = self::chartDataSeries($chartDetail, $namespacesChartMeta, $chartDetailKey);
                                            $plotSer->setPlotDirection($barDirection);
                                            $plotSeries[] = $plotSer;
                                            $plotAttributes = self::readChartAttributes($chartDetail);
                                            break;
                                        case "lineChart":
                                        case "line3DChart":
                                            $plotSeries[] = self::chartDataSeries($chartDetail, $namespacesChartMeta, $chartDetailKey);
                                            $plotAttributes = self::readChartAttributes($chartDetail);
                                            break;
                                        case "areaChart":
                                        case "area3DChart":
                                            $plotSeries[] = self::chartDataSeries($chartDetail, $namespacesChartMeta, $chartDetailKey);
                                            $plotAttributes = self::readChartAttributes($chartDetail);
                                            break;
                                        case "doughnutChart":
                                        case "pieChart":
                                        case "pie3DChart":
                                            $explosion = isset($chartDetail->ser->explosion);
                                            $plotSer = self::chartDataSeries($chartDetail, $namespacesChartMeta, $chartDetailKey);
                                            $plotSer->setPlotStyle($explosion);
                                            $plotSeries[] = $plotSer;
                                            $plotAttributes = self::readChartAttributes($chartDetail);
                                            break;
                                        case "scatterChart":
                          