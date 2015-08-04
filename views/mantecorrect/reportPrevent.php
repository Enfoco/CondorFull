<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>

<?php 
 include '../../model/functions.php';
           require '../../model/db.php';

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

<br />
<hr>

<div class="container">
  

<h3>Mantenimiento Correctivo Por Equipo</h3>

            <p><a class="btn btn-xs btn-success" href="../home/Admin/reportes.php">Volver</a></p>
<form method="POST" action="">

<div>

<form action="ejemplo combobox.php" method="post">
          <table  style="width:50%">
            <tr>
                  <td><div id="titulos"><h2>Seleccionar Cliente:</h2>  </div>
                  </td>
                  <td><label class="control-label" for="proveedor"></label>
                  <div class="controls">
                  <select class="span3"  name="proveedor" id="proveedor" required value="<?php echo !empty($proveedor)?$proveedor:'';?>">
                  <option value="0">Seleccione...</option>
                  <?php __ListarUsuarios(); ?>
                  </select>  <input type="submit" name="buscador" value="Buscar" /></td>
            </tr>
            </table>
            
      </form>
 
    </div>
    <?php
            if ($_POST['buscador'])
            { 
                  $buscar = $_POST['proveedor'];

                  if(empty($buscar))
            {
                echo "No se ha ingresado una cadena a buscar";
                }else{
                        $con=mysql_connect("localhost","u403826591_condo","Elguru47");
                        $sql = "SELECT * FROM equipo WHERE usuario_id = '$buscar'";
                        mysql_select_db("u403826591_condo", $con); 

                        $result = mysql_query($sql, $con);
                        $total = mysql_num_rows($result);
                 if ($row = mysql_fetch_array($result)){ 

                do { 
?>

          <p><b><a href="reciboPreven.php?id=<?php echo $row['descripcion'];?>"><?php echo $row['descripcion']; ?></a></b></p>
<?php
      } while ($row = mysql_fetch_array($result)); 
      echo "<p>Resultados: $total</p>";
      } else { 
      echo "No se encontraron resultados para: <b>$buscar</b>"; 
      }
      }
      }
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


<script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../../public/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

</html>