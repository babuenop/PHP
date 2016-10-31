<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">

		<form role="form" name="registro" action="php/registro.php" method="post">
		  <div class="form-group">
		    
			
			<div class="form-group">
		    <label for="username">Nombre</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <label for="fullname">Sexo</label>
		    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo">
		  </div>
		  <div class="form-group">
		    <label for="text">Edad</label>
		    <input type="text" class="form-control" id="email" name="email" placeholder="Correo Electronico">
		  </div>
		  <div class="form-group">
		    <label for="text">provincia</label>
		    <input type="text" class="form-control" id="password" name="password" placeholder="provincia">
		  </div>
		  <div class="form-group">
		    <label for="text">salario</label>
		    <input type="text" class="form-control" id="salario" name="salario" placeholder="salario">
		  </div>
		 		 
		  <button type="submit" class="btn btn-default">Registrar</button>
		<script src="js/valida_registro.js"></script>
		</form>
		</div>
		</div>
		</div>
	</body>
</html>