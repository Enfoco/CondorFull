<?php
require_once 'conexion.class.php';
$conexion = Conexion::singleton_conexion();
$normalpass = $_POST['password'];
$hash = sha1($normalpass);
$sql = "INSERT INTO usuario (dni,razon,contacto,ciudad_id,direccion,telefono,telefono2,email,password,formapago_id,plazopago_id,perfil_id) VALUES (:dni,:razon,:contacto,:ciudad_id,:direccion,:telefono,:telefono2,:email,:password,:formapago_id,:plazopago_id,:perfil)";
$q = $conexion->prepare($sql);
$q->bindParam(':dni', $_POST['dni'], PDO::PARAM_STR);
$q->bindParam(':razon', $_POST['razon'], PDO::PARAM_STR);
$q->bindParam(':contacto', $_POST['contacto'], PDO::PARAM_STR);
$q->bindParam(':ciudad_id', $_POST['ciudad'], PDO::PARAM_STR);
$q->bindParam(':direccion', $_POST['direccion'], PDO::PARAM_STR);
$q->bindParam(':telefono', $_POST['telefono'], PDO::PARAM_STR);
$q->bindParam(':telefono2', $_POST['telefono2'], PDO::PARAM_STR);
$q->bindParam(':telefono2', $_POST['telefono2'], PDO::PARAM_STR);
$q->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$q->bindParam(':password', $hash, PDO::PARAM_STR);
$q->bindParam(':formapago_id', $_POST['formapago'], PDO::PARAM_STR);
$q->bindParam(':plazopago_id', $_POST['plazopago'], PDO::PARAM_STR);
$q->bindParam(':perfil', $_POST['perfil'], PDO::PARAM_STR);
$q->execute();
header("location: ../views/usuario/index.php")
?>