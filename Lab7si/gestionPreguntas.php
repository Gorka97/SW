<?php
include("seguridad.php");
include "seguridadAlumno.php";?>
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
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php' id="inicio">Inicio</a></span>
		<span><a href='creditos.php'id="creditos">Creditos</a></span>
		<span><a id ="gestion" href='gestionPreguntas.php'>Gestionar preguntas</a> </span>
	</nav>
    <section class="main" id="s1">
    
	<div>
        <h1>Cuestionario</h1>
        
        <form action="insertarPregunta.php" method="post" name="formulario" id="formulario" enctype="multipart/form-data">
    Email: <input type="email" id="email"  value="" name="email" readOnly pattern="(([a-z]{1,})+([0-9]{3}))+@ikasle\.ehu\.+(es|eus)" required> <br><br>
    Pregunta:   <input type="text" id="pregunta" value="" name="pregunta" required> <br><br>
   Respuesta Correcta:   <input type="text" id="resCor" value="" name="res_correcta" required> <br><br>
   Respuesta Incorrecta 1: <input type="text" id="resIn1"value="" name="res_incorrecta1" required> <br><br>
    Respuesta Incorrecta 2: <input type="text" id="resIn2"  value="" name="res_incorrecta2" required> <br><br>
     Respuesta Incorrecta 3: <input type="text" id="resIn3"  value="" name="res_incorrecta3" required> <br><br>
    Dificultad (1-5): <input type="text" id="dificultad"  value="" name="dificultad" pattern="[1-5]" required> <br><br>
    Tema: <input type="text" id="tema"  value="" name="tema" required> <br><br>
    <input type ="file" name="imagen" id="imagen"/>
   <br />
   <img id="imgSalida" width="10%" height="10%" src="" />
   <br><br>
   <input type="submit" value="  Enviar   " id = "enviar">
   <input type='reset' class="boton" id ="reset">
   	<input type="button" value="verPreguntas" onClick="verPreguntas()">
	<input type="button" value="Insertar Pregunta" onClick="insertarPregunta()">
	</form>
	</div>
	<div id="tablaPreguntas"></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>

function verPreguntas(){
	
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("tablaPreguntas").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","verPreguntasXML.php",true);
	xmlhttp.send();
}
function insertarPregunta(){
	var str = $('#formulario').serialize();
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("tablaPreguntas").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","insertarPregunta.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(str);
}
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgSalida').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imagen").change(function(){
    readURL(this);
});
$('#reset').click(
function resetImagen(){
	$('#imgSalida').attr('src',"");
});
</script>

    </body>
</html>
<?php
$email=$_SESSION['email'];
echo "<script> $('#email').attr('value','$email');</script>";

?>