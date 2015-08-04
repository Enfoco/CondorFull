<?php
$host = "localhost";
$user = "root";
$clave = "Elguru47";
$datbase = "cargar";
$conectar=mysql_connect($host,$user,$clave);
mysql_select_db($datbase, $conectar);
?>