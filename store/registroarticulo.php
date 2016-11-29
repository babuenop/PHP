<?php session_start(); ?>
<html>
	<head>
		<title>Registro Articulo</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">

       <div class="page-header">
          <h5>CREAR ARTICULO<!-- Titulo --><small></small></h5>
          <h5>Inserte la imagen del articulo</h5>
        </div>   
<div class="col-md-6">

		<form action = "load.php" method="post" enctype="multipart/form-data">
		<input type="file" name="nombre_archivo_cliente" /><br/><br/>
		<input type="submit" name="enviar" class="btn btn-warning" value="Enviar" />
		</form>
		
		</div>
		</div>
		</div>
	</body>
</html>