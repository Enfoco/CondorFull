<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>

<?php
require "../../model/PDO_Pagination.php";
require '../../model/db.php';

$pagination = new PDO_Pagination($PDO);

$search = null;
if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
{
$search = htmlspecialchars($_REQUEST["search"]);
$pagination->param = "&search=$search";
$pagination->rowCount("SELECT * FROM mantecorre WHERE ordenTrabajo LIKE '%$search%' ");
$pagination->config(3, 5);
$sql = "SELECT * FROM mantecorre WHERE ordenTrabajo LIKE '%$search%' ORDER BY id ASC LIMIT $pagination->start_row, $pagination->max_rows";
$query = $PDO->prepare($sql);
$query->execute();
$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}
}
else
{
$pagination->rowCount("SELECT T1.id, T2.razon, T3.descripcion, T4.detalle, T5.nombre, T1.ordenTrabajo, T1.horometro, T1.autorizado,  T1.fechainicio, T1.fechafin, T1.entregaequipo, T1.proximomante, T1.comentario
FROM mantepre T1
inner join usuario T2 ON T1.usuario_id = T2.id
inner join equipo T3 ON T1.equipo_id = T3.id
inner join frecuenciainterv T4 ON T1.empleado_id = T4.id
inner join empleado T5 ON T1.empleado_id = T5.id");
$pagination->config(3, 5);
$sql = ("SELECT T1.id, T2.razon, T3.descripcion, T4.detalle, T5.nombre, T1.ordenTrabajo, T1.horometro, T1.autorizado,  T1.fechainicio, T1.fechafin, T1.entregaequipo, T1.proximomante, T1.comentario
FROM mantepre T1
inner join usuario T2 ON T1.usuario_id = T2.id
inner join equipo T3 ON T1.equipo_id = T3.id
inner join frecuenciainterv T4 ON T1.empleado_id = T4.id
inner join empleado T5 ON T1.empleado_id = T5.id
ORDER BY id ASC LIMIT $pagination->start_row, $pagination->max_rows");
$query = $PDO->prepare($sql);
$query->execute();
$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}
}
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
    <body >
  <div> <img src="../../public/img/logoCargar.png" alt="Imagen genérica" /></div>
    <?php include '../includes/menu.inc'; ?>
    <br>
    <hr>
    

<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        

<div id="estatico">
 <div class="input-group col-xs-2">

                    <input type="text" class="form-control"  id="ejemplo_email_1"placeholder="Search" name="search" value="<?php echo $search ?>">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
</div>

<br/>
<br/>

</form>
<br><br>
    <center>

    
<p><a class="btn btn-xs btn-success" href="create.php">Crear Nuevo</a></p>
<div class="panel panel-default" style="width: 90%" >
  <div class="panel-heading">Listado de Mantenimientos Preventivos</div>
   <table class="table table-hover">
    <tr>
        <th>id</th>
        <th>Cliente</th>
        <th>Equipo</th>
        <th>Frecuencia</th>
        <th>Mecanico</th>
        <th>Orden Servicio</th>
        <th>Horometro</th>
        <th>Autorizado</th>
        <th>Fecha Incio</th>
        <th>Fecha Fin</th>
        <th>Fecha Entrega</th>
        <th>Proximo Mantenimiento</th>
        <th>Informe</th>
       <th>Acciones </th>
        
    </tr>
    <?php
    foreach($model as $row)
    {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['razon']."</td>";
        echo "<td>".$row['descripcion']."</td>";
        echo "<td>".$row['detalle']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['ordenTrabajo']."</td>";
        echo "<td>".$row['horometro']."</td>";
        echo "<td>".$row['autorizado']."</td>";
        echo "<td>".$row['fechainicio']."</td>";
        echo "<td>".$row['fechafin']."</td>";
        echo "<td>".$row['entregaequipo']."</td>";
        echo "<td>".$row['proximomante']."</td>";
       echo "<td>".$row['comentario']."</td>";



       

        echo '<td>

                  <a class="btn btn-xs btn-primary" href="update.php?id='. $row['id'] . '">Update &nbsp;</a>
                  <a class="btn btn-xs btn-danger" href="delete.php?id='. $row['id'] . '">Delete</a>
              </td>';
        echo '</tr>';
    }
    ?>
</table>
</div>

<div>
<?php
$pagination->pages("btn");
?>
</div>
   <a class="btn btn-xs btn-primary" href="../home/Admin/index.php">Volver</a>
    </center>
    <br>
    <br>
    <br>
    <br>
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
</html>