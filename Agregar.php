<?php include("php/conexion.php"); ?>
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
    <title>Agregar</title>
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href= "/Sistema Imagenes/css/Agregar.css">

</head>
<body>

<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <div class="container">
                <?php echo 'Bienvenido '.$nombre; ?>
                <a class="navbar-brand" href="Index.php">Inicio</a>
                <a class="navbar-brand" href="Buscar.php">Buscar</a>
                <a id="CerrarSesion" href="/Sistema Imagenes/php/salir.php">Cerrar sesión</a>
       
        </div>
    </nav>
   <?php
        date_default_timezone_set('America/Chicago');
        $Fecha = date('Y-m-d');
        if  (isset($_GET['id'])) 
        {
            $id = $_GET['id'];
            $query = "SELECT * FROM CajasImg WHERE Id=$id ";
            $result = mysqli_query($conexion, $query);
            
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $Patente = $row['Patente'];
                $Anden = $row['Anden'];
                $Caja = $row['NumCaja'];
                $LLegada = $row['LLegada'];
                $Hllegada = $row['HoraLLegada'];
                $Cllegada = $row['ComentLLegada'];
                $LLegada2 = $row['LLegada2'];
                $Hllegada2 = $row['HoraLLegada2'];
                $Cllegada2 = $row['ComentLLegada2'];
                $Descargada=$row['Descargada'];
                $HDescargada = $row['HoraDescargada'];
                $CDescargada = $row['ComentDescargada'];
                $Descargada2=$row['Descargada2'];
                $HDescargada2 = $row['HoraDescargada2'];
                $CDescargada2 = $row['ComentDescargada2'];
                $Cargada=$row['Cargada'];
                $HCargada = $row['HoraCargada'];
                $CCargada = $row['ComentCargada'];
                $Cargada2=$row['Cargada2'];
                $HCargada2 = $row['HoraCargada2'];
                $CCargada2 = $row['ComentCargada2'];
                $Sello=$row['Sello'];
                $HSello = $row['HoraSello'];
                $CSello = $row['ComentSello'];
                $Sello2=$row['Sello2'];
                $HSello2 = $row['HoraSello2'];
                $CSello2 = $row['ComentSello2'];
                        
            }
        }
   ?>    
