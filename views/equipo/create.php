<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>
<?php 
         include '../../model/functions.php';
    if ( !empty($_POST)) {
         require '../../model/db.php';
       
     // validation errors
       
        $usuarioError        = null;
        $codigoError      = null;
        $marcaError       = null;
        $modeloError      = null;
    
        
        // post values
        $usuario        = $_POST['usuario'];
        $descripcion    = $_POST['descripcion'];
        $codigo         = $_POST['codigo'];
        $marca          = $_POST['marca'];
        $modelo         = $_POST['modelo'];
        $serie          = $_POST['serie'];
        $tmotor         = $_POST['tmotor'];
        $combustible    = $_POST['combustible'];
        $mastil         = $_POST['mastil'];
        $ccarga         = $_POST['ccarga'];
        $etapa          = $_POST['etapa'];
       
   
        
        // validate input
        $valid = true;
        if(empty($codigo)) {
            $codigoError = 'Porfavor Codigo Identificador del Equipo';
            $valid = false;
        }

             
        
        // insert data
        if ($valid) {
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO equipo (usuario_id,descripcion,codigo,marca,modelo,serie,tipomotor_id,combustible_id,mastil,capacidad_id,etapa_id) values(?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $PDO->prepare($sql);
            $stmt->execute(array($usuario,$descripcion,$codigo,$marca,$modelo,$serie,$tmotor,$combustible,$mastil,$ccarga,$etapa));
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
                        <h3>Crear Equipos</h3>
                    </div>
            
                    <form method="POST" action="">

<div>
<label for="inputUsuario">Usuario</label>
    <select class="form-control" id="inputuser" value="<?php echo !empty($usuario)?$usuario:'';?>" name="usuario" >
        <option></option>
            <?php __ListarUsuarios(); ?>
    </select>
                
   </div>
   <br />

    <div class="form-group <?php echo !empty($codigoError)?'has-error':'';?>">
        <label for="inputDescripcion">DESCRIPCION </label>
        <input type="text" class="form-control" required="required" id="inputdescripcion" value="<?php echo !empty($descripcion)?$descripcion:'';?>" name="descripcion" placeholder="Descricion del Equipo">
   </div>  
      <br />


    <div class="form-group <?php echo !empty($codigoError)?'has-error':'';?>">
        <label for="inputCodigo">CODIGO </label>
        <input type="text" class="form-control" required="required" id="inputcodigo" value="<?php echo !empty($codigo)?$codigo:'';?>" name="codigo" placeholder="Codigo Identificador del Equipo">
   </div>  
      <br />
              
    <div class="form-group <?php echo !empty($marcaError)?'has-error':'';?>">
        <label for="inputMarca">MARCA</label>
        <input type="text" class="form-control" required="required" id="inputmarca" value="<?php echo !empty($marca)?$marca:'';?>" name="marca" placeholder="Marca Del Equipo">
   </div>
      <br />

       <div class="form-group <?php echo !empty($modeloError)?'has-error':'';?>">
        <label for="inputModelo">MODELO</label>
        <input type="text" class="form-control" required="required" id="inputmodelo" value="<?php echo !empty($modelo)?$modelo:'';?>" name="modelo" placeholder="Modelo Del Equipo">
   </div>

   <br /> 

      <div class="form-group <?php echo !empty($serieError)?'has-error':'';?>">
        <label for="inputSerie">SERIE</label>
        <input type="text" class="form-control" required="required" id="inputserie" value="<?php echo !empty($serie)?$serie:'';?>" name="serie" placeholder="Serie Del Equipo">
   </div>
      <br />

     
       <div class="form-group <?php echo !empty($tmotorError)?'has-error':'';?>">
        <label for="inputTmotor">TIPO MOTOR</label>
       <div>
        <select class="form-control" id="inputtmotor" value="<?php echo !empty($tmotor)?$tmotor:'';?>" name="tmotor" >
            <option></option>
            <?php __ListarTmotor(); ?>
         </select>
         
          </div>  
             <br />

   <div class="form-group <?php echo !empty($combustibletError)?'has-error':'';?>">
        <label for="inputCombustible">COMBUSTIBLE</label>
       <div>
        <select class="form-control" id="inputcombustible" value="<?php echo !empty($combustible)?$combustible:'';?>" name="combustible" >
            <option></option>
            <?php __ListarCombustible(); ?>
         </select>
         
          </div>  
   </div>
      <br />

         <div class="form-group <?php echo !empty($mastilError)?'has-error':'';?>">
        <label for="inputAddress">MASTIL</label>
        <input type="text" class="form-control" required="required" id="inputmastil" value="<?php echo !empty($mastil)?$mastil:'';?>" name="mastil" placeholder="Mastil">
   </div>
   <br />
    <div class="form-group <?php echo !empty($etapaError)?'has-error':'';?>">
        <label for="inputCcarga">ETAPA</label>
       <div>
        <select class="span3" id="inputcetapa" value="<?php echo !empty($etapa)?$etapa:'';?>" name="etapa" >
            <option></option>
            <?php __ListarEtapas(); ?>
         </select>
         </div>
         
          </div> 
          <br />

     <div class="form-group <?php echo !empty($combustibletError)?'has-error':'';?>">
        <label for="inputCcarga">CAPACIDAD DE CARGA</label>
       <div>
        <select class="form-control" id="inputccarga" value="<?php echo !empty($ccarga)?$ccarga:'';?>" name="ccarga" >
            <option></option>
            <?php __ListarCcarga(); ?>
         </select>
         
          </div>  
             <br />

  

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Grabar</button>
        <a class="btn btn btn-default" href="index.php">Volver</a>
    </div>
       <br />

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


<script type="text/javascript">
$( "#usuarios" ).change(function() {
         
});
$( "#combustible" ).change(function() {
         
});
$( "#ccargar" ).change(function() {
         
});
$( "#perfiles" ).change(function() {
         
});
</script>
</html>