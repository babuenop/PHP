<HTML LANG="ES">
<HEAD>
	<TITLE>Encuesta</title>
	<Link REL="stylesheet" TYPE="TEXT/css" href="bootstrap/css/bootstrap.min.css">
</HEAD>
<body>



<?php 
include "navbar.php"; 

print ("<div class=container>");
	print("<div class=row>");
		print("<div class=col-md-6>");
			print("<H1>Encuesta</H1>");
			print ("<h3>Responda todas las preguntas</h3>");
		print("</div>");
	print("</div>");
print("</div>");
?>

<?php
require('conexion.php');
$instruccion = "CALL sp_listar_preguntas ();";
$consulta = mysqli_query ($conexion, $instruccion)
	or die("Fallo en la consulta ". mysqli_error($conexion));
$nfilas = mysqli_num_rows($consulta);

if($nfilas > 0)
{
	
	for ($i=1; $i<=$nfilas; $i++)
	{
		$resultado = mysqli_fetch_array($consulta);
		
		print("<FORM action=registrarVoto.php method=POST>");
		print("<div class=container>");
		print("<div class=row>

			
		<br>");
		print ("<input type=hidden name=idpregunta value=".$i." /><br>");
		print ("<input type=hidden name=idresult value=".$resultado ['TIPO']." /><br>");
		
		print ("<H3> " .$i ." - " .$resultado ['PREGUNTA'] . "</H3><br>");		
		if ($resultado['OPCION1'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . "1 id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION1'] . "<br>");
		}
		if ($resultado['OPCION2'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . "2 id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION2'] . "<br>");
		}
		if ($resultado['OPCION3'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . "3 id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION3'] . "<br>");
		}
		if ($resultado['OPCION4'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . "4 id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION4'] . "<br>");
		}
		if ($resultado['OPCION5'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . "5 id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION5'] . "<br>");
		}
		if ($resultado['OPCION6'] != "") {
		print ("<input name=" .$resultado ['TIPO'] . "6 id=" .$resultado ['TIPO'] . " value=1 type=" .$resultado ['TIPO'] . "> " .$resultado ['OPCION6'] . "<br>");
		}
		
		print("<BR><INPUT TYPE=submit class=btn btn-info NAME=enviar VALUE=Votar><BR>");
		
		
		
		print("</form>");
	}
	
}
else
{
	print("<h3>No hay preguntas disponibles<h3>");
}

mysqli_close($conexion)

?>

</BODY>
</HTML>
	