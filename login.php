<!DOCTYPE html>
    <head>
        <meta charset="utf-8" >
        <title>LOGIN ADMIN</title>
        <link  href="login.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <form action="login.php" method="POST" >
        <h2>INICIO DE SESIÓN</h2>
        <h3>NOMBRE</h3>
        <input type="text"  name="nombre" />
        <h3>CONTRASEÑA</h3>
        <input type="password" name="contraseña" /><br>
        <input type="submit" name="enviar" />
    </form>
<section>
<?php 
//SE HA OLVIDADO SU CONTRASEÑA??
include("funciones.php");
if(isset($_POST['enviar'])){
    if(empty($_POST['nombre']) || empty($_POST['contraseña']) ){
        echo "<h3>CAMPOS VACIOS </h3>" ; 
    }elseif($_POST['nombre'] == "" || $_POST['contraseña'] == "" ){
        echo "<h3>CAMPOS VACIOS </h3>" ; 
    }else{
        if($_POST['nombre'] == "admin" && $_POST['contraseña'] == "admin"){
            session_start();
            $_SESSION['user']=$_POST['nombre'];
            header("Location:admin.php");
        }else{
            echo "<h3>USUARIO INCORRECTO</h3>";
        }
        
    }
}

?>
</section>
</body>
</html>