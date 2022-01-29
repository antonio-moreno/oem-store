<!DOCTYPE html>
    <head>
        <meta charset="utf-8" >
        <title>OEM STORE</title>
        <link  href="propiedades.css" rel="stylesheet" type="text/css">
    </head>
<body>
<header>
    <h1>OEM STORE</h1>
    <form action="index.php" method="POST"> 
            <input type="submit" name="enviar" value="PRODUCTOS"/>
    </form>
    <a href="login.php" target="blank" ><img src="img/user.png"></img></a></li>
</header>
<section>
    <article>
    <?php
    //OFERTAS 
    //PEDIDOS (SI DA TIEMPO)
    include("funciones.php");
        if(isset($_POST['enviar'])){
           $conexion=conectardb($server,$serveruser,$serverpass,$database);
           mostrar($conexion);
        }
    ?>
    </article>
</section>
</body>
</html>
