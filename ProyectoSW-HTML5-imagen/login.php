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
$mysql= mysqli_connect("localhost","root","","quiz") or die(mysql_error());
$email=$_POST['email']; $pass=$_POST['pass'];
$usuarios = mysqli_query( $mysql,"select * from usuarios where email='$email' and
pass='$pass'");
$cont= mysqli_num_rows($usuarios);
mysqli_close( $mysql);
if($cont==1){ header("Location: layout.php?email=$email");}
else {echo ("Par&aacute;metros de login incorrectos<p>");}}
?>	
