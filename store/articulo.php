<?php
session_start();
?>

<html>
  <head>
		<title>STORE</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>

  <div class="container">
	 <div class="row">
     <div class="page-header">
       <h5>Aqui ira el nombre del articulo<small></small></h5>
     </div>

     <h4>Pagina en Construccion</h4>
      <p>Vamos a comprar en Rock&Music <span><a href="./index.php">mas..</a></p>
      
      <form action = "Load.php" method="post" enctype="multipart/form-data">
      <input type="file" name="nombre_archivo_cliente" /><br/><br/>
      <input type="submit" name="enviar" value="Enviar" />
      </form>

    </div>
  </div>


</body>
</html>