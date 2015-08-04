<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>

<?php 

 include '../../model/functions.php';
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
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

<div class="container" style="margin-top:50px;">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Registro de usuario</h3>
        </div>
          <div class="panel-body">
            <form accept-charset="UTF-8" role="form" method="POST" action="../../model/newuser.php">
                    <fieldset>
            <div class="form-group">
             <label for="dni">Tipo Usuario:</label>
                <select class="form-control" id="inputperfil" name="perfil" >
                      <option></option>
                      <?php __ListarPerfiles(); ?><br>
                      </select>
              </div> 
              <br />

                <div class="form-group">
                <label for="dni">NIT:</label>
                  <input class="form-control" placeholder="No. Identificación" name="dni" type="text" required>
              </div> 
              <br />   
                <div class="form-group">
                <label for="razon">Razón Social:</label>
                  <input class="form-control" placeholder="Nombre del Cliente" name="razon" type="text" required>
              </div>
              <br />  
                <div class="form-group">
                 <label for="contacto">Contacto:</label>
                  <input class="form-control" placeholder="Nombre del Contacto" name="contacto" type="text" required>
              </div>  
              <br /> 
                <div class="form-group">
                 <label for="ciudad">Ciudad:</label>
                  <select class="form-control" id="inputcity" name="ciudad" >
                  <option></option>
                       <?php __ListarCiudades(); ?>
                  </select>
                </div>
                <br />

                   <div class="form-group">
                <label for="direccion">Direccion:</label>
                  <input class="form-control" placeholder="Dirección Empresa lLiente" name="direccion" type="text" required>
              </div> 
              <br />
                <d iv class="form-group">
                <label for="telefono">Teléfono Fijo:</label>

                  <input class="form-control" placeholder="Número Teéfono Contacto" name="telefono" type="text" required>
              </div>
              <br />     
                <div class="form-group">
                <label for="celular">Número Celular:</label>
                  <input class="form-control" placeholder="Número Teléfono Contacto" name="telefono2" type="text" required>
              </div>  
              <br /> 

                <div class="form-group">
                <label for="correo">Correo:</label>
                  <input class="form-control" placeholder="tuemail@email.com" name="email" type="text" required>
              </div>
              <br />
              <div  class="form-group">
              <label for="passwd">Contraseña:</label>
                <input class="form-control" placeholder="Contraseña" name="password" type="password" value="" required>
              </div>
              <br />
                <div class="form-group">
                <label for="pago">Forma de Pago:</label>
                  <select class="form-control" id="inputpago"  name="formapago" >
                  <option></option>
                      <?php __ListarPagos(); ?>
                   </select>
                   </div>
                   <br />
                <div class="form-group">
                <label for="plazo">Plazo en Días</label>
                  <select class="form-control" id="inputplazo"  name="plazopago" >
                    <option></option>
                    <?php __ListarPlazos(); ?>
                  </select>
              </div> 
              <br /> 

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Grabar</button>
                    <a class="btn btn btn-default" href="index.php">Volver</a>
                </div>
               
                        </fieldset>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../public/jquery.min.js"></script>

  </body>
</html>