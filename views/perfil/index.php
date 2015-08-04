<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="../../public/css/menu.css">
<script type="text/javascript" src="../../public/libs/jquery-loader.js"></script>
<script type="text/javascript" src="../../libs/jquery.smartmenus.js"></script>
<script type="text/javascript">
  $(function() {
    $('#main-menu').smartmenus({
      subMenusSubOffsetX: 1,
      subMenusSubOffsetY: -8
    });
  });
</script>
<link href="../../public/css/sm-core-css.css" rel="stylesheet" type="text/css" />
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
    <br/>
    <hr>
<div class="container">
    <div class="row">
    <h3>Listado de Perfiles</h3>
    </div>
    <div class="row">
    <p><a class="btn btn-xs btn-success" href="create.php">Crear</a></p>
    <table class="table table-striped table-bordered table-hover">
    <tr>
       <th>N&deg;</th>
        <th>Detalle</th>
        <th>Acciones</th>

    </tr>
    <tbody>
    <?php
    include '../../model/db.php';
    $sql = 'SELECT * FROM perfil ORDER BY id DESC';
    foreach ($PDO->query($sql) as $row) {
        echo '<tr>';
        echo '<td>'. $row['id'] . '</td>';
        echo '<td>'. $row['detalle'] .  '</td>';





       
        echo '<td>
                   <a class="btn btn-xs btn-primary" href="update.php?id='. $row['id'] . '">Up</a>&nbsp;
                  <a class="btn btn-xs btn-danger" href="delete.php?id='. $row['id'] . '">Del</a>
              </td>';
        echo '</tr>';
    }
$PDO = null;
    ?>
    </tbody>
    </table>
        </div><!-- /row -->
     <a class="btn btn-xs btn-primary" href="../home/Admin/index.php">Volver</a>
</div>
    </div><!-- /row -->
</div><!-- /container -->

<?php 

 ?>
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