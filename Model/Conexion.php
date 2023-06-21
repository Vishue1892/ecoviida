<?php
//declaracion de variables
$servidor = 'localhost';
$db = 'ecovida';
$user = 'alexis';
$pass ='123';

//hacemos la conexion con la base de datos
try{
    $conexion = new PDO('mysql:host='.$servidor.';dbname='.$db, $user,$pass);
}catch(PDOException $e){
    echo "Error al conectar con la base de datos";
    exit;
}

return $conexion;

?>