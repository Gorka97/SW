<?php
if($_SESSION['tipo']!= 'profesor'){
	header("Location: layout.php");
}
?>