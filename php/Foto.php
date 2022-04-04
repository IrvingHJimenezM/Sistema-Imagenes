<?php include("conexion.php"); ?>
<?php 

    session_start(); 
    $nombre = $_SESSION['Usuario'];

    if(isset($_SESSION['Usuario'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotografia</title>
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href= "/Sistema Imagenes/css/LLegada.css">

</head>
<body>


    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <div class="container">
        <?php echo 'Bienvenido '.$nombre; ?>
        <a class="navbar-brand" href="/Sistema Imagenes/Index.php">Inicio</a>
        <a class="navbar-brand" href="/Sistema Imagenes/Buscar.php">Buscar</a>
        <a id="CerrarSesion" href="/Sistema Imagenes/php/salir.php">Cerrar sesión</a>
      </div>
    </nav>
    <!-- VALIDAMOS LA ACCION Y SI HAY FOTOGRAFIA O NO -->
    <?php
        
           if (isset($_REQUEST['BtnGuardar']))
            {
              if ($_FILES['camera']['name']!= null) 
              {
                $archivo = $_FILES["camera"]["tmp_name"]; 
                $tamanio = $_FILES["camera"]["size"];
                $tipo    = $_FILES["camera"]["type"];
                $nombre  = $_FILES["camera"]["name"];
                $id = $_GET['id'];
                $varoper = $_GET['VarOper'];
                $User = $_SESSION['Usuario'];
                date_default_timezone_set('America/Chicago');
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
                          // mysqli_query($conexion,$query);
                          break;
                      //llegada 2
                      case 2:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp); 
                          $Hora = date('h:i:s',time());
                          $query = "UPDATE CajasImg  Set LLegada2 = '$contenido', HoraLLegada2 ='$Hora'  Where Id ='$id'";
                          // mysqli_query($conexion,$query);
                          break;
                      //Descargada 1
                      case 3:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp); 
                          $Hora = date('h:i:s',time());
                          $query = "UPDATE CajasImg  Set Descargada = '$contenido', HoraDescargada ='$Hora' Where Id ='$id'";
                          //mysqli_query($conexion,$query);
                          break;
                      //Descargada 2
                      case 4:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp);
                          $Hora = date('h:i:s',time()); 
                          $query = "UPDATE CajasImg  Set Descargada2 = '$contenido', HoraDescargada2 ='$Hora' Where Id ='$id'";
                          //mysqli_query($conexion,$query);
                          break;
                      //Cargada 1
                      case 5:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp);
                          $Hora = date('h:i:s',time()); 
                          $query = "UPDATE CajasImg  Set Cargada = '$contenido', HoraCargada ='$Hora' Where Id ='$id'";
                          //mysqli_query($conexion,$query);
                          break;
                      //Cargada 2
                      case 6:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp);
                          $Hora = date('h:i:s',time()); 
                          $query = "UPDATE CajasImg  Set Cargada2 = '$contenido', HoraCargada2 ='$Hora' Where Id ='$id'";
                          //mysqli_query($conexion,$query);
                          break;
                      //Sello 1
                      case 7:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp);
                          $Hora = date('h:i:s',time()); 
                          $query = "UPDATE CajasImg  Set Sello = '$contenido', HoraSello ='$Hora' Where Id ='$id'";
                          // mysqli_query($conexion,$query);
                          break;
                      //Sello 2
                      case 8:
                          $fp = fopen($archivo, "rb");
                          $contenido = fread($fp, $tamanio);
                          $contenido = addslashes($contenido);
                          fclose($fp); 
                          $Hora = date('h:i:s',time());
                          $query = "UPDATE CajasImg  Set Sello2 = '$contenido', HoraSello2 ='$Hora' Where Id ='$id'";
                          ///mysqli_query($conexion,$query);
                          break;
                }//SWITCH
                  //OBTENEMOS EL QUERY, LO EJECUTAMOS Y VALIDAMOS EL RESULTADO
                  $res = mysqli_query($conexion,$query);
                  if ($res)
                  {
                    ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Foto Guardada exitosamente
                               

                         </div>
                         
                    <?php
                     header("Location: /Sistema Imagenes/Agregar.php?id=$id");
                  } 
                  else  
                    {
                      ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  <span class="sr-only">Close</span>
                              </button>
                              Error en la Foto <?php echo mysqli_error($conexion); ?>
                          </div>
                      <?php
                    } 
               } //SEGUNDO IF
               else  
                  {
                     ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            Foto No Tomada
                        </div>
                     <?php
                   } 
            } //PRIMER IF
            
          
                     ?>

    <!-- Formulario Para Tomar Fotografia -->
    <div class="card" style="width: 26rem;">
         <div class="card-body">
                <form enctype="multipart/form-data"  method="post">
                    <img class="card-img-top" id="photo" class="photo">
                    <input type="file" accept="image/*" capture="camera" id="camera" name="camera" />
                    <button class="btn btn-primary" type="submit" id="BtnGuardar" name ="BtnGuardar">Guardar Foto</button>
                    
                </form>
         </div>
    </div>
      <script src="/Sistema Imagenes/js/script.js"></script>
      
    </body>
</html>

<?php 
    }
    else{

        header('Location: login.php');

    }

?>