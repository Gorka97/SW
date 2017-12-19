<?php
			session_start();
            $link = mysqli_connect("localhost","root","","quiz");
            if (!$link) {
                        die("error al conectar");
            }
            $email = $_SESSION['email'];
            $sqltotal = "select id from preguntas";
            if(!$querytotal=mysqli_query($link,$sqltotal)){
                die("Ha ocurrido un error");
            }
            $numTotal= (mysqli_num_rows($querytotal));
            $sqlpropias = "select count(id) from preguntas where email = '$email'";
            if(!$querypropias=mysqli_query($link,$sqlpropias)) {
                 die("Ha ocurrido un error");
            }
            $numPropias= (mysqli_fetch_array($querypropias)[0]);
            echo $numTotal."/".$numPropias;
?>