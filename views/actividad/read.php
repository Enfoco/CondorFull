<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>

<?php 

require_once '../../model/functions.php'; 
        require '../../model/db.php';

    $id = null;
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
    }
    if($id == null)
    {
        header("Location: index.php");
    }
    else
    {
        // read data
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM actividad where id = ?";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array($id));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $PDO = null;
        if (empty($data)){
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
 
<body>

<?php include '../includes/menu.inc'; ?>
<div class="container">
    <div class="col-sm-12">
        <div class="row">
            <h3>Detalle del Actividad</h3>
        </div>
            
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $data['detalle'];?></p>
            </div>
       
        <div class="form-group col-sm-12">
            <a class="btn btn btn-default" href="index.php">Back</a>
        </div>
    </div>                
</div>
</body>
</html>