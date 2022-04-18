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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href= "/Sistema Imagenes/css/Index.css">

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

  
 <!--TABLA PRINCIPAL -->
      <div class="container">
        <div class="row">
           <div class="col">
               <table class="table table-bordered border-info">
                  <thead class="table-secondary">
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
                          $query = "SELECT * FROM CajasImg WHERE Fecha ='$Fecha' ORDER BY Id DESC";
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
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
      <!--Función actualizar-->
      <script type="text/javascript">
      function actualizar(){location.reload(true);}
      //Función para actualizar cada 30 segundos(30000 milisegundos)
      setInterval("actualizar()",30000);
</script>
</body>
</html>

<?php 
    }else{

        header('Location: login.php');

    }

?>