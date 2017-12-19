<?php
include "seguridad.php";
include "seguridadProfesor.php";
?>
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
      	<span class="right"><a href="logout.php">Logout</a></span>
		<span class="right" id='email2'><p></p></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Inicio</a></span>
		<span><a href='creditos.php'>Creditos</a></span>
		<span><a href='revisarPreguntas.php'>Revisar preguntas</a></span>
		<span><a id ="eliminar" href='eliminarPregunta.php'>Eliminar preguntas</a> </span>

	</nav>
    <section class="main" id="s1">
    
	<div>
        <h1>Revisar</h1>
		
	<form action="cambiarPreguntas.php" method="post" name="cambiar" id="formulario" enctype="multipart/form-data" >
	<?php
	$link = mysqli_connect("localhost","root","","quiz");
	
	echo "<select id=seleccion>"; 
	$resultado=mysqli_query($link,"SELECT id, pregunta FROM preguntas"); 
	while ($fila=mysqli_fetch_row($resultado)){ 
		echo "<option selected value='$fila[0]'>$fila[1]</option>";	
	} 
	echo "</select>";
		mysqli_close($link);
	
	?>
	<div id="inputs" style="display:none;"><br>
	</div>
	<input style="display:none;" id="enviar" type="button" value="Enviar"/>
</form>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>

	
  $("#enviar").click(function(){
	$seleccion = $("#seleccion").val();
	$.ajax({
		url : 'cambiarPreguntas.php',
		type:'post', 
		data: { 'id' : $seleccion ,'pregunta':$('#pregunta').val(),'resCor':$('#resCor').val(),'resIn1':$('#resIn1').val(),'resIn2':$('#resIn2').val(),'resIn3':$('#resIn3').val(),'dificultad':$('#dificultad').val(),'tema':$('#tema').val()},
		cache : false,
		success: function(){
			window.location.assign('revisarPreguntas.php');
		}
	}); 
});
  
$("#seleccion").change(function(){
	$("#inputs").show();
	$("#enviar").show();
	$("#borrar").show();
	$seleccion = $("#seleccion").val();
	 $.ajax({
		url : 'conseguirPreguntas.php',
		type:'post', 
		data: { 'id' : $seleccion},
		cache : false,
		success: function(d){
			$("#inputs").html(d);
		}
	}); 
});

</script>

<?php
$email=$_SESSION['email'];
echo "<script> $('#email2').text('$email')</script>";

?>