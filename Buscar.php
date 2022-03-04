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
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href= "/Sistema Imagenes/css/Index.css">

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
</body>
</html>

<?php 
    }else{

        header('Location: login.html');

    }

?>