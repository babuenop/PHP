<HTML LANG="ES">
<HEAD>
	<TITLE>Encuesta</title>
	<Link REL="stylesheet" TYPE="TEXT/css" href="bootstrap/css/bootstrap.min.css">
</HEAD>
<body>
<?php include "navbar.php"; ?>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<H1>Encuesta</H1>
			<h3>Responda todas las preguntas</h3>
		</div>
	</div>		
</div>



<?PHP
$conexion = mysqli_connect ("localhost","root","")
	or die ("No se puede conectar la base de datos");

mysqli_select_db ($conexion, "encuesta")
	or die("No se puede seleccionar la base de datos");

$instruccion = "CALL sp_listar_preguntas();";
$consulta = mysqli_query ($conexion, $instruccion)
	or die("Fallo en la consulta". mysqli_error($conexion));

$nfilas = mysqli_num_rows($consulta);

if($nfilas > 0)
{
	
	for ($i=1; $i<$nfilas; $i++)
	{
		$resultado = mysqli_fetch_array($consulta);
		
		print("<FORM action=votar.php method=POST>");
		print("<div class=container>");
		print("<div class=row>
			
		<br>");
		
		print ("<H3> " .$i ." - " .$resultado ['PREGUNTA'] . "</H3>");		
		if ($resultado['OPCION1'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . " id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION1'] . "<br>");
		}
		if ($resultado['OPCION2'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . " id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION2'] . "<br>");
		}
		if ($resultado['OPCION3'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . " id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION3'] . "<br>");
		}
		if ($resultado['OPCION4'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . " id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION4'] . "<br>");
		}
		if ($resultado['OPCION5'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . " id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION5'] . "<br>");
		}
		if ($resultado['OPCION6'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . " id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION6'] . "<br>");
		}
		
		print("<BR><INPUT TYPE=submit class=btn btn-info NAME=enviar VALUE=Votar><BR>");
		
		
		
		print("</form>");
	}
	
}
else
{
	print("No hay noticias disponibles");
}
mysqli_close($conexion)

?>

</BODY>
</HTML>
	