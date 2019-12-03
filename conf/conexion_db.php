<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'carlos');
define('DB_PASS', 'secret');
define('DB_NAME', 'compromiso_escolar');
define('DB_PORT', '3306');

function RetornaNameDB() {
    $dir = dirname(__FILE__);
    $dir = explode("/", $dir);
    $dir = $dir[count($dir) - 2];
    $nombre_db = "";

    if (strcasecmp($dir, "compromiso-escolar") == 0) {
        $nombre_db = "compromiso_escolar";
    } else {
        $nombre_db = "compromiso_escolar_etapa2";
    }
    echo '<script type="text/javascript"> console.log("'.$nombre_db.'"); </script>'; 
    return $nombre_db;
}

function connectDB() {
    try {
        if($_SERVER['SERVER_ADDR'] == '::1'){
            $conn = new PDO(
                "mysql:host=localhost; dbname=compromiso_escolar;", 
                "carlos",
                "secret"
            );      
            $conn->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
            return $conn;
        } elseif($_SERVER['SERVER_ADDR'] == '167.71.191.60') {
            $conn = new PDO(
                "mysql:host=167.71.191.60; dbname=compromiso_escolar;charset=UTF8", 
                "root", 
                "92mbx6#p^wq@hac^"
            ); 
            $conn->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
            return $conn;
        }
    } catch (Exception $e) {
        exit ("Excepción capturada: ".$e->getMessage());
    }
}

function connectDB_demos() {
    try {
        if($_SERVER['SERVER_ADDR'] == '::1') {
            echo('local');
            $conn = new PDO(
                "mysql:host=localhost:3306; dbname=compromiso_escolar;charset=UTF8",
                "carlos",
                "secret"
            );
            $conn->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
            return $conn;
        } elseif($_SERVER['SERVER_ADDR'] == '167.71.191.60') {
            echo('otro');
            $conn = new PDO(
                "mysql:host=167.71.191.60; dbname=compromiso_escolar;charset=UTF8",
                "root",
                "92mbx6#p^wq@hac^"
            );
            $conn->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
            return $conn;
        }
    } catch (Exception $e) {
        exit ("Excepción capturada: ".$e->getMessage());
    }
}