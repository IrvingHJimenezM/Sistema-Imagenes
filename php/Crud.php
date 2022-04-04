<?php
require("conexion.php");

$archivo = $_FILES["camera"]["tmp_name"]; 
$tamanio = $_FILES["camera"]["size"];
$tipo    = $_FILES["camera"]["type"];
$nombre  = $_FILES["camera"]["name"];
$id = $_POST['id'];
$varoper = $_POST['VarOper'];


if ( $archivo != "none" )
{
   switch ($varoper) {
       //llegada 1
       case 1:
           
            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 
            $query = "UPDATE CajasImg  Set LLegada = '$contenido' Where Id ='$id'";
            mysqli_query($conexion,$query);
            break;
       //llegada 2
       case 2:
            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 
            $query = "UPDATE CajasImg  Set LLegada2 = '$contenido' Where Id ='$id'";
            mysqli_query($conexion,$query);
            break;
        //Descargada 1
       case 3:
            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 
            $query = "UPDATE CajasImg  Set Descargada = '$contenido' Where Id ='$id'";
            mysqli_query($conexion,$query);
            break;
        //Descargada 2
        case 4:
            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 
            $query = "UPDATE CajasImg  Set Descargada2 = '$contenido' Where Id ='$id'";
            mysqli_query($conexion,$query);
            break;
        //Cargada 1
        case 5:
            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 
            $query = "UPDATE CajasImg  Set Cargada = '$contenido' Where Id ='$id'";
            mysqli_query($conexion,$query);
            break;
        //Cargada 2
        case 6:
            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 
            $query = "UPDATE CajasImg  Set Cargada2 = '$contenido' Where Id ='$id'";
            mysqli_query($conexion,$query);
            break;
        //Sello 1
        case 7:
            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 
            $query = "UPDATE CajasImg  Set Sello = '$contenido' Where Id ='$id'";
            mysqli_query($conexion,$query);
            break;
        //Sello 2
        case 8:
            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 
            $query = "UPDATE CajasImg  Set Sello2 = '$contenido' Where Id ='$id'";
            mysqli_query($conexion,$query);
            break;

           
   }
   header("Location: /Sistema Imagenes/Agregar.php");

}
else
   print "No se ha podido subir La Imagen al servidor";

?>