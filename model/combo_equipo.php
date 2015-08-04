<?php
$host = "localhost";
$user = "root";
$clave = "Elguru47";
$datbase = "cargar";
$conectar=mysql_connect($host,$user,$clave);

mysql_select_db($datbase, $conectar);
$salida="";
$id_pais=$_POST["elegido"];
// construimos el combo de ciudades deacuerdo al pais seleccionado
$combog = mysql_query("SELECT * FROM equipo WHERE usuario_id=$id_pais");
  while($sql_p = mysql_fetch_row($combog))
  {
   $salida.= "<option value='".$sql_p[0]."'>".$sql_p[3]."</option>";
  }  
echo $salida;
?>