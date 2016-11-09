<html>

	<head>
		<title>Modificar pregunta</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	
	<body>
		<center>
			
			<?php 					
				
				require('conexion.php');


				$id=$_POST['ID'];
				$pregunta = $_POST['pregunta'];
				$tipo = $_POST['tipo'];
				$opcion1 = $_POST['opcion1'];
				$opcion2 = $_POST['opcion2'];
				$opcion3 = $_POST['opcion3'];
				$opcion4 = $_POST['opcion4'];
				$opcion5 = $_POST['opcion5'];
				$opcion6 = $_POST['opcion6'];

				
				$query="UPDATE `PREGUNTAS` SET `PREGUNTA` = '$pregunta', `TIPO` = '$tipo', `OPCION1` = '$opcion1', `OPCION2` = '$opcion2', `OPCION3` = '$opcion3', `OPCION4` = '$opcion4', `OPCION5` = '$opcion5', `OPCION6` = '$opcion6' WHERE `PREGUNTAS`.`ID` = '$id'";
				
				$resultado=$conexion->query($query);							

				if($resultado>0){
				print "<script>alert(\"Pregunta Modificada\");window.location='../encuesta/mantenimiento.php';</script>";
				?>
				<h1>Pregunta Modificada</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar pregunta</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="index.php" class="btn btn-primary">Regresar</a>
			
		</center>
	</body>
	
</html>
				
				