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
        // validation errors
        $descripcionError     = null;
        $marcaError     = null;
    
        
        // post values
        $descripcion  = $_POST['descripcion'];
        $codigo  = $_POST['codigo'];
        $marca  = $_POST['marca'];
        $modelo  = $_POST['modelo'];
        $serie  = $_POST['serie'];
    
        
        // validate input
        $valid = true;
        if(empty($descripcion)) {
            $descripcionError = 'Por Favor Ingrese Nombre o Detalle';
            $valid = false;
        }
              
        
        // update data
        if ($valid) {
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "Update equipo set descripcion=?,codigo=?,marca=?,modelo=?,serie=? where id=?";
            $stmt = $PDO->prepare($sql);
            $stmt->execute(array($descripcion,$codigo,$marca,$modelo,$serie,$id));
            $PDO = null;
            header("Location: index.php");
        }
    }
    else{
            require '../../model/db.php';
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM equipo where id = ?";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array($id));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $PDO = null;
        if (empty($data)){
            header("Location: index.php");
        }
        $descripcion  = $data['descripcion'];
        $codigo  = $data['codigo'];
        $marca  = $data['marca'];
        $modelo  = $data['modelo'];
        $serie  = $data['serie'];
    
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
                        <h3>Actualizar Equipo</h3>
                    </div>
            
                    <form method="POST" action="update.php?id=<?php echo $id?>">
    <div class="form-group <?php echo !empty($fdescripcionError)?'has-error':'';?>">
    <label for="inputNit">Descripcion:</label>
        <input type="text" class="form-control" id="inputDescripcion" value="<?php echo !empty($descripcion)?$descripcion:'';?>" name="descripcion" placeholder="Descripcion">
    </div>

        <br />
    <div class="form-group <?php echo !empty($fmarcaError)?'has-error':'';?>">
    <label for="inputNit">Marca:</label>
        <input type="text" class="form-control" required="required" id="inputMarca" value="<?php echo !empty($marca)?$marca:'';?>" name="marca" placeholder="Codigo de Maquina">
    </div>
    <br />
    <div class="form-group <?php echo !empty($fcodigoError)?'has-error':'';?>">
    <label for="inputNit">Codigo:</label>
        <input type="text" class="form-control"  id="inputCodigo" value="<?php echo !empty($codigo)?$codigo:'';?>" name="codigo" placeholder="Codigo de Maquina">
    </div>
    <br />
        <div class="form-group <?php echo !empty($fmodeloError)?'has-error':'';?>">
    <label for="inputNit">Modelo:</label>
        <input type="text" class="form-control"  id="inputModelo" value="<?php echo !empty($modelo)?$modelo:'';?>" name="modelo" placeholder="Modelo de Maquina">
    </div>
    <br />

            <div class="form-group <?php echo !empty($fserieError)?'has-error':'';?>">
    <label for="inputNit">Serie:</label>
        <input type="text" class="form-control" id="inputSerie" value="<?php echo !empty($serie)?$serie:'';?>" name="serie" placeholder="Serie de Maquina">
    </div>
    <br />
  
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a class="btn btn btn-default" href="index.php">Volver</a>
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
 