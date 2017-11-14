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
		<span class="right" id = "registrar"><a href="registrar.php">Registrarse</a></span>
      		<span class="right" id = "login"><a href="login.php">Login</a></span>
      		<span class="right" id = "logout" style="display:none;"><a href="layout.php">Logout</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php' id="inicio">Inicio</a></spam>
		<span><a href='creditos.php' id = "creditos">Creditos</a></spam>
		<span style="display:none;" id='showInsertar'><a id ="insertar" href='insertarPregunta.php'>Insertar preguntas</a> </spam>
		<span style="display:none;" id='showPreguntas'><a id ="preguntas" href='verPreguntas.php'>Ver preguntas</a> </spam>
		<span style="display:none;" id='showGestionar'><a id ="gestionar" href='gestionPreguntas.php'>Gestionar preguntas</a> </spam>
		
	</nav>
    <section class="main" id="s1">
    
	<div>
		<h1></br></br></br></br>Bienvenido</h1>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

<?php
$email = $_GET["email"];
if(isset($email)){
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>';
echo "<script>$('#showInsertar').show(); $('#showPreguntas').show();$('#logout').show();$('#login').hide();$('#registrar').hide(); $('#showGestionar').show();</script>";
echo "<script> $('#inicio').attr('href','layout.php?email=$email'); $('#creditos').attr('href','creditos.php?email=$email') </script>";
echo "<script> $('#insertar').attr('href','insertarPregunta.php?email=$email'); $('#preguntas').attr('href','verPreguntas.php?email=$email')</script>";
echo "<script> $('#s1').text('Bienvenido $email')</script>";
echo "<script> $('#gestionar').attr('href','gestionPreguntas.php?email=$email');</script>";
}

?>



