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
    <title>Foto de LLegada</title>
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
    <?php
                if (isset($_REQUEST['BtnGuardar'])) {
                    if (isset($_FILES['camera']['name'])) {
                        $id = $_GET['id'];
                        $tipoArchivo = $_FILES['camera']['type'];
                        $nombreArchivo = $_FILES['camera']['name'];
                        $tamanoArchivo = $_FILES['camera']['size'];
                        $imagenSubida = fopen($_FILES['camera']['tmp_name'], 'r');
                        $binariosImagen = fread($imagenSubida, $tamanoArchivo);
                        $binariosImagen = mysqli_escape_string($conexion, $binariosImagen);
                        $query = "UPDATE CajasImg  Set LLegada = '$binariosImagen' Where Id ='$id'";
                        $res = mysqli_query($conexion,$query);
                        if ($res) {
                ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Foto Guardada exitosamente
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Error <?php echo mysqli_error($conexion); ?>
                            </div>
                <?php

                        }
                    }
                }
                ?>
    <!-- Tomar Fotografia -->
      <form  method="post" enctype ="multipart/form-data">
      <img id="photo" class="photo">
        <input type="file" accept="image/*" capture="camera" id="camera" name="camera" />
      
      <button class="btn btn-primary" type="submit" id="BtnGuardar" name ="BtnGuardar">Guardar Foto</button>
      </form>

      <script src="/Sistema Imagenes/js/script.js"></script>
    </body>
</html>

<?php 
    }else{

        header('Location: login.php');

    }

?>