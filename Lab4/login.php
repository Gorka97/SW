<!DOCTYPE html>
<html>
<form action="login.php" method="post" name="login" id="login" enctype="multipart/form-data" >

<p> Email : <input type="email" required name="email" size="21" value="" />
<p> Contraseña : <input type="password" required name="pass" size="21" value="" />
<p> <input id="input_2" type="submit" />

</form>
</html>

<?php
	if (isset($_POST['email'])){
$mysql= mysqli_connect("localhost","id2956013_root","rootroot","id2956013_quiz") or die(mysql_error());
$email=$_POST['email']; $pass=$_POST['pass'];
$usuarios = mysqli_query( $mysql,"select * from usuarios where email='$email' and
pass='$pass'");
$cont= mysqli_num_rows($usuarios);
mysqli_close( $mysql);
if($cont==1){ echo "<script>window.location.assign('layout.php?email=$email');</script>";}
else {echo ("Par&aacute;metros de login incorrectos<p>");}}
?>	
