<?php
require("conexion.php");
$id = $_GET['id'];
$DwlOper =$_GET['DwldOper'];

switch ($DwlOper) {
   case 1:
      $qry = "SELECT LLegada FROM CajasImg WHERE id=$id";
      $res = mysqli_query($conexion,$qry);

      while($row = mysqli_fetch_assoc($res)) {
         // $tipo = $row['tipo'];
         $tipo = "image/jpeg";
         $contenido = $row['LLegada']; 
         
      }
      break;
   
   case 2:
      $qry = "SELECT LLegada2 FROM CajasImg WHERE id=$id";
      $res = mysqli_query($conexion,$qry);

      while($row = mysqli_fetch_assoc($res)) {
         // $tipo = $row['tipo'];
         $tipo = "image/jpeg";
         $contenido = $row['LLegada2']; 
         
      }
      break;
   case 3:
      $qry = "SELECT Descargada FROM CajasImg WHERE id=$id";
      $res = mysqli_query($conexion,$qry);

      while($row = mysqli_fetch_assoc($res)) {
         // $tipo = $row['tipo'];
         $tipo = "image/jpeg";
         $contenido = $row['Descargada']; 
         
      }
      break;
   case 4:
      $qry = "SELECT Descargada2 FROM CajasImg WHERE id=$id";
      $res = mysqli_query($conexion,$qry);

      while($row = mysqli_fetch_assoc($res)) {
         // $tipo = $row['tipo'];
         $tipo = "image/jpeg";
         $contenido = $row['Descargada2']; 
         
      }
      break;
      
   case 5:
      $qry = "SELECT Cargada FROM CajasImg WHERE id=$id";
      $res = mysqli_query($conexion,$qry);

      while($row = mysqli_fetch_assoc($res)) {
         // $tipo = $row['tipo'];
         $tipo = "image/jpeg";
         $contenido = $row['Cargada']; 
         
      }
      break;
   case 6:
      $qry = "SELECT Cargada2 FROM CajasImg WHERE id=$id";
      $res = mysqli_query($conexion,$qry);

      while($row = mysqli_fetch_assoc($res)) {
         // $tipo = $row['tipo'];
         $tipo = "image/jpeg";
         $contenido = $row['Cargada2']; 
         
      } 
       break;
   case 7:
      $qry = "SELECT Sello FROM CajasImg WHERE id=$id";
      $res = mysqli_query($conexion,$qry);

      while($row = mysqli_fetch_assoc($res)) {
         // $tipo = $row['tipo'];
         $tipo = "image/jpeg";
         $contenido = $row['Sello']; 
         
      }
      break;
         
   case 8:
      $qry = "SELECT Sello2 FROM CajasImg WHERE id=$id";
      $res = mysqli_query($conexion,$qry);

      while($row = mysqli_fetch_assoc($res)) {
         // $tipo = $row['tipo'];
         $tipo = "image/jpeg";
         $contenido = $row['Sello2']; 
         
      }    
       break;
}

   if ($contenido!= null)
   {
      header("Content-type: $tipo");
      print $contenido; 
   }
   else {
      header("Location: /Sistema Imagenes/Agregar.php?id=$id");
   }

?>
         