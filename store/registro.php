<?php session_start(); ?>
<html>
	<head>
		<title>Registro</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">

       <div class="page-header">
          <h5>CREAR CUENTA<!-- Titulo --><small></small></h5>
        </div>   
<div class="col-md-6">
		<form role="form" name="registro" action="php/registro.php" method="post">
		  <div class="form-group">
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo">
		  </div>
		  <div class="form-group">
		     <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
		  </div>
		  <div class="form-group">
		    <h5>Contrase&ntilde;a</h5>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
		  </div>
		  <div class="form-group">
		    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Contrase&ntilde;a">
		  </div>

		  <button type="submit" class="btn btn-default">Registrar</button>
		</form>
		</div>
		</div>
		</div>

		<script src="js/valida_registro.js"></script>
	</body>
</html>