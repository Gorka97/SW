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
      		<span class="right" style="display:none;"><a href="/logout">Logout</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Inicio</a></spam>
		<span><a href='creditos.php'>Creditos</a></spam>
	</nav>
    <section class="main" id="s1">
    
	<div>
        <h1>Registro</h1>
        
        <form action="registrar.php" method="post" name="registro" id="registro" enctype="multipart/form-data" >
    Email: <input type="email" id="email"  value="" name="email"> <!--pattern="(([a-z]{1,})+([0-9]{3}))+@ikasle\.ehu\.+(es|eus)" required--> <br><br>
    Nombre y Apellidos:   <input type="text" id="nomApe" value="" name="nomApe"> <!--required--><br><br>
	Nick:   <input type="text" id="nick" value="" name="nick"> <!--required--><br><br>
	Password: <input type="password" id="pass"value="" name="pass"> <!--required--><br><br>
	Repetir Password: <input type="password" id="pass2"  value="" name="pass2"> <!-- required--><br><br>
    <input type ="file" name="imagen" id="imagen"/>
   <br />
   <img id="imgSalida" width="10%" height="10%" src="" />
   <br><br>
   <input type="submit" value="  Enviar   " id = "enviar">
   <input type='reset' class="boton" id ="reset">
	</form>
	</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>
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
if (isset($_POST['email'])){
	$link = mysqli_connect("localhost","id2956013_root","********","id2956013_quiz");
	$imagen = $_FILES['imagen']['name'];
	if ($_FILES["imagen"]["tmp_name"]!=NULL){
		$carpeta = $_SERVER['DOCUMENT_ROOT'].'/ProyectoSW-HTML5-imagen2/ProyectoSW-HTML5-imagen/fotos/';
		move_uploaded_file($_FILES["imagen"]["tmp_name"],$carpeta.$imagen);
	}

	if (!preg_match("/(([a-z]{1,})+([0-9]{3}))+@ikasle\.ehu\.+(es|eus)\b/",$_POST['email'])){
		echo "Email incorrecto";	
	}else{
		if (strlen($_POST['pass'])<6){
			echo "Longitud de contraseña demasiado corta";
		}else{
			if (str_word_count($_POST["nomApe"],0)<2){
				echo "Introduzca al menos el nombre y el apellido";
			}else{
				if (strcmp($_POST['pass'],$_POST['pass2']) != 0){
					echo "Las contraseñas no coinciden";
				}else{
					if(empty($_POST['email'])||empty($_POST['nomApe'])||empty($_POST['nick'])||empty($_POST['pass'])||empty($_POST['pass2'])){
						echo "Rellene todos los campos obligatorios";
					}else{
						$sql="INSERT INTO usuarios(email,nomApe,nick,pass,imagen) VALUES ('$_POST[email]','$_POST[nomApe]','$_POST[nick]','$_POST[pass]','$imagen')";
	
						if(!mysqli_query($link,$sql))
						{
							die ('Error:' .mysqli_error($link));
						}
						echo "Registrado correctamente";
						$email = $_POST["email"];
						echo "<script>window.location.assign('layout.php?email=$email');</script>";
				}
			}
		}
	}		
	}
	mysqli_close($link);
}
?>
