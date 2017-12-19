<?php
include "seguridad.php";
include "seguridadProfesor.php";
$link = mysqli_connect("localhost","root","","quiz");
$id = $_POST['id'];

if($_POST['pregunta']!= null){
		$pregunta = $_POST['pregunta'];
		mysqli_query($link,"UPDATE preguntas SET pregunta='$pregunta' WHERE id = '$id'");
}
if($_POST['resCor']!= null){
		$res_correcta = $_POST['resCor'];
		mysqli_query($link,"UPDATE preguntas SET res_correcta='$res_correcta' WHERE id = '$id'");

}
if($_POST['resIn1']!= null){
		$resIn1 = $_POST['resIn1'];
		mysqli_query($link,"UPDATE preguntas SET res_incorrecta1='$resIn1' WHERE id = '$id'");

}
if($_POST['resIn2']!= null){
		$resIn2 = $_POST['resIn2'];
		mysqli_query($link,"UPDATE preguntas SET res_incorrecta2='$resIn2' WHERE id = '$id'");

}
if($_POST['resIn3']!= null){
		$resIn3 = $_POST['resIn3'];
		mysqli_query($link,"UPDATE preguntas SET res_incorrecta3='$resIn3' WHERE id = '$id'");

}
if($_POST['dificultad']!= null){
		$dificultad = $_POST['dificultad'];
		mysqli_query($link,"UPDATE preguntas SET dificultad='$dificultad' WHERE id = '$id'");

}
if($_POST['tema']!= null){
		$tema = $_POST['tema'];
		mysqli_query($link,"UPDATE preguntas SET tema='$tema' WHERE id = '$id'");

}
mysqli_close($link);
?>