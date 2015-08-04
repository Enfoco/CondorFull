<?php 


session_start();
$usuario = $_SESSION['razon'];

if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}
// connection with the database 
$dbhost = "localhost"; 
$dbuser = "u746668508_condo"; 
$dbpass = "Elguru47"; 
$dbname = "u746668508_condo"; 

mysql_connect($dbhost,$dbuser,$dbpass); 
mysql_select_db($dbname); 

// require the PHPExcel file 
require 'PHPExcel.php'; 

// simple query 

$query = "SELECT T2.razon, T3.descripcion, T4.nombre, T1.ordenTrabajo, T1.autorizado, T1.horometro, T1.fechasolicitud, T1.fechaatencion, T1.fechainicio, T1.fechafin, T5.detalle, T1.fechaentrega, T1.tiempoatencion, T1.tiempoimpro, T1.informacion
FROM mantecorre T1
inner join usuario T2 ON T1.usuario_id = T2.id
inner join equipo T3 ON T1.equipo_id = T3.id
inner join empleado T4 ON T1.empleado_id = T4.id
inner join actividad T5 ON T1.actividad_id = T5.id 
where razon = '$usuario'
ORDER by ordenTrabajo DESC"; 
$headings = array('Razon Social', 'Equipo', 'Mecanico Encargado','Orden de Servicio', 'Autorizado Por', 'Horometro', 'Fecha Solicitud', 'Fecha Atención En Sitio' , 'Fecha Inicio Actividad', 'Fecha Fin Actividad', 'Actividad Realizada','Fecha De Entrega', 'Tiempo En Actividad', 'Tiempo Improductivo', 'Reporte' ); 

if ($result = mysql_query($query) or die(mysql_error())) { 
    // Create a new PHPExcel object 
    $objPHPExcel = new PHPExcel(); 
    $objPHPExcel->getActiveSheet()->setTitle('List of Users'); 

    $rowNumber = 1; 
    $col = 'A'; 
    foreach($headings as $heading) { 
       $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading); 
       $col++; 
    } 

    // Loop through the result set 
    $rowNumber = 2; 
    while ($row = mysql_fetch_row($result)) { 
       $col = 'A'; 
       foreach($row as $cell) { 
          $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell); 
          $col++; 
       } 
       $rowNumber++; 
    } 

    // Freeze pane so that the heading line won't scroll 
    $objPHPExcel->getActiveSheet()->freezePane('A2'); 

    // Save as an Excel BIFF (xls) file 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 

   header('Content-Type: application/vnd.ms-excel'); 
   header('Content-Disposition: attachment;filename="mCorrectivoTotal.xls"'); 
   header('Cache-Control: max-age=0'); 

   $objWriter->save('php://output'); 
   exit(); 
} 
echo 'a problem has occurred... no data retrieved from the database'; 


 ?>