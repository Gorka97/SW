
<?php
$xml = simplexml_load_file('preguntas.xml');
echo '<table border=1> <tr> <th> PREGUNTA  </th> <th> DIFICULTAD  </th> <th> TEMA  </th> </tr>';

foreach ($xml->assessmentItem as $assessmentItem) {
    $attributes = $assessmentItem->attributes();
    $pregunta = $assessmentItem->itemBody->p;
    echo "<tr> <td>". utf8_decode($pregunta)."</td> <td>". utf8_decode($attributes['subject'])."</td> <td>".$attributes['complexity']."</td></tr>";
	}
    echo "</table>"
?>
