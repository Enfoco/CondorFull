<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>


<?php
include "../../model/db.php";

 $sql = $PDO->prepare('SELECT T1.id, T2.razon, T1.descripcion, T1.codigo, T1.marca, T1.modelo, T1.serie,T1.mastil, T5.detalle, T6.detalle
FROM equipo T1
inner join usuario T2 ON T1.usuario_id = T2.id
inner join capacidad T5 ON T1.capacidad_id = T5.id
inner join etapa T6 ON T1.etapa_id = T6.id');
    $sql->execute();
    $resultado = $sql->fetchAll();

?>

<link type="text/css" href="../../public/css/tables/bootstrap.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="../../public/js/tables/config_datatable_api.js"></script>

<div class="container">
<table cellpadding="0" cellspacing="5" border="0" class="bordered-table zebra-striped" id="registro">
  <thead>
    <tr>
      <th>N&deg;</th>
        <th>Razon/Nombre</th>
        <th>Descripcion</th>
        <th>Codigo</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Serie</th>
         <th>Mastil</th>
        <th>Capacidad de Carga</th>
        <th>Etapa</th>
        <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php

foreach ($resultado as $row) {

      echo '<tr>';
      echo '<td >'.utf8_encode ($row['id']).'</td>';
      echo '<td>'.utf8_encode ($row['razon']).'</td>';
      echo '<td >'.utf8_encode ($row['descripcion']).'</td>';
      echo '<td>'.utf8_encode ($row['codigo']).'</td>';
      echo '<td >'.utf8_encode ($row['marca']).'</td>';
      echo '<td>'.utf8_encode ($row['modelo']).'</td>';
      echo '<td >'.utf8_encode ($row['serie']).'</td>';
      echo '<td>'.utf8_encode ($row['mastil']).'</td>';
      echo '<td >'.utf8_encode ($row['detalle']).'</td>';
      echo '<td>'.utf8_encode ($row['detalle']).'</td>';
           

          echo '<td><a class="btn btn-xs btn-primary" href="update.php?id='. $row['id'] . '">Up</a>&nbsp;
                   <a class="btn btn-xs btn-danger" href="delete.php?id='. $row['id'] . '">Del</a>
              </td>';
        echo '</tr>';
    }
  ?>
  <tbody>
</table>








