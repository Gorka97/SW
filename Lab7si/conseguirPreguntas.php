	<?php
	include "seguridad.php";
	include "seguridadProfesor.php";
	$link = mysqli_connect("localhost","root","","quiz");
	$seleccion = $_POST['id'];
	$resultado = mysqli_query($link,"SELECT email,pregunta,res_correcta,res_incorrecta1,res_incorrecta2,res_incorrecta3,dificultad,tema FROM preguntas WHERE id = '$seleccion'");
	$datos = mysqli_fetch_row($resultado);
	echo '<br>Email: <input type="text" id="email"  name="email" readonly value="'.$datos[0].'" pattern="(([a-z]{1,})+([0-9]{3}))+@ikasle\.ehu\.+(es|eus)" required> <br><br>
    Pregunta:   <input type="text" id="pregunta" name="pregunta" placeholder="'.$datos[1].'" required><br><br>
	Respuesta Correcta:   <input type="text" id="resCor" name="res_correcta" placeholder="'.$datos[2].'" required><br><br>
	Respuesta Incorrecta 1: <input type="text" id="resIn1" name="res_incorrecta1" placeholder="'.$datos[3].'" required><br><br>
    Respuesta Incorrecta 2: <input type="text" id="resIn2" name="res_incorrecta2" placeholder="'.$datos[4].'" required><br><br>
    Respuesta Incorrecta 3: <input type="text" id="resIn3" name="res_incorrecta3" placeholder="'.$datos[5].'" required><br><br>
    Dificultad (1-5): <input type="text" id="dificultad" name="dificultad" placeholder="'.$datos[6].'" pattern="[1-5]" required><br><br>
    Tema: <input type="text" id="tema" name="tema" placeholder="'.$datos[7].'" required><br><br>';
	
	?>