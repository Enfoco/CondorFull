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
        $frecuencia         = $_POST['frecuencia'];
        $mecanico          = $_POST['mecanico'];
        $ordent          = $_POST['ordent'];
        $operario         = $_POST['operario'];
        $autorizacion          = $_POST['autorizacion'];
        $horometro         = $_POST['horometro'];
        $fechainicio             = $_POST['fechainicio'];

        $entregaequipo          = $_POST['entregaequipo'];
        $proximomante          = $_POST['proximomante'];   
        $informe          = $_POST['informe'];
        $duracion          = $_POST['duracion'];
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
            $sql = "INSERT INTO mantepre (usuario_id,equipo_id,frecuenciainterv_id,empleado_id,ordenTrabajo,operario,horometro,autorizado,fechainicio,entregaequipo,proximomante,duracion,comentario,insumos) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $PDO->prepare($sql);
            $stmt->execute(array($proveedor,$ciudad,$frecuencia,$mecanico,$ordent,$operario,$horometro,$autorizacion,$fechainicio,$entregaequipo,$proximomante,$duracion,$informe,$insumos));
            $PDO = null;
            header("Location: index.php");
        }
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
                        <h3>Registrar Mantenimiento Preventivo</h3>
                    </div>
            
                    <form method="POST" action="">

<div>

    <div class="panel panel-default">
        <div class="panel-heading"> </div>
            <div class="panel-body">
                <div class="row">


         <table style="width:100%">
           <tr>
             
             <td>
                <div >Cliente:</div>
    <div class="controls">
        <select class="form-control"  name="proveedor" id="proveedor" required value="<?php echo !empty($proveedor)?$proveedor:'';?>">
          <option value="0">Seleccione...</option>
        <?php __ListarUsuarios(); ?>
          </select>              
             </td>

             <td>
               <div>Equipo:  </div>
    <div class="controls">
        <select class="form-control"  name="ciudad" id="ciudad" value="<?php echo !empty($ciudad)?$ciudad:'';?>" >
        </select>
             </td>

             <td>
               <div >Frecuencia: 
    <div class="controls">
        <select class="form-control"  name="frecuencia" id="frecuencia" required value="<?php echo !empty($frecuencia)?$frecuencia:'';?>">
          <option value="0">Seleccione...</option>
        <?php __ListarFrecuencia(); ?>
          </select>
             </td>
             <td>
               <div >Horometro:  </div>
               <input  type="text" id="horometro" class="form-control"value="<?php echo !empty($horometro)?$horometro:'';?>" name="horometro" >
           </tr>
           <tr>
                          <td>
            <div >Orden de Trabajo:  </div>
               <input type="text" id="ordent" class="form-control" value="<?php echo !empty($ordent)?$ordent:'';?>" name="ordent" >
             </td>

             <td>
               <div >Mecanico:  </div>
                <select class="form-control" id="inputccarga" value="<?php echo !empty($mecanico)?$mecanico:'';?>" name="mecanico" >
                                          <option></option>
                                          <?php __ListarEmpleados(); ?>
                                       </select>

             </td>
                         
             <td>
                  <div >Operario:  </div>
                  <input  type="text" class="form-control" id="operario" value="<?php echo !empty($operario)?$operario:'';?>" name="operario" >    
                  </td>  

                  <td>
                    <div >Autorizado:  
                     <input  type="text" class="form-control" id="autorizacion" value="<?php echo !empty($autorizacion)?$autorizacion:'';?>" name="autorizacion" >
                  </td>  
            
           </tr>

         </table>
  
   <div class="control-group">

   <table>
<tr>
       <td>
                  <input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
            <div class="form-group">
                <label for="dtp_input3" class="col-md-8 control-label">Hora Inicio</label>
                <div class='input-group date col-md-8' id='datetimepicker1' >
                                      <input type='text' class="form-control" name="fechainicio" id="fechainicio" value="<?php echo !empty($fechainicio)?$fechainicio:'';?>"/>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                 </div>
                <input type="hidden" id="dtp_input3" value="" /><br/>
            </div>
</td>


     <td>

      <input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
            <div class="form-group">
                <label for="dtp_input3" class="col-md-8 control-label">Hora Entrega</label>
                           <div class='input-group date col-md-8' id='datetimepicker2' >
                                      <input type='text' class="form-control" name="entregaequipo" id="entregaequipo" value="<?php echo !empty($entregaequipo)?$entregaequipo:'';?>"/>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                 </div>
                <input type="hidden" id="dtp_input3" value="" /><br/>
            </div>
</td>

   <td>
      <input type="hidden" id="dtp_input2" value="" /><br/>
      <div class="form-group">
          <label for="dtp_input3" class="col-md-2 control-label">Duracion</label>
     <input  type="text" class="form-control" id="duracion" value="<?php echo !empty($duracion)?$duracion:'';?>" name="duracion" >
      </div>

      </td>
   

 <td>
  <input type="hidden" id="dtp_input2" value="" /><br/>
     <div class="form-group">
                <label for="dtp_input1" class="col-md-8 control-label">Proximo Mtto</label>
                <div class='input-group date col-md-8' id='datetimepicker3' >
                                      <input type='text' class="form-control" name="proximomante" id="proximomante" value="<?php echo !empty($proximomante)?$proximomante:'';?>"/>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
        <input type="hidden" id="dtp_input1" value="" /><br/>
            </div>

   </td>

  


</tr>
 <tr>
    </table>

<table>
  <tr>
    <td><div class="controls">
     <label for="">Reporte Del Técnico</label>
    <textarea placeholder="Informacion realizada por el mecanico asignado" name="informe" id="informe" value="<?php echo !empty($informe)?$informe:'';?>"></textarea><br></td>
    <td><div class="controls">
     <label for="">Insumos</label>
    <textarea placeholder="Informacion sobre la cantidad de insumos utilizados" name="insumos" id="insumos" value="<?php echo !empty($insumos)?$insumos:'';?>"></textarea><br></td>
</td>
  </tr>
</table>

    
</div>



  <div class="col-xs-6 col-sm-4">
            

                  


  <div class="col-xs-6">
    
          </div>


        
  </div>



    
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Grabar</button>
        <a class="btn btn btn-default" href="index.php">Volver</a>
    </div>
</form>
                
    </div> <!-- /row -->
    </div> <!-- /container -->

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


<script type="text/javascript" language="javascript" src="../../public/js/jquery.common.js"></script>


<!--
<script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../../public/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
-->
<script type="text/javascript">
            $(function () {

               $('#datetimepicker1').datetimepicker({
                    defaultDate: "2015/01/25",
                     format: 'YYYY/MM/DD HH:mm',
                    disabledDates: [
                        moment("2013/12/25"),
                        new Date(2013, 12 - 1, 21),
                        "2013/12/25 00:53"
                    ]
                });
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