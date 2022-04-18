<?php
require("conexion.php");
$id = $_POST['ValorIdCaja'];
$vTipoComentario= $_POST['TC'];
$vComentario = $_POST['Coment'];
$vAccion =$_POST['Accion'];

$Tc=$_POST['TipoComentario'];
$Id = $_POST['IdCaja'];
if ($vAccion==1) {
    switch ($vTipoComentario) {
        case 1:
            $query = "UPDATE CajasImg  Set ComentLLegada= '$vComentario' Where Id ='$id'";
            $res = mysqli_query($conexion,$query);
            break;
        case 2:
             $query = "UPDATE CajasImg  Set ComentLLegada2= '$vComentario' Where Id ='$id'";
             $res = mysqli_query($conexion,$query);
             break;
        case 3:
            $query = "UPDATE CajasImg  Set ComentDescargada= '$vComentario' Where Id ='$id'";
            $res = mysqli_query($conexion,$query);
             break; 
        case 4:
             $query = "UPDATE CajasImg  Set ComentDescargada2= '$vComentario' Where Id ='$id'";
             $res = mysqli_query($conexion,$query);
             break; 
        case 5:
             $query = "UPDATE CajasImg  Set ComentCargada= '$vComentario' Where Id ='$id'";
             $res = mysqli_query($conexion,$query);
             break; 
        case 6:
             $query = "UPDATE CajasImg  Set ComentCargada2= '$vComentario' Where Id ='$id'";
             $res = mysqli_query($conexion,$query);
             break; 
        case 7:
             $query = "UPDATE CajasImg  Set ComentSello= '$vComentario' Where Id ='$id'";
             $res = mysqli_query($conexion,$query);
             break; 
        case 8:
            $query = "UPDATE CajasImg  Set ComentSello2= '$vComentario' Where Id ='$id'";
            $res = mysqli_query($conexion,$query);
            break;         
    }
}
if ($vAccion==2) {
    switch ($vTipoComentario) {
        case 1:
            $query = "UPDATE CajasImg  Set ComentLLegada= '' Where Id ='$id'";
            $res = mysqli_query($conexion,$query);
            break;
        case 2:
             $query = "UPDATE CajasImg  Set ComentLLegada2= '' Where Id ='$id'";
             $res = mysqli_query($conexion,$query);
             break;
        case 3:
            $query = "UPDATE CajasImg  Set ComentDescargada= '' Where Id ='$id'";
            $res = mysqli_query($conexion,$query);
             break; 
        case 4:
             $query = "UPDATE CajasImg  Set ComentDescargada2= '' Where Id ='$id'";
             $res = mysqli_query($conexion,$query);
             break; 
        case 5:
             $query = "UPDATE CajasImg  Set ComentCargada= '' Where Id ='$id'";
             $res = mysqli_query($conexion,$query);
             break; 
        case 6:
             $query = "UPDATE CajasImg  Set ComentCargada2= '' Where Id ='$id'";
             $res = mysqli_query($conexion,$query);
             break; 
        case 7:
             $query = "UPDATE CajasImg  Set ComentSello= '' Where Id ='$id'";
             $res = mysqli_query($conexion,$query);
             break; 
        case 8:
            $query = "UPDATE CajasImg  Set ComentSello2= '' Where Id ='$id'";
            $res = mysqli_query($conexion,$query);
            break;         
    }
}
if ($vAccion==3) {
     switch ($Tc) {
          case 1:
              $query = "SELECT ComentLLegada FROM CajasImg Where Id ='$Id'";
              break;
          case 2:
              $query = "SELECT ComentLLegada2 FROM CajasImg Where Id ='$Id'";
               break;
          case 3:
              $query = "SELECT ComentDecargada FROM CajasImg Where Id ='$Id'";
               break; 
          case 4:
              $query = "SELECT ComentDescargada2 FROM CajasImg Where Id ='$id'";
               break; 
          case 5:
              $query = "SELECT ComentCargada FROM CajasImg Where Id ='$Id'";
               break; 
          case 6:
              $query = "SELECT ComentCargada2 FROM CajasImg Where Id ='$Id'";
               break; 
          case 7:
              $query = "SELECT ComentSello FROM CajasImg Where Id ='$Id'";
               break; 
          case 8:
              $query = "SELECT ComentSello2 FROM CajasImg Where Id ='$Id'";
              break; 
                  
      }
      $res = mysqli_query($conexion,$query);
      echo $res;   
}
   
   

?>