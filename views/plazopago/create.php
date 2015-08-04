<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>

<?php 
    if ( !empty($_POST)) {
        require '../../model/db.php';
     // validation errors
       
        $nameError     = null;
    
        
        // post values
        $name  = $_POST['name'];
   
        
        // validate input
        $valid = true;
        if(empty($name)) {
            $nameError = 'Por facor Ingrese nombre o detalle';
            $valid = false;
        }
        
       
        
        // insert data
        if ($valid) {
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO plazopago (detalle) values(?)";
            $stmt = $PDO->prepare($sql);
            $stmt->execute(array($name));
            $PDO = null;
            header("Location: index.php");
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
    <body>
  <div> <img src="../../public/img/logoCargar.png" alt="Imagen genérica" /></div>
    <?php include '../includes/menu.inc'; ?>
    <br>
    <hr>
<div class="container">
    
                    <div class="row">
                    <div class="row">
                        <h3>Crear Plazo de Pago</h3>
                    </div>
            
                    <form method="POST" action="">
    <div class="form-group <?php echo !empty($nameError)?'has-error':'';?>">
        <label for="inputFName">Name</label>
        <input type="text" class="form-control" required="required" id="inputname" value="<?php echo !empty($name)?$name:'';?>" name="name" placeholder="Plazo de Pago">
   
    
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Create</button>
        <a class="btn btn btn-default" href="index.php">Back</a>
    </div>
</form>
                
    </div> <!-- /row -->
    </div> <!-- /container -->
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