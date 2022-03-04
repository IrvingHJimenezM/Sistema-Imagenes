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
    <title>Foto LLegada</title>
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href= "/Sistema Imagenes/css/Index.css">

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

    <!-- Tomar Fotografia -->
      <img id="photo" class="photo">
      <input type="file" accept="image/*" capture="camera" id="camera" />
              
    </body>
</html>

<?php 
    }else{

        header('Location: login.php');

    }

?>