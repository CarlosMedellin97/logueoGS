<?php
SESSION_start();
require("index.php");
$sql = sprintf ("SELECT * FROM usuarios WHERE NumeroEmpleado = '%s' AND password ='%s'", 
$_POST['NumeroEmpleado'],
sha1($_POST['password']));
$query = mysqli_query($con, $sql);
$fila = mysqli_fetch_assoc($query);
$encontrados = mysqli_num_rows($query);
//hace las comparaciones de usuarios

if (isset($_POST['ingresar']) && $encontrados >= 1 ) {
    $_SESSION['NumeroEmpleado'] = $fila ['NumeroEmpleado'];
   $_SESSION['correo'] = $fila ['correo'];
   $_SESSION['rol']  = $fila ['rol'];
   if ($_SESSION ['rol'] == 'admin'){
    header('location: admin.html'); //si el usuario es adminitrador lo mandara a la pagina de administrador.
   } else if ($_SESSION['rol'] == 'usuario'){
    header('location: usuario.html'); //si el usuario no tiene privilegios de administrador lo mandara a la pagina usuario.
    }
   }else{
    header('location: index.html'); // si no tiene ningun privilegio lo mandará a la pagina de inicio.
   }
?>
