<?php
//accede a la sesión actual
session_start();
//Elimina la sesión y cierra la sesión del usuario
session_destroy();
//redirige al usuario al inicio de sesion
header("Location: acceder.php");
exit();
?>