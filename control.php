<?php
$_DIR = __DIR__;
$_DIR_CRT = $_DIR . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR;
$_DIR_VIW = $_DIR . DIRECTORY_SEPARATOR . "views"       . DIRECTORY_SEPARATOR;
$_DIR_DAT = $_DIR . DIRECTORY_SEPARATOR . "data"        . DIRECTORY_SEPARATOR;
$_DIR_OBJ = $_DIR . DIRECTORY_SEPARATOR . "obj"         . DIRECTORY_SEPARATOR;
$_DIR_CFG = $_DIR . DIRECTORY_SEPARATOR . "config"      . DIRECTORY_SEPARATOR;

//Conexion a BD
// include_once($_DIR_CFG . "cfg_conn.php");
// Mod guarda datos de sesión en variables para su uso
// include_once($_DIR_BIN."mod_session.php");

header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

// rewrite ^/(.*)$ /control.php?url=$1 last;
include_once($_DIR_CFG.'debug.php');

if (isset($_GET["url"])) {
    $url = trim($_GET["url"]);

    if (strpos($url, ".") != false) {
        // echo "contains dot<br>";
        $url = explode(".", $url);
        $location = strtolower($url[0]);

        if ($location == "index") {
            // echo "ok index<br>";
            include_once('index.php');
        } else {
            $location = 'c_'.$location;
            // echo "no index<br>";
            if (file_exists("$_DIR_CRT$location.php")) {
                $location = "$_DIR_CRT"."$location.php";
                include_once($location);
            } else {
                // echo "no existe archivo<br>";
                include_once('index.php');
            }
        }
    } else {
        // echo "no contains dot<br>";
        $location = $url;
        if ($location == "index") {
            // echo "ok index<br>";
            include_once('index.php');
        } else {
            $location = 'c_'.$location;
            // echo "no index<br>";
            if (file_exists("$_DIR_CRT$location.php")) {
                $location = "$_DIR_CRT"."$location.php";
                include_once($location);
            } else {
                // echo "no existe archivo<br>";
                include_once('index.php');
            }
        }
    }
} else {
    include_once('index.php');
}

exit(0);
