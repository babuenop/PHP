<?php
session_start();
?>
<?php
if (isset($_SESSION["usuario_valido"]))
{
	print ("<P>[<A HREF='login.php'>Menu Principal</A>]</P>");
?>
<html lang="es">
<head>
	<title>Laboratorio 6.2</title>
	<LINK REL="stylesheet" TYPE="text/css" HREF="http://localhost/DS7/Lab6/css/estilo.css">
	
</head>

<body>
<H1> Consulta de noticias </H1>

<FORM NAME="FormFiltro" METHOD ="post" ACTION="lab62.php">
<br>
Filtrar por: <SELECT NAME="campos">
<OPTION VALUE="texto" SELECTED>Texto
<OPTION VALUE="titulo" SELECTED>Titulo 
<OPTION VALUE="categoria" SELECTED>Categoria
</select>
Con el valor
<input TYPE="text" NAME="valor">
<input Name="ConsultarFiltro" value="Filtrar datos" TYPE="Submit">
<input Name="ConsultarTodos" value="Ver todos" TYPE="Submit">
</FORM>

<?php

$conexion = mysqli_connect ("localhost","root","")
	or die ("No se puede conectar la base de datos");

mysqli_select_db ($conexion, "labsdb")
	or die("No se puede seleccionar la base de datos");

$instruccion = "CALL sp_listar_noticias(); ";

if(array_key_exists('ConsultarTodos', $_POST)){
	$instrucion = "CALL sp_listar_noticias(); ";
}
if(array_key_exists('ConsultarFiltro',$_POST)){
	if($_REQUEST['valor']!=""){
		$instruccion = "CALL sp_listar_noticias_filtro('".$_REQUEST['campos']."','".$_REQUEST['valor']."'); ";
	}
	else{
		$instruccion = "CALL sp_listar_noticias_filtro('".$_REQUEST['campos']."','&nbsp');";
	}
}
	
$consulta = mysqli_query ($conexion, $instruccion)
	or die("Fallo en la consulta". mysqli_error($conexion));

$nfilas = mysqli_num_rows($consulta);

if($nfilas > 0)
{
	print("<TABLE> \n ");
	print("<TR> \n");
	print("<TH>Titulo</TH> \n");
	print("<TH>Texto</TH> \n");
	print("<TH>Categoria</TH> \n");
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
			print("<TD>&nbps</TD>\n");
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
<?php
}
else 
	{
		print ("<BR><BR>\n");
		print ("<p Align='CENTER'>Acceso no autorizado</p>\n");
		print ("<p Align='CENTER'>[ <A HREF='login.php'>Conectar</A>]</p>\n");			
	}
?>