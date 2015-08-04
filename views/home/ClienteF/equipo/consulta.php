<?php 

session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>


<?php
$cliente = $_SESSION['razon'];
include "../../../../model/db.php";

 $sql = $PDO->prepare("SELECT T1.id, T2.razon, T1.descripcion, T1.codigo, T1.marca, T1.modelo, T1.serie, T7.detalle, T1.mastil
FROM equipo T1
inner join usuario T2 ON T1.usuario_id = T2.id
inner join tipomotor T7 ON T1.tipoMotor_id = T7.id
where razon = '$cliente';");
    $sql->execute();
    $resultado = $sql->fetchAll();

?>
<link type="text/css" href="../../../../public/css/tables/bootstrap.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="../../../../public/js/tables/config_datatable_api.js"></script>

<div class="container">
<table cellpadding="0" cellspacing="5" border="0" class="bordered-table zebra-striped" id="registro">
  <thead>
    <tr>
      <th>N&deg;</th>
      <th>Equipo</th>
      <th>Código</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Serie</th>
      <th>Motor</th>
      <th>Mastil</th>

      
    
    </tr>
  </thead>
  <tbody>
  <?php

foreach ($resultado as $row) {

      echo '<tr>';
      echo '<td >'.utf8_encode ($row['id']).'</td>';
      echo '<td>'.utf8_encode ($row['descripcion']).'</td>';
      echo '<td>'.utf8_encode ($row['codigo']).'</td>';
     echo '<td>'.utf8_encode ($row['marca']).'</td>';
     echo '<td>'.utf8_encode ($row['modelo']).'</td>';
      echo '<td>'.utf8_encode ($row['serie']).'</td>';
    echo '<td>'.utf8_encode ($row['detalle']).'</td>';
        echo '<td>'.utf8_encode ($row['mastil']).'</td>';

           

         
    }
  ?>
  <tbody>
</table>


