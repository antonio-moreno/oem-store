<!DOCTYPE html>
    <head>
        <meta charset="utf-8" >
        <title>ADMIN STORE</title>
        <link  href="admin2.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <header>
        <h1>OEM STORE</h1>
        <nav>
            <ul>
                <li><a href="insertar.php">INSERTAR PRODUCTOS</a></li>
                <li><a href="borrar.php">BORRAR  PRODUCTOS</a></li>
                <li><a href="actualizar.php">ACTUALIZAR PRODUCTOS</a></li>
                <li><a href="buscar.php">CONSULTAR PRODUCTOS</a></li>
            </ul>     
        </nav>
    </header>
<?php
     include("funciones.php");
     session_start();
     $opcion=$_SESSION['opcion'];
     $conexion=conectardb($server,$serveruser,$serverpass,$database);
     $select="SELECT * FROM $table2 WHERE nombre='$opcion'";
     $consulta=mysqli_query($conexion,$select) or die("ERROR ".mysqli_error($conexion));
     $comprobar=mysqli_fetch_assoc($consulta);
      while($comprobar){
          $id=$comprobar['id'];
          $nombre=$comprobar['nombre'];
          $precio=$comprobar['precio'];
          $cantidad=$comprobar['cantidad'];
          $foto=$comprobar['foto'];
?>
<section>
       <h2>ACTUALIZAR PRODUCTOS</h2> 
       <?php
       echo  "<h4>ESTA EDITANDO EL PRODUCTO ".$opcion."</h4>";
       ?>
       <table class='modify' >
       <form  class='modificar' action='actualizar2.php' method='POST'>
            <tr>
                <td><h3>EL CAMPO ID NO SE PUEDE MODIFICAR</h3></td>
                <td><input type='text'  name='id' value="<?php echo  $id ?>"  /></td>
            </tr>
            <tr>
                <td><h3>NOMBRE DEL PRODUCTO</h3></td>
                <td><input type='text'  name='nombre' value='<?php echo $nombre  ?>'/></td>
            </tr>
            <tr>
                <td><h3>PRECIO</h3></td>
                <td><input type='text' name='precio' value='<?php echo $precio  ?>' /></td>
            </tr>
            <tr>     
                <td><h3>CANTIDAD</h3></td>
                <td><input type='text' name='cantidad' value='<?php echo $cantidad ?>'/></td>
                </tr>
            <tr>
                <td colspan='2'><h3 >FOTO</h3></td>
            </tr>
            <tr>
                <td colspan='2'><input type='file' name='foto' /></td>
            </tr>
            <tr>
                <td><h3>FOTO ACTUAL</h3></td>
                <td><img src='<?php echo $foto ?>'></img></td>
            </tr>
            <tr>
                <td colspan='2'><input type='submit' name='enviar' ></td>
            </tr>
        </form>
        </table>
    <article>
    <?php
        
        $comprobar=mysqli_fetch_assoc($consulta);
       }
       @$foto=$_POST['foto'];
        if(isset($_POST['enviar'])){
            if(empty($_POST['nombre'])   || empty($_POST['precio'])  || empty($_POST['cantidad'])){
                echo "CAMPOS VACIOS , VERIFIQUE EL FORMULARIO ";
            }elseif($_POST['nombre'] == ""  || $_POST['precio'] == ""  || $_POST['cantidad'] == ""  ){
                echo "CAMPOS VACIOS , VERIFIQUE EL FORMULARIO ";
            }elseif( $foto == ""){
                echo "IMAGEN SIN ENVIAR";
            }
            else{
                $id=$_POST['id'];
                $nombre=$_POST['nombre'];
                $precio=$_POST['precio'];
                $cantidad=$_POST['cantidad'];
                $foto=$_FILES['foto']['name'];
                moverimg($conexion,$foto);
                actualizar($conexion,$table2,$nombre,$precio,$cantidad,$id,$foto);
            }
        }
       
?>

</article>
</section>
</body>
</html>


