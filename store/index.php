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
      
          <form action="php/Insertarcanasta.php" method="post">
           <div class="col-sm-6 col-md-8">
            <div class="thumbnail"> 
              <!-- Variables ocultas para insertar productos en carrito -->
              <input type="hidden" class="text" id="Idarticulo" name="Idarticulo" value="<?php echo "$row[Idarticulo]";?>">
              <input type="hidden" class="text" id="Articulo" name="Articulo" value="<?php echo "$row[Articulo]";?>">
              <input type="hidden" class="text" id="Precio" name="Precio" value="<?php echo "$row[Precio]";?>">
              <input type="hidden" class="text" id="Talla" name="Talla" value="<?php echo "$row[Talla]";?>">
              <input type="hidden" class="text" id="UserId" name="UserId" value="<?php echo "$_SESSION[user_id]";?>">
              <input type="hidden" class="text" id="Status" name="Status" value="PENDIENTE">
                    <!-- Detalle Visible para el Usuario -->
                    <!--   IdArticulo -->
                      <h4><?php echo "Codigo: ".$row['Idarticulo'];?></h4>
                      
                    <!--   Nombre del Articulo -->
                      <h3><?php echo $row['Articulo'];?></h3> 
                    <!--   Detalle del Articulo -->
                      <p><?php echo $row['Detalle'];?></p>
                    <!--   Cantidad a Reservar  -->
                      <p>Reservar <input type="number"  class="input"  id="sizing-addon2" name="cantidad"> Unidades<p>
                      <p>In Stock <?php echo $row['stock'];?> Und</p>
                    <!--   Precio -->
                      <h4><b>$ <?php echo $row['Precio'];?></b></h4>
                      <p>
              <a href="./articulo.php" class="btn btn-info" role="button">Mas...</a>       
              <input type="submit" class="btn btn-warning" value="Reservar">
          </form>    
                      
                   <script src="js/valida_agregar.js"></script>
                 
                </div>
              </div>
              </form>
              <br>
            </div>
        <?php } ?>
    </div>
  </div>


</body>
</html>