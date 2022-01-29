<?php
session_start();
unset($_SESSION);
session_destroy();
echo "LA SESION HA CONCLUIDO";
header("Location:login.php");
?>