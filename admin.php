<!DOCTYPE html>
    <head>
        <meta charset="utf-8" >
        <title>ADMIN STORE</title>
        <link  href="admin.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <header>
        <h1 >OEM STORE</h1>
        <nav>
            <ul>
                <li><a href="insertar.php">INSERTAR PRODUCTOS</a></li>
                <li><a href="borrar.php">BORRAR  PRODUCTOS</a></li>
                <li><a href="actualizar.php">ACTUALIZAR PRODUCTOS</a></li>
                <li><a href="buscar.php">CONSULTAR PRODUCTOS</a></li>
            </ul>     
        </nav>
       
    </header>
<section>
        <?php
            session_start();
            if(isset($_SESSION['user'])){
            echo "<h1>Bienvenido  ".$_SESSION['user']."</h1>";
            }else{
                header("Location:login.php");
                echo "";
            }
            if(!isset($_COOKIE['visitas'])){
                setcookie("visitas",1,time()+60*60*24*365);
                }
                else{
                echo "<br><h3>VISITAS : ".$_COOKIE['visitas']."</h3>";
                $num=$_COOKIE['visitas']+1;
                setcookie("visitas",$num,time()+60*60*24*365);
            }
            echo "<br><p><b>NOMBRE DEL SERVIDOR : ".$_SERVER['SERVER_NAME']."</b><p>";
            echo "<a href='cerrar.php'>CERRAR SESION</a>";
        ?>
    
    <!-- Aqui listamos los productos Mostrar alguna oferta , viistas , informacion del servidor etc...
    //HOLA ADMIN --    
    //VISITAS --
    //INFORMACION DEL SERVIDOR --
    //CALCULA EL STOCK TOTAL DE LOS PRODUCTOS DISPONIBLES 
    //OFERTA 
    //SI EL USUARIO NO ES EL ADMIN NO PUEDE ENTRAR --
        -->
</section>
</body>
</html>
