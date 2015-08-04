<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>
<?php 
         include '../../model/functions.php';
           require '../../model/db.php';



    if ( !empty($_POST)) {
      


       
                 // validation errors

    
        
        // post values
        $proveedor        = $_POST['proveedor'];
        $ciudad         = $_POST['ciudad'];
        $horometro         = $_POST['horometro'];
        $mecanico          = $_POST['mecanico'];
        $ordent          = $_POST['ordent'];
   
        $autorizacion          = $_POST['autorizacion'];
        $actividad         = $_POST['actividad'];
        $fechas         = $_POST['fechas'];
        $fechat                = $_POST['fechat'];
        $fechaini             = $_POST['fechaini'];

        $fechae          = $_POST['fechae'];
        $tiempoa          = $_POST['tiempoa'];   
        $tiempoi          = $_POST['tiempoi'];
    
         $reporcliente          = $_POST['reporcliente'];
           $insumos          = $_POST['insumos'];

      
       
   
        
        // validate input
        $valid = true;
        if(empty($proveedor)) {
            $codigoError = 'Porfavor Ingresar Cliente';
            $valid = false;
        }

             
        
        // insert data
        if ($valid) {
              $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO mantecorre (usuario_id,equipo_id,empleado_id,ordenTrabajo,autorizado,horometro,fechasolicitud,fechaatencion,fechainicio,fechaentrega,tiempoatencion,tiempoimpro,reporcliente,actividad,insumos) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $PDO->prepare($sql);
            $stmt->execute(array($proveedor,$ciudad,$mecanico,$ordent,$autorizacion,$horometro,$fechas,$fechat,$fechaini,$fechae,$tiempoa,$tiempoi,$reporcliente,$actividad,$insumos));
            $PDO = null;
            header("Location: index.php");
        }
    }
?>




<!DOCTYPE html>
<html>
 <link href="../../public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
 <link href="../../public/css/styless.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="../../public/css/menu.css">

<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
      <script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="../../public/libs/jquery-loader.js"></script>
<script type="text/javascript" src="../../libs/jquery.smartmenus.js"></script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
    // Parametros para el combo
     $("#proveedor").change(function () {
        $("#proveedor option:selected").each(function () {
          elegido=$(this).val();
          $.post("combo_ciudad.php", { elegido: elegido }, function(data){
          $("#ciudad").html(data);
        });     
       });
     });    
  });
</script> 

<script type="text/javascript">
    $(function(){
        $('#fecha').datetimepicker();
    });
</script>

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

    <link rel="stylesheet" type="text/css" media="screen" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../public/css/tables/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/tables/DT_bootstrap.css">
    <!--
    <script type="text/javascript" src="../../public/js/tables/jquery.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" language="javascript" src="../../public/js/tables/mostrar_lista.js"></script>
    <script type="text/javascript" language="javascript" src="../../public/js/tables/jquery.dataTables.js"></script>
     -->

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" language="javascript" src="../../public/js/jquery.common.js"></script>

   </head>
    <body>
  <div> <img src="../../public/img/logoCargar.png" alt="Imagen genérica" /></div>
    <?php include '../includes/menu.inc'; ?>
    <br>
    <hr>

    <div class="container">
      
           <div class="row">
        
          <div class="row">
<h3>Registrar Mantenimiento Correctivo</h3>
                    </div>
            
                    <form method="POST" action="">
            <div class="col-md-6">
             
            </div>

            <div class="col-md-6">
           </div>
        
        </div>
        <br />

        <table style="width:100%">
        <tr>
          <td><div id="">Cliente:  </div>
          <select class="form-control"  name="proveedor" id="proveedor" required value="<?php echo !empty($ciudad)?$ciudad:'';?>">
          <option value="0">Seleccione...</option>
        <?php __ListarUsuarios(); ?>
          </select></td>
          <td> <div id="">Equipo:  </div>
            <select class="form-control"  name="ciudad" id="ciudad" value="<?php echo !empty($ciudad)?$ciudad:'';?>" required>
        </select></td>
          <td><div id="">Orden De Trabajo:  </div>
         <input type="text" class="form-control" id="ordent" value="<?php echo !empty($ordent)?$ordent:'';?>" name="ordent" ></td>

        </tr>
   <tr>
   <div class="col-xs-3">
    <td> <div id="">Horometro:  </div>
    <input  type="text" class="form-control"  id="horometro" value="<?php echo !empty($horometro)?$horometro:'';?>" name="horometro" ></td>
    </div>
     <td><div id="">Empleado:  </div>
     <select class="form-control" id="inputccarga" value="<?php echo !empty($mecanico)?$mecanico:'';?>" name="mecanico" >
                                          <option></option>
                                          <?php __ListarEmpleados(); ?>
                                       </select> </td> 
    <td><div id=""> Autorizado Por:  </div>
   <input  type="text" class="form-control" id="autorizacion" value="<?php echo !empty($autorizacion)?$autorizacion:'';?>" name="autorizacion" ></td>
   </tr>
</table>


