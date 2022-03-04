<?php 
session_start(); 
include "conexion.php";

if (isset($_POST['usuario']) && isset($_POST['pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$User = validate($_POST['usuario']);
	$Pass = validate($_POST['pass']);

	if (empty($User)) {
		header("Location: /Sistema Imagenes/Login.php?error=Usuario Requerido");
	    exit();
	}else if(empty($Pass)){
        header("Location: /Sistema Imagenes/Login.php?error=Contraseña Requerida");
	    exit();
	}else{
		$sql = "SELECT * FROM Users WHERE Usuario='$User' AND Contraseña='$Pass'";

		$result = mysqli_query($conexion, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Usuario'] === $User && $row['Contraseña'] === $Pass) {
            	$_SESSION['Usuario'] = $row['Usuario'];
            	header("Location: /Sistema Imagenes/Index.php");
		        exit();
            }else{
				header("Location: /Sistema Imagenes/Login.php?error=Usuario o Contraseña Incorrecta");
		        exit();
			}
		}else{
			header("Location: /Sistema Imagenes/Login.php?error=Usuario o Contraseña Incorrecta");
	        exit();
		}
	}
	
}else{
	header("Location: /Sistema Imagenes/Login.php");
	exit();
}