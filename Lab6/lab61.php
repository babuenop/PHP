<html lang="es">
<head>
	<title>Laboratorio 6.1</title>
	<LINK REL="stylesheet" TYPE="text/css" HREF="http://localhost/DS7/Lab6/css/estilo.css">
</head>

<body>
<H1> Consulta de noticias </H1>
Ejemplo de subida de archivos al servidor web
<BR/><BR/>

<?php

$conexion = mysqli_connect ("localhost","root","")
	or die ("No se puede conectar la base de datos");

mysqli_select_db ($conexion, "labsdb")
	or die("No se puede seleccionar la base de datos");

$instruccion = "CALL sp_listar_noticias();";
$consulta = mysqli_query ($conexion, $instruccion)
	or die("Fallo en la consulta". mysqli_error($conexion));

$nfilas = mysqli_num_rows($consulta);

if($nfilas > 0)
{
	print("<TABLE> \n ");
	print("<TR> \n");
	print("<TH>Titulos</TH> \n");
	print("<TH>Texto</TH> \n");
	print("<TH>Categorias</TH> \n");
	print("<TH>Fechas</TH> \n" );
	print("<TH>Imagen</TH> \n");
	print("</TR>\n");

	for ($i=0; $i<$nfilas; $i++)
	{
		$resultado = mysqli_fetch_array($consulta);
		print("<TR> \n");
		print("<TD>" .$resultado ['titulo'] . "</TD> \n");
		print("<TD>" .$resultado ['texto'] . "</TD> \n");
		print("<TD>" .$resultado ['categoria'] . "</TD> \n");
		print("<TD>" .date("j/n/Y",strtotime($resultado['fecha'])) . "</TD> \n");
		if ($resultado['imagen'] != "") 
		{
			print("<TD> <A target = '_blank' href= 'img/" .$resultado ['imagen'] ."'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD> \n");
		}
		else
		{
			print("<TD>&nbps;</TD>\n");
		}	
		print("</TR>\n");
	}
	print("</TABLE> \n ");
}
else
{
	print("No hay noticias disponibles");
}
mysqli_close($conexion)
?>


</body>

</html>