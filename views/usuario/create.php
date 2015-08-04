<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>

<?php 
         include '../../model/functions.php';
    if ( !empty($_POST)) {
         require '../../model/db.php';
       
     // validation errors
       
        $nameError      = null;
        $dniError       = null;
        $contactoError  = null;
    
        
        // post values
        $dni       = $_POST['dni'];
        $name      = $_POST['name'];
        $contact   = $_POST['contact'];
        $city      = $_POST['city'];
        $address   = $_POST['address'];
        $phone     = $_POST['phone'];
        $phone2    = $_POST['phone2'];
        $email     = $_POST['email'];
        $password  = $_POST['password'];
        $pago      = $_POST['pago'];
        $plazo     = $_POST['plazo'];
        $perfil    = $_POST['perfil'];

   
        
        // validate input
        $valid = true;
        if(empty($name)) {
            $nameError = 'Porfavor Ingrese Nombre/Razón Social';
            $valid = false;
        }

        if(empty($dni)) {
            $dniError = 'Porfavor Ingrese Nit/CC';
            $valid = false;
        }
        
       
        
        // insert data
        if ($valid) {
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuario (dni,razon,contacto,ciudad_id,direccion,telefono,telefono2,email,password,formapago_id,plazopago_id,perfil_id) values(?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $PDO->prepare($sql);
            $stmt->execute(array($dni,$name,$contact,$city,$address,$phone,$phone2,$email,$password,$pago,$plazo,$perfil));
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
                        <h3>Crear Usuarios</h3>
                    </div>
            
                    <form method="POST" action="">

<div>
<label for="inputPerfil">Tipo Usuario:</label>
    <select class="form-control" id="inputperfil" value="<?php echo !empty($perfil)?$perfil:'';?>" name="perfil" >
        <option></option>
            <?php __ListarPerfiles(); ?>
    </select>
                
   </div>
     <br /> 

    <div class="form-group <?php echo !empty($dniError)?'has-error':'';?>">
        <label for="inputDni">NIT:</label>
        <input type="text" class="form-control" required="required" id="inputname" value="<?php echo !empty($dni)?$dni:'';?>" name="dni" placeholder="NIT o Número de Cedula">
   </div> 
   <br />                
    <div class="form-group <?php echo !empty($nameError)?'has-error':'';?>">
        <label for="inputFName">Razón Social:</label>
        <input type="text" class="form-control" required="required" id="inputname" value="<?php echo !empty($name)?$name:'';?>" name="name" placeholder="Nombre o Detalle">
   </div>
     <br /> 
       <div class="form-group <?php echo !empty($contactError)?'has-error':'';?>">
        <label for="inputContact">Contacto:</label>
        <input type="text" class="form-control" required="required" id="inputcontact" value="<?php echo !empty($contact)?$contact:'';?>" name="contact" placeholder="Nombre Del Contacto">
   </div>
  <br />

       <div class="form-group <?php echo !empty($contactError)?'has-error':'';?>">
        <label for="inputContact">Ciudad: </label>
       <div>
        <select class="form-control" id="inputcity" value="<?php echo !empty($city)?$city:'';?>" name="city" >
            <option></option>
            <?php __ListarCiudades(); ?>
         </select>
         
          </div>  
            <br />
   </div>
         <div class="form-group <?php echo !empty($addressError)?'has-error':'';?>">
        <label for="inputAddress">Direccion:</label>
        <input type="text" class="form-control" required="required" id="inputaddress" value="<?php echo !empty($address)?$address:'';?>" name="address" placeholder="Dirección del Contacto">
   </div>
  <br />

         <div class="form-group <?php echo !empty($phoneError)?'has-error':'';?>">
        <label for="inputPhone">Telefono Fijo: </label>
        <input type="text" class="form-control" required="required" id="inputphone" value="<?php echo !empty($phone)?$phone:'';?>" name="phone" placeholder="Número Telefónico">
   </div>
  <br />
          <div class="form-group <?php echo !empty($phone2Error)?'has-error':'';?>">
        <label for="inputPhone2">Telefono Celular: </label>
        <input type="text" class="form-control" required="required" id="inputphone2" value="<?php echo !empty($phone2)?$phone2:'';?>" name="phone2" placeholder="Numero Celular">
   </div>
  <br />
          <div class="form-group <?php echo !empty($emailError)?'has-error':'';?>">
        <label for="inputEmail">Correo Electronico:</label>
        <input type="text" class="form-control" required="required" id="inputemail" value="<?php echo !empty($email)?$email:'';?>" name="email" placeholder="Correo Eléctronico">
   </div>
  <br />
           <div class="form-group <?php echo !empty($passwordError)?'has-error':'';?>">
        <label for="inputPassword">Contraseña:</label>
        <input type="password" class="form-control" required="required" id="inputpassword" value="<?php echo !empty($password)?$password:'';?>" name="password" placeholder="Contraseña">
   </div>
  <br />
   <div>
        <label for="inputpagos">Forma Pagos:</label>
      <select class="form-control" id="inputpago" value="<?php echo !empty($pago)?$pago:'';?>" name="pago" >
            <option></option>
            <?php __ListarPagos(); ?>
         </select>
           <p></p>
       
   </div>
   <div>
        <label for="inputplazo">Plazo Pago En Días:</label>
      <select class="form-control" id="inputplazo" value="<?php echo !empty($plazo)?$plazo:'';?>" name="plazo" >
            <option></option>
            <?php __ListarPlazos(); ?>
         </select>
           <p></p>
       
   </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Grabar</button>
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

<script src="../../public/js/jquery.min.js"></script>

<script type="text/javascript">
$( "#plazos" ).change(function() {
         
});
$( "#ciudades" ).change(function() {
         
});
$( "#ciudades" ).change(function() {
         
});
$( "#perfiles" ).change(function() {
         
});
</script>
</html>