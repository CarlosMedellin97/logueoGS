<?php
//SESSION_start; //INICIA LA SESIÓN O REANUDA LA EXISTENTE 
//SESSION_destroy; //ELIMINA LA SESIÓN ABIERTA
//$_SESSION; // ALMACENA LAS VARIABLES DE SESIÓN

$user = ''; //nombre del usuario de la base de datos en AZURE
$password = ''; //contraseña que nos generara AZURE al crear la base de datos
$db = 'db'; //nombre de la base de datos
$host = ''//; en donde se encuentra por ejemplo localhost
$con = mysqli_connect ($host, $password, $db);


require ("../conectar.php");
//se agregaran los usuarios a la base de datos
$sql sprintf("INSERT INTO  usuarios (NumeroEmpleado, correo, password, rol)
 VALUES ('%s', '%s', '%s','%s')"
 $_GET['NumeroEmpleado'],
 $_GET['correo'],
 //se utiliza SHA1 para encriptar las contraseñas.
 sha1($_GET['password']),
 $_GET['rol']
);
$r = mysqli_query($con, $sql);
echo $r;



?>
