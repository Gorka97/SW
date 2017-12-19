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
		<span class="right" id="registrar"><a href="registrar.php">Registrarse</a></span>
      		<span class="right"id="login"><a href="login.php">Login</a></span>
      		<span class="right" id="logout" style="display:none;"><a href="logout.php">Logout</a></span>
			<span class="right" id='email2'><p></p></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php' id="inicio">Inicio</a></span>
		<span><a href='creditos.php'id="creditos">Creditos</a></span>
		<span style="display:none;" id='showGestion'> <a id ="gestion" href='gestionPreguntas.php'>Gestionar preguntas</a> </span>
		<span style="display:none;" id='showRevisar'> <a id ="revisar" href='revisarPreguntas.php'>Revisar preguntas</a> </span>
		<span style="display:none;" id='showEliminar'><a id ="eliminar" href='eliminarPregunta.php'>Eliminar preguntas</a> </span>
		
	</nav>
    <section class="main" id="s1">
    
	<div>
	   <h1>Créditos</h1>
        
        <form action="prog.php" method="post" name="formulario" id="formulario" ">
    Nombres:
    <ul>
        <li> Iñigo Libano
        <li> Gorka Arce
    </ul>
    Especialidad: Ingeniería del Software<br>
    <img src="https://www.kasandbox.org/programming-images/animals/birds_rainbow-lorakeets.png" width="200px"> 
    <footer id='f1'>
		<p><a id="volver" href="layout.php">Volver a inicio</a></p>
	</footer>
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
session_start();
if(isset($_SESSION["email"])){
$email = $_SESSION["email"];
$tipo = $_SESSION["tipo"];
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>";
echo "<script> $('#email2').text('$email')</script>";
if($tipo == 'profesor'){
	echo "<script>$('#showRevisar').show(); $('#logout').show();$('#login').hide();$('#registrar').hide();$('#showEliminar').show();</script>";
}else{
	echo "<script>$('#showGestion').show(); $('#logout').show();$('#login').hide();$('#registrar').hide();</script>";
}}
?>