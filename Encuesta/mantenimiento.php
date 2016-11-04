<?php 
	require('conexion.php');

	$query="SELECT id, pregunta, tipo, opcion1, opcion2, opcion3, opcion4, opcion5, opcion6 FROM preguntas";
	
	$resultado=$conexion->query($query);
 ?>
 <html>
	<head>
		<title>Mantenimiento</title>		
	</head>
	<Link REL="stylesheet" TYPE="TEXT/css" href="bootstrap/css/bootstrap.min.css">
	<body>
<?php include "navbar.php"; ?>
	
	<div class="container">
		
		<h1>Mantenimiento</h1>
		
		
		<a href="Insertar.php" class="btn btn-primary">Crear Pregunta</a>
		<p></p>
		
		<table border=1 width="80%">
			<thead>
				<tr>
					<td><b>ID</b></td>
					<td><b>Pregunta</b></td>
					<td><b>Tipo</b></td>
					<td><b>Opcion1</b></td>
					<td><b>Opcion2</b></td>
					<td><b>Opcion3</b></td>
					<td><b>Opcion4</b></td>
					<td><b>Opcion5</b></td>
					<td><b>Opcion6</b></td>
					<td></td>
					<td></td>
				</tr>
				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td> <?php echo $row['id'];?> </td>
							<td> <?php echo $row['pregunta'];?> </td>
							<td> <?php echo $row['tipo'];?> </td>
							<td> <?php echo $row['opcion1'];?> </td>
							<td> <?php echo $row['opcion2'];?> </td>
							<td> <?php echo $row['opcion3'];?> </td>
							<td> <?php echo $row['opcion4'];?> </td>
							<td> <?php echo $row['opcion5'];?> </td>
							<td> <?php echo $row['opcion6'];?> </td>
							
							<td>
								<a href="actualizar.php?id=<?php echo $row['id'];?>">Modificar</a>
							</td>

							<td>
								<a href="eliminar.php?id=<?php echo $row['id'];?>">Eliminar</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		</body>
	</html>	
	
