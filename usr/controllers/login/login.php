<?php
session_start();
require("../../model/login/class.php");
$login= new Login();
$rutt=($_POST['rut']);
$passs=($_POST['pass']);
$true = $login->login($rutt,$passs);

if (!isset($_SESSION['referer'])){
	$referer = "usr/index.php";
}else{
	$referer = $_SESSION['referer'];
}
if($true==true){
        echo '<script>window.location="'.$referer.'"</script>';
        $_SESSION['referer'] = "";
    }
    else
    {
        echo $true;
    }

