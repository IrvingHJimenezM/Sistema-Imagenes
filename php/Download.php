<?php
require("conexion.php");
$id = $_GET['id'];
$qry = "SELECT LLegada FROM CajasImg WHERE id=$id";
$res = mysqli_query($conexion,$qry);

while($row = mysqli_fetch_assoc($res)) {
   // $tipo = $row['tipo'];
    $tipo = "image/jpeg";
    $contenido = $row['LLegada']; 
    
 }
header("Content-type: $tipo");
print $contenido; 