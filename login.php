<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet"  href="./css/Login.css">
</head>
<body>
     <form action="/Sistema Imagenes/php/validacion.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Usuario</label>
     	<input type="text" name="usuario" placeholder="Usuario "><br>

     	<label>Contraseña</label>
     	<input type="password" name="pass" placeholder="Contraseña"><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>