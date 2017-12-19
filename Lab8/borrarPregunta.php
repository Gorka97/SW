<?php
include "seguridad.php";
include "seguridadProfesor.php";
$link = mysqli_connect("localhost","root","","quiz");
$id = $_POST['id'];

mysqli_query($link,"DELETE FROM preguntas WHERE id = '$id'");

mysqli_close($link);
?>