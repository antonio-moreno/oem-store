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
        <h2>INSERTAR PRODUCTOS</h2> 
    <form action="insertar.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><h3>NOMBRE DEL PRODUCTO</h3></td>
                <td><input type="text" name="nombre" /></td>
            </tr>
            <tr>
                <td><h3>PRECIO</h3></td>
                <td><input type="text" name="precio" /></td>
            </tr>
            <tr>
                <td><h3>CANTIDAD</h3></td>
                <td><input type="text" name="cantidad" /></td>
            </tr>
            <tr>
                <td colspan="2"><h4 >FOTO</h4></td>
            </tr>
            <tr>
                <td colspan="2"><input type="file" name="foto" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="enviar" ></td>
            </tr>
        </table>
    </form>
    <article>
<?php
    include("funciones.php");
    
    if(isset($_POST['enviar'])){
        if(empty($_POST['nombre'])   || empty($_POST['precio'])  || empty($_POST['cantidad'])){
            echo "CAMPOS VACIOS , VERIFIQUE EL FORMULARIO ";
        }elseif($_POST['nombre'] == ""  || $_POST['precio'] == ""  || $_POST['cantidad'] == ""  ){
            echo "CAMPOS VACIOS , VERIFIQUE EL FORMULARIO ";
        }elseif( $_FILES['foto']['name'] == ""){
            echo "IMAGEN SIN ENVIAR";
        }
        else{
            $conexion=conectardb($server,$serveruser,$serverpass,$database);
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $cantidad=$_POST['cantidad'];
            $foto=$_FILES['foto']['name'];
            moverimg($conexion,$foto);
            insertar($conexion,$table2,$nombre,$precio,$cantidad,$foto);

        }
    }
       
    ?>
    </article>
</section>
</body>

</html>
