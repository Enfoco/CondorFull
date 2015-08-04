
<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>
<?php
    $id = null;
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
    }
    if($id == null)
    {
        header("Location: index.php");
    } 
    if ( !empty($_POST))
    {
           require '../../model/db.php';
        // Delete Data
        $id = $_POST['id'];
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Delete from perfil where id=?";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array($id));
        $PDO = null;
        header("Location: index.php");
    }
?>

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
        <div class="row">
            <h3>Eliminar Perfil </h3>
        </div>
    <form method="POST" action="delete.php">
        <input type="hidden" name="id" value="<?php echo $id;?>" />
        <p class="bg-danger" style="padding: 10px;">Realmente Desea Eliminar El Perfil Seleccionado ???</p>
        <div class="form-actions">
            <button type="submit" class="btn btn-danger">Yes</button>
            <a class="btn btn btn-default" href="index.php">No</a>
        </div>
    </form>
                
    </div> <!-- /row -->
    </div> <!-- /container -->
  <br/>

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