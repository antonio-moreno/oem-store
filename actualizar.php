<!DOCTYPE html>
    <head>
        <meta charset="utf-8" >
        <title>ADMIN STORE</title>
        <link  href="admin2.css" rel="stylesheet" type="text/css">
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
        <h2>ACTUALIZAR PRODUCTOS</h2> 
    <form action="actualizar.php" method="POST" >
        <table>
            <tr>
                <td>
                    <select name="opciones">
                    <?php
                    include("funciones.php"); 
                    $conexion=conectardb($server,$serveruser,$serverpass,$database);
                     productos($conexion);
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="enviar" ></td>
            </tr>
        </table>
    </form>
    <article>
    <?php
     session_start();
    if(isset($_SESSION['registro'])){
        echo "<h4>".$_SESSION['registro']."</h4>";
    }else{
        echo "";
    }
     if(isset($_POST['enviar'])){
        $opcion=$_POST['opciones'];
        if(isset($opcion)){
           esigual($conexion,$opcion,$table2);
        }  
    }
    ?>
    </article>
</section>
</body>
</html>
