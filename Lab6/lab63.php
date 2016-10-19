<html lang="es">
<head>
	<title>Laboratorio 6.1</title>
	<LINK REL="stylesheet" TYPE="text/css" HREF="http://localhost/DS7/Lab6/css/estilo.css">
	
</head>

<body>
<H1> Consulta de Clientes </H1>
<BR/><BR/>

<?php

$conexion = mysqli_connect ("localhost","root","")
	or die ("No se puede conectar la base de datos");

mysqli_select_db ($conexion, "utp231")
	or die("No se puede seleccionar la base de datos");

$instruccion = "CALL sp_listar_clientes();";
$consulta = mysqli_query ($conexion, $instruccion)
	or die("Fallo en la consulta". mysqli_error($conexion));

$nfilas = mysqli_num_rows($consulta);

if($nfilas > 0)
{
	print("<TABLE> \n ");
	print("<TR> \n");
	print("<TH>ID</TH> \n");
	print("<TH>Cedula</TH> \n");
	print("<TH>Nombre</TH> \n");
	print("<TH>Apellido</TH> \n" );
	print("</TR>\n");

	for ($i=0; $i<$nfilas; $i++)
	{
		$resultado = mysqli_fetch_array($consulta);
		print("<TR> \n");
		print("<TD>" .$resultado ['ID'] . "</TD> \n");
		print("<TD>" .$resultado ['Cedula'] . "</TD> \n");
		print("<TD>" .$resultado ['Nombre'] . "</TD> \n");
		print("<TD>" .$resultado ['Apellido'] . "</TD> \n");
		
	}
	print("</TABLE> \n ");
}
else
{
	print("No hay clientes disponibles");
}
mysqli_close($conexion)
?>


</body>

</html>