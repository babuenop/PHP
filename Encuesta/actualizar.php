<?php
	
	require('conexion.php');
	
	$id=$_GET['id'];

	$query="SELECT PREGUNTA, TIPO, OPCION1, OPCION2, OPCION3, OPCION4, OPCION5, OPCION6 FROM PREGUNTAS WHERE ID='$id'";
	
	$resultado=$conexion->query($query);
	
	$row=$resultado->fetch_assoc();
	
?>

<html>
	<head>
		<title>Mantenimiento</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "navbar.php"; ?>


	<div class="container">
			<div class="row">
				<div class="col-md-6">

					<form role="form" name="registro" action="saveactualizar0.php" method="post">
					<h1>Actualizar pregunta Pregunta</h1>
					<br>											
					    <input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $id; ?>">	

					    <label for="pregunta">Pregunta</label>
					    <input type="text" class="form-control" id="pregunta" name="pregunta" VALUE="<?php echo $row['PREGUNTA']; ?>">	

					    <label for="tipo">Tipo de Pregunta</label>
					    <select name="tipo" class="form-control" id="tipo" name="tipo">
							<option value="<?php echo $row['TIPO']; ?>" select>
						
							</option> 
							<option value="radio">Elección simple</option> 
							<option value="checkbox">Elección múltiple</option>
							<option value="radio">Elección binaria</option>
						</select>					   					   					   
					
					    <label for="opcion1">Opción 1</label>
					    <input type="text" class="form-control" id="opcion1" name="opcion1" VALUE="<?php echo $row['OPCION1']; ?>">
					
					    <label for="opcion2">Opción 2</label>
					    <input type="text" class="form-control" id="opcion2" name="opcion2" VALUE="<?php echo $row['OPCION2']; ?>">
					
					    <label for="opcion3">Opción 3</label>
					    <input type="text" class="form-control" id="opcion3" name="opcion3" VALUE="<?php echo $row['OPCION3']; ?>">
					
					    <label for="opcion4">Opción 4</label>
					    <input type="text" class="form-control" id="opcion4" name="opcion4" VALUE="<?php echo $row['OPCION4']; ?>">
					
					    <label for="opcion5">Opción 5</label>
					    <input type="text" class="form-control" id="opcion5" name="opcion5" VALUE="<?php echo $row['OPCION5']; ?>">
					
					    <label for="opcion6">Opción 6</label>
					    <input type="text" class="form-control" id="opcion6" name="opcion6" VALUE="<?php echo $row['OPCION6']; ?>">		
					    <br>																						 
						
						<INPUT TYPE="submit" NAME="enviar" VALUE="Guardar"><BR>						
					</form>
				</div>
			</div>
		</div>		
	</body>
</html>	
