<HTML LANG="es">
<HEAD>
<TITLE>Ejemplo DataTable JQuery</TITLE>
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
    
<H1> Consulta de noticias</H1>
<?PHP
$conexion = mysqli_connect ("localhost","root", "")
or die ("No se puede conectar con el servidor");

mysqli_select_db ($conexion,"labsdb")
or die ("No se puede seleccionar la base de datos");

$instruccion = "CALL sp_listar_noticias(); ";
$consulta = mysqli_query ($conexion, $instruccion)
	or die ("Fallo en la consulta". mysqli_error ($conexion));
	
$nfilas = mysqli_num_rows ($consulta);

if ($nfilas > 0){
	print ("<TABLE id='grid' class='display' 'cellspacing='0'>\n");
	print ("<THEAD>");
        print ("<TR>\n");            
      	print ("<TH>Titulo</TH>\n");
	print ("<TH>Texto</TH>\n");
	print ("<TH>Categoria</TH>\n");
	print ("<TH>Fecha</TH>\n");
	print ("<TH>Imagen</TH>\n");
	print ("</TR>\n");
        print ("</THEAD>");
        print ("<TBODY>");
	
	for ($i=0; $i<$nfilas; $i++){
		$resultado = mysqli_fetch_array ($consulta);
	print ("<TR>\n");
	print ("<TD>" . $resultado['titulo'] ."</TD>\n");
	print ("<TD>" . $resultado['texto'] ."</TD>\n");
	print ("<TD>" . $resultado['categoria'] ."</TD>\n");
	print ("<TD>" . date("j/n/Y",strtotime($resultado['fecha']))."</TD>\n");
	
	if ($resultado['imagen'] != ""){
		print ("<TD><A TARGET='_blank' HREF='img/" . $resultado ['imagen'] ."'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
	}
	else{
		print ("<TD>&nbsp;</TD>\n");
	}
	print ("</TR>\n");
       
	}
         print ("</TBODY>");
	print ("</TABLE>\n");
	}
	else{
		print ("No hay noticias disponibles");
	}
	mysqli_close ($conexion);
	?>
	</BODY>
	</HTML>