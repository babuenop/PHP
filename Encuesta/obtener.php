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



<?PHP
require('conexion.php');
$instruccion2 = "CALL sp_obtener_id ();";
$consulta = mysqli_query ($conexion, $instruccion)
	or die("Fallo en la consulta". mysqli_error($conexion));
$nfilas = mysqli_num_rows($consulta);
$resultado = mysqli_fetch_array($consulta);
		
		print ("<p>".$resultado ['id'] ."<p>");
		
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
		
		print ("<p>".$resultado ['id'] ."<p>");
		
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
	