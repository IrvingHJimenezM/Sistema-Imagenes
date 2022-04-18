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
    <link rel="stylesheet" href= "/Sistema Imagenes/css/Buscar.css">
    

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
    
    <div class="container p-4">  
         <div class="row">  
            <div class="col-md-4 mx-auto">   
                  <div class="card card-body"> 
                      <form  method="post" enctype ="multipart/form-data">
                          <!--- Date time--->
                          <p>Fecha a Buscar: <input type="date" id="FechaDTP" name="fechabuscada" > 
                          <!--- Patente--->
                          <div class="form-group">
                              <label for="Folio">Buscar Por Patente</label>
                              <input type="number" name="Patente" class="form-control" value=""placeholder="Patente" autofocus>
                          </div>
                          <!--- Caja--->
                          <div class="form-group">
                              <label for="Anden">Buscar Por Caja</label>
                              <input type="text" name="Caja" class="form-control" value="" placeholder="Caja" autofocus>
                          </div>
                          <input class="btn btn-primary" type="submit" value="Buscar" id ="BtnBuscar"name ="BtnBuscar">
                      </form>
              </div>
           </div>
       </div>
     </div>


    <!--- Tabla donde se Reciben los Resultados de la Busqueda--->
        <div class="col-md-8">
        <table class="table table-bordered">
        <thead>
          <tr>
            <th>Usuario</th>
            <th>Anden</th>
            <th>Patente</th>
            <th>#Caja</th>
            <th>Imagenes</th>
          </tr>
        </thead>
        <tbody>

          <?php
          if (isset($_REQUEST['BtnBuscar'])) {
            
                  $Fecha = $_POST['fechabuscada'];
                  $Patente = $_POST['Patente'];
                  $Caja = $_POST['Caja'];
                  //validamos que no venga ningun campo vacio
                  if(!empty($Fecha) || !empty($Patente) || !empty($Caja)){
 
                    if ($Fecha != null) 
                    {
                      $timestamp = strtotime($Fecha); 
                      $newDate = date("Y-m-d", $timestamp );
                      $query = "SELECT * FROM CajasImg WHERE Fecha ='$newDate'";
                      $result_tasks = mysqli_query($conexion, $query);
                    }
                    if ($Patente != null) 
                    {
                      $query = "SELECT * FROM CajasImg WHERE Patente ='$Patente'";
                      $result_tasks = mysqli_query($conexion, $query);
                    }
                    if ($Caja != null) 
                    {
                      $query = "SELECT * FROM CajasImg WHERE NumCaja ='$Caja'";
                      $result_tasks = mysqli_query($conexion, $query);
                    }
                      while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                      <tr>
                        <td><?php echo $row['User']; ?></td>
                        <td><?php echo $row['Anden']; ?></td>
                        <td><?php echo $row['Patente']; ?></td>
                        <td><?php echo $row['NumCaja']; ?></td>
                    
                        <td>
                          <a href="Agregar.php?id=<?php echo $row['Id']?>" class="btn btn-secondary">
                          <i class="bi bi-eye"></i>
                          </a>
                        </td>
                      </tr>
              
              <?php } }}?>
        </tbody>
      </table>
    </div>
    <script src="/Sistema Imagenes/js/jquery/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

<?php 
    }else{

        header('Location: login.php');

    }

?>

