<?php
    /*$host      = 'localhost';
    $user      = 'u746668508_condo';
    $pass      = 'Elguru47';
    $dbname    = 'u746668508_condo';
    try 
    {
        $PDO =  new PDO( "mysql:host=".$host.";"."dbname=".$dbname, $user, $pass);  
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());  
    }*/
$host = 'localhost';
$base = 'u746668508_condo';
$usuario = 'u746668508_condo';
$password ='Elguru47';
try{
    $PDO = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $PDO->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
?>