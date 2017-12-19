<?php include "seguridadAnonimo.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right"><a href="registrar.php">Registrarse</a></span>
      		<span class="right"><a href="login.php">Login</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Inicio</a></span>
		<span><a href='creditos.php'>Creditos</a></span>
	</nav>
    <section class="main" id="s1">
    
	<div>
<form action="login.php" method="post" name="login" id="login" enctype="multipart/form-data" >

<p> Email : <input type="email" required name="email" size="21" value="" />
<p> Contraseña : <input type="password" required name="pass" size="21" value="" />
<p> <input id="input_2" type="submit" value="Enviar"/><br>
<span><a href='recuperarContrasena.html'>¿Has olvidado tu contraseña?</a></span>
	</div>
	</form>
	</div>
</body>
</html>

<?php
if (isset($_POST['email'])){
	$passHash=crypt($_POST['pass'],"Ap");
	$mysql= mysqli_connect("localhost","root","","quiz") or die(mysql_error());
	$email=$_POST['email'];
	$usuarios = mysqli_query( $mysql,"select * from usuarios where email='$email' and pass='$passHash'");
	$cont= mysqli_num_rows($usuarios);
	mysqli_close( $mysql);
if($cont==1){
	echo "$email";
	echo "$passHash";

	if($email=='web000@ehu.es' && $passHash=='ApkjckbtW8Aek'){
		$_SESSION["autentificado"]='SI';
		$_SESSION["email"]=$email;
		$tipo='profesor';
		$_SESSION["tipo"]=$tipo;
		echo "$tipo";
		header ("Location:layout.php");
	}else{
	$_SESSION["email"]=$email;
	$_SESSION["tipo"]='alumno';
	header ("Location:layout.php");
}}
else {
	echo ("Par&aacute;metros de login incorrectos<p>");
	}
}
?>	
