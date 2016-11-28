<?php
  session_start(); 
  include "conexion.php";
  $query="SELECT * FROM articulos ORDER BY idArticulo desc";
  $resultado=$con->query($query);
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
          <h5>ARTICULOS<!-- Titulo --><small><!-- Subtitulo --></small></h5>
        </div>   	
        <?php while($row=$resultado->fetch_assoc()){ ?>
          
       
          <div class="row">
             <div class="col-sm-6 col-md-4">
               <div class="thumbnail">
                 <?php echo("<img src=img/".$row['Imagen']." width=200 height=200 alt=...>")?>;
                  </div>
              </div>
          
              <div class="col-sm-6 col-md-8">
                <div class="thumbnail"> 
                  <div class="caption">
                    <!--   Nombre del Articulo -->
                      <h3><?php echo $row['Articulo'];?></h3> 
                    <!--   Detalle del Articulo -->
                      <p><?php echo $row['Detalle'];?></p>
                    <!--   Cantidad en Stock -->
                      <p>In Stock <?php echo $row['stock'];?> Und</p>
                    <!--   Precio -->
                      <h4><b>$ 4.50</b></h4>
                    <p>
                      <a href="./articulo.php" class="btn btn-info" role="button">Mas...</a> 
                      <a href="#" class="btn btn-warning" role="button">Agregar</a></p><br>
                    </p>
                  </div>
                </div>
              </div>
              <br>
            </div>
        <?php } ?>
    </div>
  </div>


</body>
</html>