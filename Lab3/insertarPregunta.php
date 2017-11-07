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
      		<span class="right"><a href="layout.php">Logout</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php' id="inicio">Inicio</a></spam>
		<span><a href='creditos.php'id="creditos">Creditos</a></spam>
		<span><a id ="insertar" href='insertarPregunta.php'>Insertar preguntas</a> </spam>
		<span><a id ="preguntas" href='verPreguntas.php'>Ver preguntas</a> </spam>
	</nav>
    <section class="main" id="s1">
    
	<div>
        <h1>Cuestionario</h1>
        
        <form action="insertarPregunta.php" method="post" name="formulario" id="formulario" enctype="multipart/form-data">
    Email: <input type="email" id="email"  value="" name="email"> <!--pattern="(([a-z]{1,})+([0-9]{3}))+@ikasle\.ehu\.+(es|eus)" required--> <br><br>
    Pregunta:   <input type="text" id="pregunta" value="" name="pregunta"> <!--required--><br><br>
   Respuesta Correcta:   <input type="text" id="resCor" value="" name="res_correcta"> <!--required--><br><br>
   Respuesta Incorrecta 1: <input type="text" id="resIn1"value="" name="res_incorrecta1"> <!--required--><br><br>
    Respuesta Incorrecta 2: <input type="text" id="resIn2"  value="" name="res_incorrecta2"> <!-- required--><br><br>
     Respuesta Incorrecta 3: <input type="text" id="resIn3"  value="" name="res_incorrecta3"> <!-- required--><br><br>
    Dificultad (1-5): <input type="text" id="dificultad"  value="" name="dificultad"> <!-- pattern="[1-5]" required--><br><br>
    Tema: <input type="text" id="tema"  value="" name="tema"> <!--required--><br><br>
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
$email = $_GET["email"];
if(isset($email)){

echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>';
echo "<script> $('#inicio').attr('href','layout.php?email=$email'); $('#creditos').attr('href','creditos.php?email=$email');$('#insertar').attr('href','insertarPregunta.php?email=$email');$('#preguntas').attr('href','verPreguntas.php?email=$email')</script>";
echo "<script>$('#showInsertar').show(); $('#showPreguntas').show();$('#logout').show();$('#login').hide();$('#registrar').hide();</script>";

echo "<script> $('#email').attr('value','$email');</script>";
echo "<script> $('#formulario').attr('action','insertarPregunta.php?email=".$email."');</script>";

}
	if (isset($_POST['dificultad'])){
	$link = mysqli_connect("localhost","root","","quiz");
	$imagen = $_FILES['imagen']['name'];
	if ($_FILES["imagen"]["tmp_name"]!=NULL){
		$carpeta = $_SERVER['DOCUMENT_ROOT'].'ProyectoSW-HTML5-imagen/fotos/';
		move_uploaded_file($_FILES["imagen"]["tmp_name"],$carpeta.$imagen);
	}
	

	if (!preg_match("/(([a-z]{1,})+([0-9]{3}))+@ikasle\.ehu\.+(es|eus)\b/",$_POST['email'])){
		echo "Email incorrecto";	
	}else{
		if (!preg_match("/[1-5]\b/",$_POST['dificultad'])){
			echo "Dificultad incorrecta";
		}else{
			if (strlen($_POST['pregunta']) < 10){
				echo "Pregunta demasiado corta";
			}else{
				if(empty($_POST['email'])|| empty($_POST['pregunta'])|| empty($_POST['res_correcta'])||empty($_POST['res_incorrecta1'])||empty($_POST['res_incorrecta2'])||empty($_POST['res_incorrecta3'])||empty($_POST['dificultad'])||empty($_POST['tema'])){
					echo "Rellene todos los campos obligatorios";
				}else{
					$sql="INSERT INTO preguntas(email,pregunta,res_correcta,res_incorrecta1,res_incorrecta2,res_incorrecta3,dificultad,tema,imagen) VALUES ('$_POST[email]','$_POST[pregunta]','$_POST[res_correcta]','$_POST[res_incorrecta1]','$_POST[res_incorrecta2]','$_POST[res_incorrecta3]','$_POST[dificultad]','$_POST[tema]','$imagen')";
					$xml = simplexml_load_file('preguntas.xml');
					
					$assessmentItem = $xml->addChild('assessmentItem');
					$assessmentItem->addAttribute('complexity',$_POST['dificultad']);
					$assessmentItem->addAttribute('subject',$_POST['tema']);
					$assessmentItem->addAttribute('author',$_POST['email']);
					
					$itemBody = $assessmentItem -> addChild('itemBody');
					$itemBody -> addChild('p',$_POST['pregunta']);
					
					$correctResponse = $assessmentItem -> addChild('correctResponse');
					$correctResponse -> addChild('value',$_POST['res_correcta']);
					
					$incorrectResponses = $assessmentItem -> addChild('incorrectResponses');
					$incorrectResponses -> addChild('value',$_POST['res_incorrecta1']);
					$incorrectResponses -> addChild('value',$_POST['res_incorrecta2']);
					$incorrectResponses -> addChild('value',$_POST['res_incorrecta3']);
					
					echo $xml->asXML();
					$xml->asXML('preguntas.xml');

					if(!mysqli_query($link,$sql))
					{
						die ('Error:' .mysqli_error($link));
					}
					echo "1 record added";
					echo "<p> <a href='verPreguntas.php'> Ver registro </a>";
					
				}
			}
		}
	}	
		
	
	mysqli_close($link);
	}
?>
					