
<html>
	<head>
		<title>Crear Pregunta</title>
		<Link REL="stylesheet" TYPE="TEXT/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "navbar.php"; ?>

		<div class="container">
			<div class="row">
				<div class="col-md-6">

					<form role="form" name="registro" action="saveinsertar.php" method="post">
					<h1>Crear Pregunta</h1>
					<br>											
					    <label for="pregunta">Pregunta</label>
					    <input type="text" class="form-control" id="pregunta" name="pregunta" placeholder="Pregunta">	

					    <label for="tipo">Tipo de Pregunta</label>
					    <select name="tipo" class="form-control" id="tipo" name="tipo">
							<option value="" select></option> 
							<option value="radio">Elección simple</option> 
							<option value="checkbox">Elección múltiple</option>
							<option value="radio">Elección binaria</option>
						</select><br>					    
					
					    <label for="opcion1">Opción 1</label>
					    <input type="text" class="form-control" id="opcion1" name="opcion1" placeholder="Opción 1">
					
					    <label for="opcion2">Opción 2</label>
					    <input type="text" class="form-control" id="opcion2" name="opcion2" placeholder="Opción 2">
					
					    <label for="opcion3">Opción 3</label>
					    <input type="text" class="form-control" id="opcion3" name="opcion3" placeholder="Opción 3">
					
					    <label for="opcion4">Opción 4</label>
					    <input type="text" class="form-control" id="opcion4" name="opcion4" placeholder="Opción 4">
					
					    <label for="opcion5">Opción 5</label>
					    <input type="text" class="form-control" id="opcion5" name="opcion5" placeholder="Opción 5">
					
					    <label for="opcion6">Opción 6</label>
					    <input type="text" class="form-control" id="opcion6" name="opcion6" placeholder="Opción 6">		
					    <br>																						 
						
						<INPUT TYPE="submit" class="btn btn-primary" NAME="enviar" VALUE="Grabar"><BR>			
					</form>
				</div>
			</div>
		</div>
	</body>
</html>