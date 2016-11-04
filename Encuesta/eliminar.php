<?php 
	
	require('conexion.php');
	
	$id=$_GET['id'];
	
	$query="DELETE FROM PREGUNTAS WHERE id='$id'";
	
	$resultado=$conexion->query($query);
	
?>

<html>
	<head>
		<title>Eliminar pregunta</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Pregunta Eliminada</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar pregunta</h1>
				
			<?php	} ?>
			<p></p>		
			
			<a href="mantenimiento.php" class="btn btn-primary">Regresar</a>
			
		</center>
	</body>
</html>