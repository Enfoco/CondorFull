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

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php include '../home/Admin/includes/menu.inc'; ?>

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
                <select class="form-control" id="inputperfil" name="perfil" >
                      <option></option>
                      <?php __ListarPerfiles(); ?><br>
                      </select>
              </div> 

                <div class="form-group">
                  <input class="form-control" placeholder="No. Identificación" name="dni" type="text" required>
              </div>    
                <div class="form-group">
                  <input class="form-control" placeholder="Nombre del Cliente" name="razon" type="text" required>
              </div>  
                <div class="form-group">
                  <input class="form-control" placeholder="Nombre del Contacto" name="contacto" type="text" required>
              </div>   
                <div class="form-group">
                  <select class="form-control" id="inputcity" name="ciudad" >
                  <option></option>
                       <?php __ListarCiudades(); ?>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Número Teéfono Contacto" name="telefono" type="text" required>
              </div>     
                <div class="form-group">
                  <input class="form-control" placeholder="Número Teéfono Contacto" name="telefono2" type="text" required>
              </div>   

                <div class="form-group">
                  <input class="form-control" placeholder="tuemail@email.com" name="email" type="text" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Contraseña" name="password" type="password" value="" required>
              </div>
                <div class="form-group">
                  <select class="form-control" id="inputpago"  name="formapago" >
                  <option></option>
                      <?php __ListarPagos(); ?>
                   </select>
                   </div>
                <div class="form-group">
                  <select class="form-control" id="inputplazo"  name="plazopago" >
                    <option></option>
                    <?php __ListarPlazos(); ?>
                  </select>
              </div>  
               
              <input class="btn btn-lg btn-success btn-block" type="submit" value="Registrar">
               <a class="btn btn btn-default" href="index.php">Back</a>
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