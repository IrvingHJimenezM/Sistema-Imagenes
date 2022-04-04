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
    <title>Inicio</title>
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
        <a class="navbar-brand" href="Index.php">Inicio</a>
        <a class="navbar-brand" href="Buscar.php">Buscar</a>
        <a id="CerrarSesion" href="/Sistema Imagenes/php/salir.php">Cerrar sesión</a>
      </div>
    </nav>

  
   
<div class="col-md-8">
     <table class="table table-bordered">
        <thead>
          <tr>
            <th>Anden</th>
            <th>Patente</th>
            <th>#Caja</th>
            <th>Imagenes</th>
          </tr>
        </thead>
        <tbody>

          <?php
          date_default_timezone_set('America/Chicago');
          $Fecha = date('Y-m-d');
          $query = "SELECT * FROM CajasImg WHERE Fecha ='$Fecha'";
          $result_tasks = mysqli_query($conexion, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['Anden']; ?></td>
            <td><?php echo $row['Patente']; ?></td>
            <td><?php echo $row['NumCaja']; ?></td>
            <td>
              <a href="Agregar.php?id=<?php echo $row['Id']?>" class="btn btn-secondary">
              <i class="bi bi-eye"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</body>
</html>

<?php 
    }else{

        header('Location: login.php');

    }

?>