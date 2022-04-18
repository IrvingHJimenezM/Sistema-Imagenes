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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href= "/Sistema Imagenes/css/Agregar.css">

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" > <?php echo 'Bienvenido '.$nombre; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Elementos" aria-controls="Elementos" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="Elementos">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Buscar.php">Buscar</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" id="CerrarSesion" href="/Sistema Imagenes/php/salir.php">Cerrar sesión</a>
                    </li>
                
                </ul>
            </div>
        </div>
   </nav>
 <!-- modal de comentarios-->
 <div class="modal fade" id="Modal_de_Comentarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comentarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <textarea class="form-control" id="MdComentario"></textarea>
            <h3>    </h3>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="EliminarComentario" class="btn btn-danger">Eliminar Comentario</button>
        <button type="button" id="GuardarComentario"class="btn btn-success">Guardar Comentario</button>
      </div>
    </div>
  </div>
</div>
<!--==-->
 <!-- modal de fotografia -->
    <div class="modal fade" id="Modal_de_Fotografia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Fotografia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card" style="width: 26rem;">
                <div class="card-body">
                    <form >
                        <img class="card-img-top" id="photo" class="photo">
                        <input type="file" accept="image/*" capture="camera" id="camera" name="camera" />
                    </form>
                </div>
              </div>
        </div>
        <div class="modal-footer">
             <button class="btn btn-primary" type="submit" id="BtnGuardarFotografia" name ="BtnGuardarFotografia">Guardar Foto</button>
        </div>
        </div>
      </div>
    </div>
<!--==-->
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
                                <input type="hidden" name="ValorId" id="ValorId" value="<?php echo $id; ?>">
                                <input type="hidden" name="ValorUser" id="ValorUser" value="<?php echo $nombre; ?>">
                                </fieldset>
                         </form>
                    </div>
            </div>
        </div>
   </div>
   <!--IMAGENES/TABLA -->
       <div class="container">    
             <div class="row">   
                  <div class="col">   
                       <form action="Agregar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                             <table class="table align-middle table-success table-striped table-bordered border-dark border-3" id="TablaCaja" >
                                    <thead >
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
                                            <button type="button" class="btn btn-secondary"  id="ComentarioLLegada" data-bs-toggle="modal" data-bs-target="#Modal_de_Comentarios"><i class="bi bi-chat-square-text"></i></button>

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
                                            <button type="button" class="btn btn-secondary" id="ComentarioLLegada2" data-bs-toggle="modal" data-bs-target="#Modal_de_Comentarios"><i class="bi bi-chat-square-text"></i></button>

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
                                            <button type="button" class="btn btn-secondary" id="ComentarioDescargada" data-bs-toggle="modal" data-bs-target="#Modal_de_Comentarios"><i class="bi bi-chat-square-text"></i></button>

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
                                            <button type="button" class="btn btn-secondary" id="ComentarioDescargada2" data-bs-toggle="modal" data-bs-target="#Modal_de_Comentarios"><i class="bi bi-chat-square-text"></i></button>

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
                                            <button type="button" class="btn btn-secondary" id="ComentarioCargada" data-bs-toggle="modal" data-bs-target="#Modal_de_Comentarios"><i class="bi bi-chat-square-text"></i></button>


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
                                            <button type="button" class="btn btn-secondary" id="ComentarioCargada2" data-bs-toggle="modal" data-bs-target="#Modal_de_Comentarios"><i class="bi bi-chat-square-text"></i></button>

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
                                            <button type="button" class="btn btn-secondary" id="ComentarioSello" data-bs-toggle="modal" data-bs-target="#Modal_de_Comentarios"><i class="bi bi-chat-square-text"></i></button>

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
                                            <button type="button" class="btn btn-secondary" id="ComentarioSello2" data-bs-toggle="modal" data-bs-target="#Modal_de_Comentarios"><i class="bi bi-chat-square-text"></i></button>

                                            </td>
                                        </tr>
                                    </tbody>
                               </table>

                        </form>

                  </div>
             </div>
       </div>
       <script src="/Sistema Imagenes/js/jquery/jquery-3.6.0.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       <script src="/Sistema Imagenes/js/Modal.js"></script>
       <script src="/Sistema Imagenes/js/script.js"></script>
       
      <!--Función actualizar-->
      <script type="text/javascript">
      function actualizar(){location.reload(true);}
      //Función para actualizar cada 20 segundos(20000 milisegundos)
      setInterval("actualizar()",20000);
      </script>
    </body>
</html>

<?php 
    }else{

        header('Location: login.php');

    }

?>