<table>
  <tr>
    <td>
  </div>
        <div class="form-group">
                <label for="dtp_input1" class="col-md-8 control-label">Informacion Daño</label>

                   <div class='input-group date col-md-8' id='datetimepicker2' >
                                      <input type='text' class="form-control" name="fechas" id="fechas" value="<?php echo !empty($fechas)?$fechas:'';?>"/>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                 </div>
        <input type="hidden" id="dtp_input1" value="" /><br/>
            </div></td>


    <td> 
        <div class="form-group">
                <label for="dtp_input1" class="col-md-8 control-label">Atencion En Sitio</label>
                
                <div class='input-group date col-md-8' id='datetimepicker3' >
                                      <input type='text' class="form-control" name="fechat" id="fechat" value="<?php echo !empty($fechat)?$fechat:'';?>"/>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                 </div>
        <input type="hidden" id="dtp_input1" value="" /><br/>
            </div>
</td>
    <td>
        <div class="form-group">
                <label for="dtp_input1" class="col-md-8 control-label">Inicio De Trabajos</label>
                  <div class='input-group date col-md-8' id='datetimepicker4' >
                                      <input type='text' class="form-control" name="fechaini" id="fechaini" value="<?php echo !empty($fechaini)?$fechaini:'';?>"/>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                 </div>
        <input type="hidden" id="dtp_input1" value="" /><br/>
            </div>

            <div class="form-group">
                <label for="dtp_input1" class="col-md-8 control-label">Fecha y Hora Entrega:</label>
                  <div class='input-group date col-md-8' id='datetimepicker5' >
                                      <input type='text' class="form-control" name="fechae" id="fechae" value="<?php echo !empty($fechae)?$fechae:'';?>"/>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                 </div>
        <input type="hidden" id="dtp_input1" value="" /><br/>
            </div>

   </td>

  </tr>

</table>

<table>
  
  <tr>
        <td><div id="">Tiempo En Atencion:<input  type="text" class="span3 form-control" name="tiempoa" id="tiempoa" value="<?php echo !empty($tiempoa)?$tiempoa:'';?>" /></td>
 </tr>
 <tr>
    <td><div id="">Tiempo Improductivo:<input  type="text" class=" span3 form-control" name="tiempoi" size="16" id="tiempoi" value="<?php echo !empty($tiempoi)?$tiempoi:'';?>"/></td>
 </tr>
</table>


<table>
  <tr>
    <td>
    <div id="">Reporte Cliente:  </div>
         <textarea type="text" class="span3" id="reporcliente" value="<?php echo !empty($reporcliente)?$reporcliente:'';?>" name="reporcliente" ></textarea>
    </td>
    <td>
          <div id="">Actividades Realizadas:  </div>
         <textarea type="text" class="span3" id="actividad" value="<?php echo !empty($actividad)?$actividad:'';?>" name="actividad" ></textarea>
    </td>
    <td>
           <div id="">Insumos:  </div>
         <textarea type="text" class="span3" id="insumos" value="<?php echo !empty($insumos)?$insumos:'';?>" name="insumos" ></textarea> 
  </tr>
</table>
    
      
          <div class="form-actions">
        <button type="submit" class="btn btn-success">Grabar</button>
        <a class="btn btn btn-default" href="index.php">Volver</a>
    </div>

    </form>
      </div>





    </div>



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
<!--
<script type="text/javascript" src="../../public/js/jquery-1.8.3.min.js" charset="UTF-8"></script>

<script type="text/javascript" src="../../public/mas/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../../public/mas/js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
-->
<script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    defaultDate: "2015/01/25",
                     format: 'YYYY/MM/DD HH:mm',
                    disabledDates: [
                        moment("2013/12/25"),
                        new Date(2013, 12 - 1, 21),
                        "2013/12/25 00:53"
                    ]
                });

                 $('#datetimepicker3').datetimepicker({
                    defaultDate: "2015/01/25",
                     format: 'YYYY/MM/DD HH:mm',
                    disabledDates: [
                        moment("2013/12/25"),
                        new Date(2013, 12 - 1, 21),
                        "2013/12/25 00:53"
                    ]
                });

                 $('#datetimepicker4').datetimepicker({
                    defaultDate: "2015/01/25",
                     format: 'YYYY/MM/DD HH:mm',
                    disabledDates: [
                        moment("2013/12/25"),
                        new Date(2013, 12 - 1, 21),
                        "2013/12/25 00:53"
                    ]
                });

                 $('#datetimepicker5').datetimepicker({
                    defaultDate: "2015/01/25",
                     format: 'YYYY/MM/DD HH:mm',
                    disabledDates: [
                        moment("2013/12/25"),
                        new Date(2013, 12 - 1, 21),
                        "2013/12/25 00:53"
                    ]
                });
            });
        </script>
<script type="text/javascript">
$( "#usuario" ).change(function() {
        var equipo = $("select#usuario option:selected").val();
        var datastring = 'equipo='+equipo;

        $.ajax({

          type: 'POST',
          url: 'equipos.php',
          data: datastring,
             success: function(data){
               $('#equipos').html('');
               $('#equipos').html(data);
             }
        });


});



$( "#combustible" ).change(function() {
         
});
$( "#equipos" ).change(function() {
         
});
$( "#perfiles" ).change(function() {
         
});
</script>


   



</html>