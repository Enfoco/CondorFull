<?php session_start() ?>
<?php if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}?>
<?php

$host = 'localhost';
$base = 'cargar';
$usuario = 'root';
$password ='Elguru47';
try{
	$conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
	echo "ERROR: " . $e->getMessage();
}
$equipo = $_POST['equipo'];
 $sql = $conn->prepare('SELECT * FROM equipo WHERE id='.$equipo.' ');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['descripcion']."</option>";
  }