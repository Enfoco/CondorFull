<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>
<?php require_once '../../../model/functions.php'; ?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="../../../public/css/menu.css">


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
<link href="../../../public/css/sm-core-css.css" rel="stylesheet" type="text/css" />

<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
<link href="../../../public/css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />

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
<link href="../../../public/libs/demo-assets/demo.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../public/libs/demo-assets/themes-switcher.js"></script>

 
  <head>
    <title>Bienvenido Sistema de Administración y Control de Mantenimientos</title>
    <meta charset="utf-8">
    <!-- HOJAS DE ESTILO -->
    <link rel="stylesheet" type="text/css" href="../../../public/css/tables/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/tables/DT_bootstrap.css">



<!-- Optional theme -->


<!-- Latest compiled and minified JavaScript -->

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="../../../public/js/tables/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="../../../public/js/tables/mostrar_lista.js"></script>
    <script type="text/javascript" language="javascript" src="../../../public/js/tables/jquery.dataTables.js"></script>
   </head>
  <body>
  <div> <img src="../../../public/img/logoCargar.png" alt="Imagen genérica" /></div>
  
  <?php include 'includes/menu.inc'; ?>
      <div class="container">
  <div class="row">
     <div class="col-md-12" style="text-align:left; margin-top:100px;">

       <div class="panel panel-primary">
          <div class="panel panel-default">
  <div class="panel-heading">Configuración</div>
  <div class="panel-body">

      <div class="row">


        <div class="col-md-2"><a href="../../perfil/index.php">Perfiles de Usuarios</a><br></div>
        <div class="col-md-2"><a href="../../frecuencia/index.php">Frecuencia de Actividades</a><br></div>
        <div class="col-md-2"><a href="../../combustible/index.php">Combustible</a><br></div>
        <div class="col-md-2"><a href="../../tipomotor/index.php">Motor</a><br></div>
        <div class="col-md-2"><a href="../../capacidad/index.php">Capacidad</a><br></div>

  
      </div>
                      <hr>
  <div class="row">

        <div class="col-md-2"><a href="../../etapa/index.php">Etapa</a><br></div>
        <div class="col-md-2"><a href="../../intervencion/index.php">Intervencion</a><br></div>
        <div class="col-md-2"><a href="../../ciudad/index.php">Ciudad</a><br></div>
        <div class="col-md-2"><a href="../../formapago/index.php">Formas de Pago</a><br></div>
        <div class="col-md-2"><a href="../../plazopago/index.php">Plazos para Pagos</a><br></div>
        </div>
            </div>
                    </div>
                           </div>
            </div>
        </div>
</div>

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

  <script type="text/javascript" src="../../../libs/jquery-loader.js"></script>
  <script type="text/javascript" src="../../../libs/jquery.smartmenus.js"></script>
  <script type="text/javascript" language="javascript" src="../../../public/js/jquery.common.js"></script>
</html>