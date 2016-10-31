
		<?PHP
		//require('conexion.php');
		if(array_key_exists('enviar',$_POST))
		{			
			
			if ($_REQUEST['pregunta'] != "" && $_REQUEST['tipo'] != ""  && $_REQUEST['opcion1'] != ""  && $_REQUEST['opcion2']) 
			{
					
					$pregunta = $_POST['pregunta'];
					$tipo = $_POST['tipo'];
					$opcion1 = $_POST['opcion1'];
					$opcion2 = $_POST['opcion2'];
					$opcion3 = $_POST['opcion3'];
					$opcion4 = $_POST['opcion4'];
					$opcion5 = $_POST['opcion5'];
					$opcion6 = $_POST['opcion6'];
					
					$link = mysqli_connect("localhost", "root", "");
					mysqli_select_db($link, "encuesta");
		
					mysqli_query($link, "INSERT INTO `PREGUNTAS` (`ID`, `PREGUNTA`, `TIPO`, `OPCION1`, `OPCION2`, `OPCION3`, `OPCION4`, `OPCION5`, `OPCION6`) VALUES (NULL, '$pregunta', '$tipo', '$opcion1', '$opcion2', '$opcion3', '$opcion4', '$opcion5', '$opcion6');");
					mysqli_close($link); 
						
					print "<script>alert(\"Su pregunta se ha guardado exitosamente.\");window.location='../mantenimiento/index.php';</script>";
				}
					else{
					print "<script>alert(\"Debe completar todos los datoSs\")";
					}
			}

		?>