<?php

Function  __ListarPlazos(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM plazopago');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }

  Function  __ConexionPDOActividad(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM actividad');
    $sql->execute();
    $resultado = $sql->fetchAll();
 
  }


  Function __UsuariosRegistrados(){
$conexion = Conexion::singleton_conexion();
$sql = 'SELECT * FROM usuario';
$stmt = $conexion->prepare($sql);
$results = $stmt->execute();
$rows = $stmt->fetchAll();
$error = $stmt->errorInfo();
if(empty($rows)) {
    echo "<option>";
      echo "No hay usuarios registrados.";
    echo "</option>";
  }
  else {
    foreach ($rows as $row) {

        echo "<p class='usuariosregistrados'>".$row['razon']."</p>";


  }

   }
}



  Function  __ListarFrecuencia(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM frecuenciainterv');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }


  Function  __ListarCiudades(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM ciudad');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }


  Function  __ListarPagos(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM formapago');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }


  Function  __ListarPerfiles(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM perfil');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }

    Function  __ListarUsuarios(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM usuario');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['razon']."</option>";
    }
  }



    Function  __comboproveedor(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM usuario');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        $combo_proveedor.= "<option value='".$sql_p[0]."'>".$sql_p[2]."</option>";
    }
  }  

      Function  __ListarTmotor(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM tipomotor');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }

        Function  __ListarCombustible(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM combustible');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }


          Function  __ListarActividad(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM actividad');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }


          Function  __ListarCcarga(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM capacidad');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }


            Function  __ListarEtapas(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM etapa');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }


          Function  __ListarEquipos(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM equipo');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['detalle']."</option>";
    }
  }


          Function  __ListarEmpleados(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM empleado');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
      echo "<option value='".$row['id']."'>".$row['nombre'].' '.$row['apellido']."</option>";
    }
  }



          Function  __ListarEquiposxCliente(){

$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
 $sql = $conn->prepare('SELECT * FROM usuario');
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        echo "<option value='".$row['id']."'>".$row['razon']."</option>";
    }
  }



function Conectarse()  
{  
   if (!($link=mysql_connect("localhost","u746668508_condo","Elguru47")))  
   {  
      echo "Error conectando a la base de datos.";  
      exit();  
   }  
   if (!mysql_select_db("u746668508_condo",$link))  
   {  
          echo "Error seleccionando la base de datos.";  
      exit();  
  }  
   return $link;  
}  


?>