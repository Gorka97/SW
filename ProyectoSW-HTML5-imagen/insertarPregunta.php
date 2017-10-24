<HTML>
<script>
function goBack() {
    window.history.back();
}
</script> 
</HTML>
<?php
	$link = mysqli_connect("localhost","id2956013_root","********","id2956013_quiz");
	$imagen = $_FILES['imagen']['name'];
	if ($_FILES["imagen"]["tmp_name"]!=NULL){
		$carpeta = $_SERVER['DOCUMENT_ROOT'].'/ProyectoSW-HTML5-imagen/ProyectoSW-HTML5-imagen/fotos/';
		move_uploaded_file($_FILES["imagen"]["tmp_name"],$carpeta.$imagen);
	}
	$sql="INSERT INTO preguntas(email,pregunta,res_correcta,res_incorrecta1,res_incorrecta2,res_incorrecta3,dificultad,tema,imagen) VALUES ('$_POST[email]','$_POST[pregunta]','$_POST[res_correcta]','$_POST[res_incorrecta1]','$_POST[res_incorrecta2]','$_POST[res_incorrecta3]','$_POST[dificultad]','$_POST[tema]','$imagen')";
	if(!mysqli_query($link,$sql))
	{
		echo "<input type='button' onclick='goBack()' value='Go Back'>";
		die ('Error:' .mysqli_error($link));
	}
	echo "1 record added";
	echo "<p> <a href='verPreguntas.php'> Ver registro </a>";
	mysqli_close($link);

?>