<!--Datos de la Caja -->
  <div class="container p-4">  
       <div class="row">  
            <div class="col-md-4 mx-auto">   
                    <div class="card card-body"> 
                        <form action="Agregar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <fieldset disabled>
                                <div class="form-group">
                                    <label for="Folio">Patente</label>
                                    <input type="text" name="Folio" class="form-control" value="<?php echo $Patente; ?>" placeholder="Patente" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="Anden"> Anden</label>
                                    <input type="text" name="Anden" class="form-control" value="<?php echo $Anden; ?>" placeholder="Anden" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="Caja"> #Caja</label>
                                    <input type="text" name="Caja" class="form-control" value="<?php echo $Caja; ?>" placeholder="Caja" autofocus>
                                </div>
                                </fieldset>

                         </form>

                    </div>
            </div>
        </div>
   </div>
   <!--IMAGENES -->
                  <div class="container p-2">
                        <form action="Agregar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                             <table class="table">
                             <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">Momentos</th>
                                        <th scope="col">Fotos</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Llegada</th>
                                            <td><img width="100" src="data:image/jpg;base64,<?php echo  base64_encode($LLegada); ?>"></td>
                                            <td> <?php echo $Hllegada?> </td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=1" class="btn btn-secondary">
                                                <i class="bi bi-camera"></i>
                                                </a>
                                                <a href="php/Download.php?id=<?php echo $row['Id']?>&DwldOper=1"class="btn btn-secondary">
                                                <i class="bi bi-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Comentarios</th>
                                            <td> <?php echo $Cllegada?> </td>
                                            <td></td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=1" class="btn btn-secondary">
                                                <i class="bi bi-chat-square-text"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Llegada2</th>
                                            <td><img width="100" src="data:image/jpg;base64,<?php echo  base64_encode($LLegada2); ?>"></td>
                                            <td> <?php echo $Hllegada2?> </td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=2" class="btn btn-secondary">
                                                <i class="bi bi-camera"></i>
                                                </a>
                                                <a href="php/Download.php?id=<?php echo $row['Id']?>&DwldOper=2"class="btn btn-secondary">
                                                <i class="bi bi-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Comentarios</th>
                                            <td> <?php echo $Cllegada2?> </td>
                                            <td></td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=1" class="btn btn-secondary">
                                                <i class="bi bi-chat-square-text"></i>
                                                </a>
                                            </td>
                                         </tr>
                                        <tr>
                                            <th scope="row">Descargada</th>
                                            <td> <img width="100" src="data:image/jpg;base64,<?php echo  base64_encode($Descargada); ?>"></td>
                                            <td> <?php echo $HDescargada?> </td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=3" class="btn btn-secondary">
                                                <i class="bi bi-camera"></i>
                                                </a>
                                                <a href="php/Download.php?id=<?php echo $row['Id']?>&DwldOper=3" class="btn btn-secondary">
                                                <i class="bi bi-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Comentarios</th>
                                            <td> <?php echo $CDescargada?> </td>
                                            <td></td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=1" class="btn btn-secondary">
                                                <i class="bi bi-chat-square-text"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Descargada2</th>
                                            <td> <img width="100" src="data:image/jpg;base64,<?php echo  base64_encode($Descargada2); ?>"></td>
                                            <td> <?php echo $HDescargada2?> </td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=4" class="btn btn-secondary">
                                                <i class="bi bi-camera"></i>
                                                </a>
                                                <a href="php/Download.php?id=<?php echo $row['Id']?>&DwldOper=4" class="btn btn-secondary">
                                                <i class="bi bi-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Comentarios</th>
                                            <td> <?php echo $CDescargada2?> </td>
                                            <td></td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=1" class="btn btn-secondary">
                                                <i class="bi bi-chat-square-text"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Cargada</th>
                                            <td> <img width="100" src="data:image/jpg;?>;base64,<?php echo  base64_encode($Cargada); ?>"></td>
                                            <td> <?php echo $HCargada?> </td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=5" class="btn btn-secondary">
                                                <i class="bi bi-camera"></i>
                                                </a>
                                                <a href="php/Download.php?id=<?php echo $row['Id']?>&DwldOper=5" class="btn btn-secondary">
                                                <i class="bi bi-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Comentarios</th>
                                            <td> <?php echo $CCargada?> </td>
                                            <td></td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=1" class="btn btn-secondary">
                                                <i class="bi bi-chat-square-text"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Cargada2</th>
                                            <td> <img width="100" src="data:image/jpg;?>;base64,<?php echo  base64_encode($Cargada2); ?>"></td>
                                            <td> <?php echo $HCargada2?> </td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=6" class="btn btn-secondary">
                                                <i class="bi bi-camera"></i>
                                                </a>
                                                <a href="php/Download.php?id=<?php echo $row['Id']?>&DwldOper=6" class="btn btn-secondary">
                                                <i class="bi bi-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Comentarios</th>
                                            <td> <?php echo $CCargada2?> </td>
                                            <td></td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=1" class="btn btn-secondary">
                                                <i class="bi bi-chat-square-text"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Sello</th>
                                            <td> <img width="100" src="data:image/jpg;?>;base64,<?php echo  base64_encode($Sello); ?>"></td>
                                            <td> <?php echo $HSello?> </td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=7" class="btn btn-secondary">
                                                <i class="bi bi-camera"></i>
                                                </a>
                                                <a href="php/Download.php?id=<?php echo $row['Id']?>&DwldOper=7" class="btn btn-secondary">
                                                <i class="bi bi-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Comentarios</th>
                                            <td> <?php echo $CSello?> </td>
                                            <td></td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=1" class="btn btn-secondary">
                                                <i class="bi bi-chat-square-text"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Sello2</th>
                                            <td> <img width="100" src="data:image/jpg;?>;base64,<?php echo  base64_encode($Sello2); ?>"></td>
                                            <td> <?php echo $HSello2?> </td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=8" class="btn btn-secondary">
                                                <i class="bi bi-camera"></i>
                                                </a>
                                                <a href="php/Download.php?id=<?php echo $row['Id']?>&DwldOper=8" class="btn btn-secondary">
                                                <i class="bi bi-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Comentarios</th>
                                            <td> <?php echo $CSello2?> </td>
                                            <td></td>
                                            <td>
                                                <a href="php/Foto.php?id=<?php echo $row['Id']?>&VarOper=1" class="btn btn-secondary">
                                                <i class="bi bi-chat-square-text"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                               </table>

                        </form>
                 </div>
</body>
</html>

<?php 
    }else{

        header('Location: login.php');

    }

?>