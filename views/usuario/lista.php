<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>
<?php 
   require '../../model/db.php';
   include '../../model/functions.php';

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link   href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../public/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="../../public/css/style.css">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  
    <div class="contenedor">

         <h1>Estados y Municipios de México</h1>
         <select id="plazo">
            <option></option>
         	<?php __ListarPlazos(); ?>
         </select>
         <p></p>
         
         <div class="footer">Ejemplo Hecho por <a href="mailto:jessus.herrera@hotmail.com">Jesus Herrera</a> para <a href="http://pilaresdelcodigo.wordpress.com/">Pilares Del Codigo</a> </div>
    	

    </div>

     <script src="../../public/js/bootstrap.min.js"></script>
<script src="../../public/js/jquery.min.js"></script>
<script type="text/javascript">
$( "#plazo" ).change(function() {
         
});
</script>
</body>
</html>