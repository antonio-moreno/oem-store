<?php
$server="localhost";
$serveruser="root";
$serverpass="";
$database="antoniomoreno";
$table="usuarios";
$table2="productos";

//COMPRUEBA CONEXION
function conectardb($server,$serveruser,$serverpass,$database){
    $conexion=mysqli_connect($server,$serveruser,$serverpass);
    mysqli_select_db($conexion,$database) or die("ERROR ".mysqli_error($conexion));
    return $conexion;
}

//COMPROBAR CLAVE DUPLICADA
function insertar($conexion,$table2,$nombre,$precio,$cantidad,$foto){
        $insercion="INSERT INTO $table2 (`nombre`,`precio`,`cantidad`,`foto`) VALUES ('$nombre','$precio','$cantidad','$foto')";
        $datos=mysqli_query($conexion,$insercion) or die("ERROR ".mysqli_error($conexion));
        echo "PRODUCTO INSERTADO CORRECTAMENTE";
}
//LEE LOS PRODUCTOS Y LOS PONE EN EL SELECT 
//COMPROBAR FILAS VACIAS
function productos($conexion){
    $consulta="SELECT nombre FROM productos";
    $select=mysqli_query($conexion,$consulta) or die("ERROR ".mysqli_error($conexion));
    $mostrar=mysqli_fetch_assoc($select);
    while($mostrar){
           echo "<option  value='".$mostrar['nombre']."'>".$mostrar['nombre']."</option>";
        $mostrar=mysqli_fetch_assoc($select);
    }
}
//BORRA PRODUCTOS
function borrar($conexion,$opcion,$table2){
    $delete="DELETE FROM $table2 WHERE nombre='$opcion'";
    $consulta=mysqli_query($conexion,$delete) or die("ERROR ".mysqli_error($conexion));
    echo "REGISTRO BORRADO CORRECTAMENTE";
}

function esigual($conexion,$opcion,$table2){
    $select="SELECT * FROM $table2 WHERE nombre='$opcion'";
    $consulta=mysqli_query($conexion,$select) or die("ERROR ".mysqli_error($conexion));
    $comprobar=mysqli_fetch_assoc($consulta);
    //si existe no dibujes el formulario si no return
    while($comprobar){
        if($comprobar['nombre'] == $opcion ){
        session_start();
        $_SESSION['opcion']=$opcion;    
        header("Location:actualizar2.php");
        }
        $comprobar=mysqli_fetch_assoc($consulta);
    }
}

function moverimg($conexion,$foto){
    $origenimg=$_FILES['foto']['tmp_name'];
    $ruta=$_SERVER['DOCUMENT_ROOT'];
    $destino=$ruta.'/antoniomoreno'.'/'.$foto;
    move_uploaded_file($origenimg,$destino);
}
//DIBUJA Y ACTUALIZA UN PRODUCTO
function actualizar($conexion,$table2,$nombre,$precio,$cantidad,$id,$foto){
      $update="UPDATE `$table2` SET `nombre` = '$nombre', `precio` = '$precio', `cantidad` = '$cantidad' ,`foto` = '$foto' WHERE `id` = '$id'";
      $actualizar=mysqli_query($conexion,$update) or die("ERROR ".mysqli_error($conexion));
      if($actualizar==true){
        session_start();
        $_SESSION['registro']="REGISTRO ACTUALIZADO CORRECTAMENTE";    
        header("Location:actualizar.php");
      }
}



//LISTA UN SOLO PRODUCTO
//CAMBIAR  ESTILOS ESTO
//COMPROBAR FILAS VACIAS
function listar1($conexion,$table2,$opcion){
        $select="SELECT * FROM productos WHERE nombre='$opcion'";
        $consulta=mysqli_query($conexion,$select) or die("ERROR ".mysqli_error($conexion));
        $mostrar=mysqli_fetch_assoc($consulta);
        echo"<table>";
        while($mostrar){
            echo "<tr>";
            echo   "<td>".'<img src="'.$mostrar['foto'].'"></img>'."</td>";
            echo "</tr>";
            echo "<tr>";
            echo 	"<td><p>".$mostrar['nombre']."</p><br>";
            echo 	"<p>PRECIO : ".$mostrar['precio']."€</p>";
            echo 	"<p>CANTIDAD : ".$mostrar['cantidad']."</p></td>";
            echo "</tr>";
            $mostrar=mysqli_fetch_assoc($consulta);
        }
        echo "</table>";
}

//LISTA TODOS LOS PRODUCTOS EN EL INICIO
//CAMBIAR  ESTILOS ESTO
//COMPROBAR FILAS VACIAS
function mostrar($conexion){
    $consulta="SELECT nombre,precio,cantidad,foto FROM productos";
    $select=mysqli_query($conexion,$consulta) or die("ERROR ".mysqli_error($conexion));
    $mostrar=mysqli_fetch_assoc($select);
        echo"<table>";
				while($mostrar){
                echo "<tr>";
                echo "<td colspan='3'>";
                echo    '<img src="'.$mostrar['foto'].'"></img>'."</td>";
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
			    echo 	"<td class='titulos'>".$mostrar['nombre']."<br>";
				echo 	"PRECIO : ".$mostrar['precio']."€<br>";
                echo 	"CANTIDAD : ".$mostrar['cantidad']."</td>";
				echo "</tr>";
                $mostrar=mysqli_fetch_assoc($select);
                }
				
		echo "</table>";
}

?>