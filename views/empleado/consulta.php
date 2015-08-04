<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>

<?php
include "../../model/db.php";

 $sql = $PDO->prepare('SELECT id, upper(nombre) as nombre ,upper(apellido) as apellido, telefono,direccion FROM empleado');
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
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>

 <?php

foreach ($resultado as $row) {

      echo '<tr>';
         echo '<td >'.utf8_encode ($row['id']).'</td>';
         echo '<td>'.utf8_encode ($row['nombre']).'</td>';
         echo '<td>'.utf8_encode ($row['apellido']).'</td>';
         echo '<td>'.utf8_encode ($row['telefono']).'</td>';
           

          echo '<td><a class="btn btn-xs btn-primary" href="update.php?id='. $row['id'] . '">Up</a>
                   <a class="btn btn-xs btn-danger" href="delete.php?id='. $row['id'] . '">Del</a>
              </td>';
        echo '</tr>';
    }
  ?>
  <tbody>
</table>