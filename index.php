<?php
require_once 'model/login.class.php';
if($_SESSION["razon"]){ 
header ("Location: panel.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acceso</title>


    <link rel="stylesheet" href="public/css/login.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <style type="text/css">
.alert-danger-alt { border-color: #B63E5A;background: #E26868;color: #fff; }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


<div class="container" style="margin-top:150px;">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Acceso Al Sistema</h3>
        </div>
          <div class="panel-body">
          <?php
if (isset($_GET['error'])) {
    echo '
              <div class="alert alert-danger-alt alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Acceso Denegado</strong> Revise que sus datos de acceso al sistema sean correctos y vuelva a intentarlo.</div>   

    ';
} else {
    echo '';
}
?>
            <form accept-charset="UTF-8" role="form" method="POST" action="model/login.php">
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="email@email.com" name="email" id="email" type="text" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Contraseña" name="password" id="password" type="password" value="" required>
              </div>
              <input class="btn btn-lg btn-success btn-block" type="submit" value="Iniciar sesión">
               <p>Todos los derechos Reservados CARGAR S.A</p>
            </fieldset>
              </form>
              <p></p>
          </div>
      </div>
    </div>

  </div>


</div>

<footer style align="center">
 
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.min.js"></script>
  </body>
</html>