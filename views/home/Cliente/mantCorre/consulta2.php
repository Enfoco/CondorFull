<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>


<?php

$cliente = $_SESSION['razon'];
include "../../../../model/db.php";

 $sql = $PDO->prepare("SELECT  T1.id, T2.razon, T3.marca, T3.descripcion, T4.nombre, T1.ordenTrabajo, T1.autorizado, T1.horometro, T1.fechasolicitud, T1.fechaatencion, T1.fechainicio,  T1.fechaentrega, T1.tiempoatencion, T1.tiempoimpro, T1.reporcliente, T1.actividad, T1.insumos
FROM mantecorre T1
inner join usuario T2 ON T1.usuario_id = T2.id
inner join equipo T3 ON T1.equipo_id = T3.id
inner join empleado T4 ON T1.empleado_id = T4.id

WHERE razon = '$cliente'
ORDER BY  id DESC"  );
    $sql->execute();
    $resultado = $sql->fetchAll();

?>

<link type="text/css" href="../../../../public/css/tables/bootstrap.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="../../../../public/js/tables/config_datatable_api.js"></script>


<table cellpadding="0" cellspacing="5" border="0" class="bordered-table zebra-striped" id="registro">
  <thead>
    <tr>
        <th>Cliente</th>
        <th>Marca</th>
        <th>Equipo</th>
        <th>Mecanico</th>
        <th>Orden Servicio</th>
        <th>Autorizado</th>
        <th>Horometro</th>
        <th>Informacion Daño</th>
        <th>Atencion En Sitio</th>
        <th>Inicio</th>
        <th>Fecha Entrega</th>
        <th>Tiempo Atención</th>
        <th>Tiempo Improductivo</th>
        <th>Reporte Cliente</th>
        <th>Actividad</th>
        <th>Insumos</th>
        <th>Acciones </th>
    </tr>
  </thead>
  <tbody>
  <?php

foreach ($resultado as $row) {

      echo '<tr>';
        echo '<td>'.utf8_encode ($row['razon']).'</td>';
echo '<td >'.utf8_encode ($row['marca']).'</td>';
       echo '<td >'.utf8_encode ($row['descripcion']).'</td>';
      echo '<td>'.utf8_encode ($row['nombre']).'</td>';
       echo '<td >'.utf8_encode ($row['ordenTrabajo']).'</td>';
      echo '<td>'.utf8_encode ($row['autorizado']).'</td>';
       echo '<td >'.utf8_encode ($row['horometro']).'</td>';
      echo '<td>'.utf8_encode ($row['fechasolicitud']).'</td>';
       echo '<td >'.utf8_encode ($row['fechaatencion']).'</td>';
      echo '<td>'.utf8_encode ($row['fechainicio']).'</td>';
        echo '<td >'.utf8_encode ($row['fechaentrega']).'</td>';
      echo '<td>'.utf8_encode ($row['tiempoatencion']).'</td>';
       echo '<td >'.utf8_encode ($row['tiempoimpro']).'</td>';
        echo '<td >'.utf8_encode ($row['reporcliente']).'</td>';
      echo '<td >'.utf8_encode ($row['actividad']).'</td>';
        echo '<td >'.utf8_encode ($row['insumos']).'</td>';
 
           

          echo '<td><a  href="update.php?id='. $row['id'] . '"></a>
                   <a  href="delete.php?id='. $row['id'] . '"></a>
              </td>';
        echo '</tr>';
    }
  ?>
  <tbody>
</table>