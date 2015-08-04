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
        // Delete Data
        $id = $_POST['id'];
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Delete from usuario where id=?";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array($id));
        $PDO = null;
        header("Location: index.php");
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
            <h3>Eliminar Usuario/h3>
        </div>
    <form method="POST" action="delete.php">
        <input type="hidden" name="id" value="<?php echo $id;?>" />
        <p class="bg-danger" style="padding: 10px;">Are you sure to delete ?</p>
        <div class="form-actions">
            <button type="submit" class="btn btn-danger">Yes</button>
            <a class="btn btn btn-default" href="index.php">No</a>
        </div>
    </form>
                
    </div> <!-- /row -->
    </div> <!-- /container -->
</body>
</html>