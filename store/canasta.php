<?php
session_start();
$userid=$_SESSION["user_id"];
?>

<html>
  <head>
		<title>STORE</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <LINK REL="stylesheet" TYPE="text/css" HREF="jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="jquery-3.1.1.js"></script>
<script type="text/javascript" language="javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" language="javascript" src="jquery.dataTables.min.js"></script>
</HEAD>
<BODY>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#grid').DataTable( {
            "lengthMenu":[5,10,20,50],
            "order": [[0,"asc"]],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No existen resultados en su busqueda",
                "info": "Mostrando pagina _PAGE_ de _PAGES_ ",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Buscado entre _MAX_ registros en total)",
                "search": "Buscar: ",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });
        
        $("*").css("font-family", "arial").css('font-size', '12px');
    });
    </script>

	</head>
	<body>
	<?php include "php/navbar.php"; 
  include "conexion.php"; 
  $query = "SELECT * FROM Canasta WHERE `UserId`=$userid";
  $resultado=$con->query($query);
  ?>

  <div class="container">
	 <div class="row">
     <div class="page-header">
       <h5>CANASTA<small></small></h5>
      <?php
      $query = mysqli_query ($con, $query)
        or die ("Fallo en la consulta". mysqli_error ($con));
      $nfilas = mysqli_num_rows ($query);
      $Total=0;
      if ($nfilas > 0){
        print ("<TABLE id='grid' class='display' 'cellspacing='0'>\n");
        print ("<THEAD>");
              print ("<TR>\n");            
             
        print ("<TH>IdArticulo</TH>\n");
        print ("<TH>Articulo</TH>\n");
        print ("<TH>Precio</TH>\n");
        print ("<TH>Cantidad</TH>\n");
        print ("<TH>Subtotal</TH>\n");
        print ("<TH>Reservado el</TH>\n");
        print ("<TH>Estado</TH>\n");
        print ("<TH>Editar</TH>\n");
         print ("<TH>Borrar</TH>\n");

        
        print ("</TR>\n");
              print ("</THEAD>");
              print ("<TBODY>");
        
        for ($i=0; $i<$nfilas; $i++){
          $resultado = mysqli_fetch_array ($query);
        print ("<TR>\n");
        
        print ("<TD>" . $resultado['IdArticulo'] ."</TD>\n");
        print ("<TD>" . $resultado['Articulo'] ."</TD>\n");
        print ("<TD>" . $resultado['Precio'] ."</TD>\n");
        print ("<TD class=editable>" . $resultado['Cantidad'] ."</TD>\n");      
        
        $Subtotal=$resultado['Precio']*$resultado['Cantidad'];
        print ("<TD>$ " . $Subtotal ."</TD>\n");           
        print ("<TD>" . date("j/n/Y",strtotime($resultado['Fecha']))."</TD>\n");
        print ("<TD>" . $resultado['Status'] ."</TD>\n"); 

        print ("<TD><button id=button1id name=button1id class=btn btn-warning>Edit</button></TD>");
        print ("<TD><button id=button2id name=button2id class=btn btn-danger>Delete</TD>");
        print ("<TD>");
        print ("</TR>\n");
        $Total=$Total+$Subtotal;             
        }
               print ("</TBODY>");
        print ("</TABLE>\n");
        

        print("<div class=label label-default>");
          print("<div class=input-group-addon>");
             print("<h1><b>Total de la Orden $".$Total."</b></h1>");
            print("</a>
            </div>
        </div></div></div></div>");     
        ?><?php 
}
        else{
          print("<div>");
          print("<div class=jumbotron>");
          print ("<h1>Tu cesta está vacía.</h1>
            <h3><p>Haz que tu cesta de compra sea útil: llénala de productos electrónicos y otros productos.
            <p>Vamos a comprar en Rock&Music <a href=./index.php>mas..</a></p></h3>");
        print("</div>");
          
        }
        mysqli_close ($con);
        ?>



     
      
    




</body>
</html>