<?php
	if (isset($_POST['dificultad'])){
	$link = mysqli_connect("localhost","root","","quiz");

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
					$sql="INSERT INTO preguntas(email,pregunta,res_correcta,res_incorrecta1,res_incorrecta2,res_incorrecta3,dificultad,tema) VALUES ('$_POST[email]','$_POST[pregunta]','$_POST[res_correcta]','$_POST[res_incorrecta1]','$_POST[res_incorrecta2]','$_POST[res_incorrecta3]','$_POST[dificultad]','$_POST[tema]')";
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
					