<?php include("conexion.php"); ?>
<?php

                $archivo = $_FILES["Foto"]; 
                $tamanio = $archivo["size"];
                $tipo    = $archivo["type"];
                $nombre  = $archivo["name"];
                $id = $_GET['ValorIdCaja'];
                $varoper = $_GET['VOper'];
                $User = $_SESSION['User'];
    date_default_timezone_set('America/Chicago');

    if ($_FILES['Foto']!= null) 
              {
// VALIDAMOS EL TIPO DE OPERACION Y ENTRAMOS A LA CORRESPONDIENTE
                switch ($varoper) {
                //llegada 1
                       case 1:                    
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp); 
                          $Hora = date('h:i:s',time());
                          $query = "UPDATE CajasImg  Set LLegada = '$contenido', User ='$User', HoraLLegada ='$Hora' Where Id ='$id'";
                          mysqli_query($conexion,$query);
                          break;
                      //llegada 2
                      case 2:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp); 
                          $Hora = date('h:i:s',time());
                          $query = "UPDATE CajasImg  Set LLegada2 = '$contenido', HoraLLegada2 ='$Hora'  Where Id ='$id'";
                          mysqli_query($conexion,$query);
                          break;
                      //Descargada 1
                      case 3:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp); 
                          $Hora = date('h:i:s',time());
                          $query = "UPDATE CajasImg  Set Descargada = '$contenido', HoraDescargada ='$Hora' Where Id ='$id'";
                          mysqli_query($conexion,$query);
                          break;
                      //Descargada 2
                      case 4:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp);
                          $Hora = date('h:i:s',time()); 
                          $query = "UPDATE CajasImg  Set Descargada2 = '$contenido', HoraDescargada2 ='$Hora' Where Id ='$id'";
                          mysqli_query($conexion,$query);
                          break;
                      //Cargada 1
                      case 5:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp);
                          $Hora = date('h:i:s',time()); 
                          $query = "UPDATE CajasImg  Set Cargada = '$contenido', HoraCargada ='$Hora' Where Id ='$id'";
                          mysqli_query($conexion,$query);
                          break;
                      //Cargada 2
                      case 6:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp);
                          $Hora = date('h:i:s',time()); 
                          $query = "UPDATE CajasImg  Set Cargada2 = '$contenido', HoraCargada2 ='$Hora' Where Id ='$id'";
                          mysqli_query($conexion,$query);
                          break;
                      //Sello 1
                      case 7:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp);
                          $Hora = date('h:i:s',time()); 
                          $query = "UPDATE CajasImg  Set Sello = '$contenido', HoraSello ='$Hora' Where Id ='$id'";
                          mysqli_query($conexion,$query);
                          break;
                      //Sello 2
                      case 8:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp); 
                          $Hora = date('h:i:s',time());
                          $query = "UPDATE CajasImg  Set Sello2 = '$contenido', HoraSello2 ='$Hora' Where Id ='$id'";
                          mysqli_query($conexion,$query);
                          break;
                }
            }
            
 ?>
                
