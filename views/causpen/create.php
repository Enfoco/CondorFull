<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>

<?php 
    if ( !empty($_POST)) {
        require '../../model/db.php';
     // validation errors
       
        $nameError     = null;
    
        
        // post values
        $name  = $_POST['name'];
   
        
        // validate input
        $valid = true;
        if(empty($name)) {
            $nameError = 'Por facor Ingrese nombre o detalle';
            $valid = false;
        }
        
       
        
        // insert data
        if ($valid) {
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO causalpendiente (detalle) values(?)";
            $stmt = $PDO->prepare($sql);
            $stmt->execute(array($name));
            $PDO = null;
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../public/js/bootstrap.min.js"></script>
</head>
 
<body>
<div class="container">
    
                    <div class="row">
                    <div class="row">
                        <h3>Crear Causa Pendiente</h3>
                    </div>
            
                    <form method="POST" action="">
    <div class="form-group <?php echo !empty($nameError)?'has-error':'';?>">
        <label for="inputFName">Name</label>
        <input type="text" class="form-control" required="required" id="inputname" value="<?php echo !empty($name)?$name:'';?>" name="name" placeholder="Nombre o Detalle">
   
    
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Create</button>
        <a class="btn btn btn-default" href="index.php">Back</a>
    </div>
</form>
                
    </div> <!-- /row -->
    </div> <!-- /container -->
</body>
</html>