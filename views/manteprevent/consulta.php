<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>


<?php
include "../../model/db.php";

 $sql = $PDO->prepare("SELECT T1.id, T2.razon, T3.marca, T3.descripcion, T4.detalle, T5.nombre, T1.ordenTrabajo, T1.horometro, T1.autorizado,  T1.fechainicio, T1.duracion,  T1.entregaequipo, T1.proximomante, T1.comentario, T1.insumos
FROM mantepre T1
inner join usuario T2 ON T1.usuario_id = T2.id
inner join equipo T3 ON T1.equipo_id = T3.id
inner join frecuenciainterv T4 ON T1.frecuenciainterv_id = T4.id
inner join empleado T5 ON T1.empleado_id = T5.id; ORDER BY  id DESC"  );
    $sql->execute();
    $resultado = $sql->fetchAll();

?>

<link type="text/css" href="../../public/css/tables/bootstrap.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="../../public/js/tables/config_datatable_api.js"></script>


<table cellpadding="0" cellspacing="5" border="0" class="bordered-table zebra-striped" id="registro">
  <thead>
    <tr>
        <th>Cliente</th>
        <th>Equipo</th>
        <th>Marca</th>
        <th>Frecuencia</th>
        <th>Mecanico</th>
        <th>Orden de Servicio</th>
        <th>Horometro</th>
        <th>Autorizado Por</th>
        <th>HoraInicio</th>
        <th>Duracion</th>
        <th>Fecha Entrega</th>
        <th>Proximo Manto</th>
        <th>Insumos</th>
        <th>Reporte Mecanico </th>
         <th>Acciones </th>
    </tr>
  </thead>
  <tbody>
  <?php

foreach ($resultado as $row) {

      echo '<tr>';
        echo '<td>'.utf8_encode ($row['razon']).'</td>';
       echo '<td >'.utf8_encode ($row['descripcion']).'</td>';
       echo '<td >'.utf8_encode ($row['marca']).'</td>';
      echo '<td>'.utf8_encode ($row['detalle']).'</td>';
       echo '<td >'.utf8_encode ($row['nombre']).'</td>';
      echo '<td>'.utf8_encode ($row['ordenTrabajo']).'</td>';
       echo '<td >'.utf8_encode ($row['horometro']).'</td>';
      echo '<td>'.utf8_encode ($row['autorizado']).'</td>';
       echo '<td >'.utf8_encode ($row['fechainicio']).'</td>';
       echo '<td>'.utf8_encode ($row['duracion']).'</td>';
       echo '<td >'.utf8_encode ($row['entregaequipo']).'</td>';
      echo '<td>'.utf8_encode ($row['proximomante']).'</td>';
       echo '<td>'.utf8_encode ($row['insumos']).'</td>';
       echo '<td >'.utf8_encode ($row['comentario']).'</td>';
 
 
           

          echo '<td><a class="btn btn-xs btn-primary" href="update.php?id='. $row['id'] . '">Up</a>
                   <a class="btn btn-xs btn-danger" href="delete.php?id='. $row['id'] . '">Del</a>
              </td>';
        echo '</tr>';
    }
  ?>
  <tbody>
</table>