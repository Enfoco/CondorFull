<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>
<?php
require '../../model/functions.php';
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="../../public/css/menu.css">

<script type="text/javascript" src="../../public/libs/jquery-loader.js"></script>
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="../../libs/jquery.smartmenus.js"></script>
<!-- SmartMenus jQuery init -->
<script type="text/javascript">
  $(function() {
    $('#main-menu').smartmenus({
      subMenusSubOffsetX: 1,
      subMenusSubOffsetY: -8
    });
  });
</script>

<!-- SmartMenus core CSS (required) -->
<link href="../../public/css/sm-core-css.css" rel="stylesheet" type="text/css" />

<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
<link href="../../public/css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />

<!-- #main-menu config - instance specific stuff not covered in the theme -->
<style type="text/css">
  #main-menu {
    position:relative;
    z-index:9999;
    width:auto;
  }
  #main-menu ul {
    width:12em; /* fixed width only please - you can use the "subMenusMinWidth"/"subMenusMaxWidth" script options to override this if you like */
  }
</style>
<!-- YOU DO NOT NEED THIS - demo page content styles -->
<link href="../../public/libs/demo-assets/demo.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../public/libs/demo-assets/themes-switcher.js"></script>

 
    <head>
        <meta charset="utf-8">
        <!-- HOJAS DE ESTILO -->
        <link rel="stylesheet" type="text/css" href="../../public/css/tables/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../public/css/tables/DT_bootstrap.css">
        <script type="text/javascript" src="../../public/js/tables/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="../../public/js/tables/mostrar_lista.js"></script>
        <script type="text/javascript" language="javascript" src="../../public/js/tables/jquery.dataTables.js"></script>
   </head>
    <body>
  <div> <img src="../../public/img/logoCargar.png" alt="Imagen genérica" /></div>
    <?php include '../includes/menu.inc'; ?>
    <br />
        <hr>

<div class="panel panel-primary">
Informe Actividades Correctivas Por Equipo
</div>

<p><a class="btn btn-xs btn-success" href="reportCorre.php">Volver</a></p>


<table width="100%" class="display" id="example" cellspacing="1">
<?php  
//tomamos los datos del archivo conexion.php  
 
$link = Conectarse();  
//se envia la consulta  
$result = mysql_query("SELECT T1.id, T3.descripcion, T4.nombre, T1.ordenTrabajo, T1.autorizado, T1.horometro, T1.fechasolicitud, T1.fechaatencion, T1.fechainicio, T1.fechaentrega, T1.tiempoatencion, T1.tiempoimpro, T1.reporcliente, T1.actividad, T1.insumos
FROM mantecorre T1
inner join equipo T3 ON T1.equipo_id = T3.id
inner join empleado T4 ON T1.empleado_id = T4.id
where equipo_id= '$id';", $link);  

//se despliega el resultado  

echo "<tr>";  
echo "<th>Equipo</th>";  
echo "<th>Mecanico</th>";  
echo "<th>Orden de Servicio</th>";
echo "<th>Autorizado</th>";   
echo "<th>Horometro</th>"; 
echo "<th>Informacion Daño</th>"; 
echo "<th>Atencion En Sitio</th>"; 
echo "<th>Inicio </th>"; 
echo "<th>Entrega Equipo</th>"; 
echo "<th>Tiempo Atencion</th>";
echo "<th>FTiempo Improductivo</th>";
echo "<th>Reporte Cliente</th>";
echo "<th>Actividad</th>"; 
echo "<th>Insumos</th>"; 
echo "<th>Informe</th>";

echo "</tr>";  
while ($row = mysql_fetch_row($result)){   
    echo "<tr>";  
    echo "<td>$row[1]></td>";  
    echo "<td>$row[2]</td>";  
    echo "<td>$row[3]</td>"; 
    echo "<td>$row[4]</td>";  
    echo "<td>$row[5]</td>";  
    echo "<td>$row[6]</td>"; 
    echo "<td>$row[7]</td>";   
    echo "<td>$row[8]</td>";  
    echo "<td>$row[9]</td>"; 
    echo "<td>$row[10]</td>";   
    echo "<td>$row[11]</td>";  
    echo "<td>$row[12]</td>"; 
    echo "<td>$row[13]</td>"; 
    echo "<td>$row[14]</td>"; 


    echo "</tr>";  
}  
 
?> 
    </table>




  <footer>
        <div class="footer">
        <div class="container-fluid"  id="myfooter">
            <div class="row">
                <div class="col-md-12">
                    <p class="copy">Todos Los Derechos Reservados &copy; CARGAR S:A</p>
                    <p class="copy"><?=date('Y')?></p>
                </div>
            </div>
        </div>
    </div>
      </footer>
    </body>

  <script type="text/javascript" language="javascript" src="../../public/js/jquery.common.js"></script>

<script src="http://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/jqueryui/dataTables.jqueryui.js"></script>






<script>
	$(document).ready(function() {

    $('#example').dataTable();

} );

</script>


</html>