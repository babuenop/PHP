<?php session_start(); ?>
<html>
	<head>
		<title>Crear Articulo</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; 
?>
		<div class="container">
			<div class="row">

     		  <div class="page-header">
         	  	<h5>ADJUNTAR IMAGEN<!-- Titulo --><small></small></h5>
        	  </div>   
		<div class="col-md-6">
				<form action = "Articulo_CargarImagen.php" method="post" enctype="multipart/form-data">
				<input type="file" name="nombre_archivo_cliente" /><br/><br/>
				<input type="submit" name="enviar" value="Enviar" />
			</form>
		</div>
		</div>
		</div>	
		

	</body>
</html>