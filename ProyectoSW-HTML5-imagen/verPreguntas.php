<?php
	$link = mysqli_connect("localhost","root","root","quiz");
	$datos = mysqli_query($link,"select * from preguntas");
	echo '<table border=1> <tr> <th> EMAIL  </th>  <th> PREGUNTA  </th> <th> RESPUESTA CORRECTA  </th> <th> RESPUESTA INCORRECTA 1  </th> <th> RESPUESTA INCORRECTA 2  </th> <th> RESPUESTA INCORRECTA 3 </th> <th> DIFICULTAD  </th> <th> TEMA  </th> <th> IMAGEN  </th>
	</tr>';
	while($row = mysqli_fetch_array($datos)){
		echo '<tr> <td>'.$row['email'].'</td> <td>'.$row['pregunta'].'</td> <td>'.$row['res_correcta'].'</td> <td>'.$row['res_incorrecta1'].'</td> <td>'.$row['res_incorrecta2'].'</td> <td>'.$row['res_incorrecta3'].'</td> <td>'.$row['dificultad'].'</td> <td>'.$row['tema'].'</td> <td>'.'<img src ="fotos/'.$row['imagen'].'"/>'.'</td> </tr>';
	}
	echo '</table>';
	$datos->close();
	mysqli_close($link);
	?>