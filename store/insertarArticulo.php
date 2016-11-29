<?php session_start(); 
	$idpregunta=$_POST['idpregunta'];
?>
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
          <h5>INSERTE LOS DATOS DEL ARTICULO<small></small></h5>
        </div>   
<div class="col-md-6">

		<form role="form" name="registroarticulo" action="insertarArticulo.php" method="post"> 
		  
		  <div class="form-group">
		    <input type="text" class="form-control" id="Articulo" name="Articulo" placeholder="Nombre Principal">
		  </div>

		   <div class="form-group">
		    <input type="text" class="form-control" id="Detalle" name="Detalle" placeholder="Detalle del Articulo">
		  </div>

		   <div class="form-group">
		    <input type="text" class="form-control" id="Precio" name="Precio" placeholder="Precio">
		  </div>

		   <div class="form-group">
		    <input type="text" class="form-control" id="Talla" name="Talla" placeholder="Talla">
		  </div>

		   <div class="form-group">
		    <input type="Number" class="form-control" id="Stock" name="Stock" placeholder="Stock">
		  </div>
		  
		  <div class="form-group">
		  <input type="text" class="text" id="Imagen" name="Imagen" value=$imagen/>"
		  
		  </div>

		  <button type="submit" class="btn btn-warning">Registrar</button>
		</form>
		</div>
		</div>


		
		</div>
	</body>
</html>