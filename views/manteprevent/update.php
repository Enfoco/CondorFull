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
        $frecuenciaError     = null;
        $ordenError     = null;
    
        
        // post values
        
        $orden  = $_POST['orden'];
        $operario  = $_POST['operario'];
        $horometro  = $_POST['horometro'];
         $autorizado  = $_POST['autorizado'];
          $fechainicio  = $_POST['fechainicio'];
           $entregaequipo  = $_POST['entregaequipo'];
            $proximomante  = $_POST['proximomante'];
             $comentario  = $_POST['comentario'];
              $duracion  = $_POST['duracion'];
               $insumos  = $_POST['insumos'];


    
        
        // validate input
        $valid = true;
        if(empty($orden)) {
            $ordenError = 'Por Favor Orden';
            $valid = false;
        }
              
        
        // update data
        if ($valid) {
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "Update mantepre  set ordenTrabajo=?,operario=?,horometro=?,autorizado=?,fechainicio=?,entregaequipo=?,proximomante=?,comentario=?,duracion=?,insumos=? where id=?";
            $stmt = $PDO->prepare($sql);
            $stmt->execute(array($orden,$operario,$horometro,$autorizado,$fechainicio,$entregaequipo,$proximomante,$comentario,$duracion,$insumos,$id));
            $PDO = null;
            header("Location: index.php");
        }
    }
    else{
            require '../../model/db.php';
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM mantepre where id = ?";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array($id));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $PDO = null;
        if (empty($data)){
            header("Location: index.php");
        }
        $orden  = $data['ordenTrabajo'];
        $operario  = $data['operario'];
        $horometro  = $data['horometro'];
        $autorizado  = $data['autorizado'];
        $fechainicio  = $data['fechainicio'];
        $entregaequipo  = $data['entregaequipo'];
        $proximomante  = $data['proximomante'];
        $comentario  = $data['comentario'];
        $duracion  = $data['duracion'];
        $insumos  = $data['insumos'];

    
    }
?>

<!DOCTYPE html>
<html>

 <link href="../../public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
     <link href="../../public/css/styless.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="../../public/css/menu.css">
<script type="text/javascript" src="../../public/libs/jquery-loader.js"></script>
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
      <link rel="stylesheet" type="text/css" href="../../public/css/tables/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/tables/DT_bootstrap.css">
    <script type="text/javascript" src="../../public/js/tables/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="../../public/js/tables/mostrar_lista.js"></script>
    <script type="text/javascript" language="javascript" src="../../public/js/tables/jquery.dataTables.js"></script>
     
   </head>
    <body>
  <body>
  <div> <img src="../../public/img/logoCargar.png" alt="Imagen genérica" /></div>
  <?php include '../includes/menu.inc'; ?>

  <br>
  <hr>
<div class="container">
    
                    <div class="row">
                    <div class="row">
                        <h3>Actualizar Mantenimiento Preventivo</h3>
                    </div>
            
                    <form method="POST" action="update.php?id=<?php echo $id?>">
    
    <div class="form-group <?php echo !empty($fordenError)?'has-error':'';?>">
    <label for="inputOrden">Orden:</label>
        <input type="text" class="form-control" required="required" id="inputorden" value="<?php echo !empty($orden)?$orden:'';?>" name="orden" placeholder="empleado de Maquina">
    </div>
       <br />

    <div class="form-group <?php echo !empty($foperarioError)?'has-error':'';?>">
    <label for="inputOperario">Operario:</label>
        <input type="text" class="form-control"  id="inputoperario" value="<?php echo !empty($operario)?$operario:'';?>" name="operario" placeholder="operario de Maquina">
    </div>
        <br />

            <div class="form-group <?php echo !empty($fhorometroError)?'has-error':'';?>">
    <label for="inputHorometro">Horometro:</label>
        <input type="text" class="form-control" id="inputhorometro" value="<?php echo !empty($horometro)?$horometro:'';?>" name="horometro" placeholder="horometro de Maquina">
    </div>
         <br />

              <div class="form-group <?php echo !empty($fautorizadoError)?'has-error':'';?>">
    <label for="inputAutorizado">Autorizado:</label>
        <input type="text" class="form-control" id="inputautorizado" value="<?php echo !empty($autorizado)?$autorizado:'';?>" name="autorizado" placeholder="autorizado">
    </div>
    <br />

              <div class="form-group <?php echo !empty($ffechainicioError)?'has-error':'';?>">
    <label for="inputFechaInicio">Fecha De Inicio:</label>
        <input type="text" class="form-control" id="inputfechainicio" value="<?php echo !empty($fechainicio)?$fechainicio:'';?>" name="fechainicio" placeholder="fechainicio">
    </div>
    <br />
     <div class="form-group <?php echo !empty($fentregaequipoError)?'has-error':'';?>">
    <label for="inputProximo">Proximo M:</label>
        <input type="text" class="form-control" id="inputproximomante" value="<?php echo !empty($proximomante)?$proximomante:'';?>" name="proximomante" placeholder="proximomante">
    </div>

    <br />
    <div class="form-group <?php echo !empty($fentregaequipoError)?'has-error':'';?>">
    <label for="inputFechaEntrega">Fecha Entrega:</label>
        <input type="text" class="form-control" id="inputentregaequipo" value="<?php echo !empty($entregaequipo)?$entregaequipo:'';?>" name="entregaequipo" placeholder="entregaequipo">
    </div>
    <br />

       

        <div class="form-group <?php echo !empty($fcomentarioError)?'has-error':'';?>">
    <label for="inputComentario">Comentario:</label>
        <input type="text" class="form-control" id="inputcomentario" value="<?php echo !empty($comentario)?$comentario:'';?>" name="comentario" placeholder="comentario">
    </div>
    <br />

            <div class="form-group <?php echo !empty($fduracionError)?'has-error':'';?>">
    <label for="inpuDuracion">Duracion:</label>
        <input type="text" class="form-control" id="inputduracion" value="<?php echo !empty($duracion)?$duracion:'';?>" name="duracion" placeholder="comentario">
    </div>
    <br />

                <div class="form-group <?php echo !empty($finsumosError)?'has-error':'';?>">
    <label for="inputInsumos">Insumos:</label>
        <input type="text" class="form-control" id="inputinsumos" value="<?php echo !empty($insumos)?$insumos:'';?>" name="insumos" placeholder="insumos">
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



<script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../../public/js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
</html>
 