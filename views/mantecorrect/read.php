<?php 
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
        $sql = "SELECT * FROM usuario where id = ?";
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
    <link   href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../public/js/bootstrap.min.js"></script>
</head>
 
<body>
<div class="container">
    <div class="col-sm-12">
        <div class="row">
            <h3>Ver Usuario</h3>
        </div>
            
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">NIT</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $data['dni'];?></p>
            </div>
         <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">RAZON</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $data['razon'];?></p>
            </div>  
              <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">EMAIL</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $data['email'];?></p>
            </div>   
            
            
       
        <div class="form-group col-sm-12">
            <a class="btn btn btn-default" href="index.php">Back</a>
        </div>
    </div>                
</div>
</body>
</html>