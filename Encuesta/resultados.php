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
			print("<H1>Resultados</H1>");
		
		print("</div>");
	print("</div>");
print("</div>");
?>

<?php
require('conexion.php');
$instruccion = "CALL sp_listar_resultados ();";
$consulta = mysqli_query ($conexion, $instruccion)
	or die("Fallo en la consulta ". mysqli_error($conexion));
$nfilas = mysqli_num_rows($consulta);

if($nfilas > 0)
{
	
	for ($i=1; $i<=$nfilas; $i++)
	{
		
		$resultado = mysqli_fetch_array($consulta);
		$Pregunta=$resultado ['PREGUNTA'];
		$OPCION1=$resultado ['OPCION1'];
		$OPCION2=$resultado ['OPCION2'];
		$OPCION3=$resultado ['OPCION3'];
		$OPCION4=$resultado ['OPCION4'];
		$OPCION5=$resultado ['OPCION5'];
		$OPCION6=$resultado ['OPCION6'];
		$votos1=$resultado ['votos1'];
		$votos2=$resultado ['votos2'];
		$votos3=$resultado ['votos3'];
		$votos4=$resultado ['votos4'];
		$votos5=$resultado ['votos5'];
		$votos6=$resultado ['votos6'];
		
		
		$totalVotos = $votos1 + $votos2 + $votos3 + $votos4+ $votos5+ $votos6;
		print("<FORM action=registrarVoto.php method=POST>");
		print("<div class=container>");
		print("<div class=row>

			
		<br>");
		print("<h4>".$Pregunta."<h4>");
		
		print ("<TABLE>\n");
		
		print ("<TR>\n");
		print ("<TH>Respuesta</TH>\n");
	
		print ("<TH>Porcentaje</TH>\n");
		print ("<TH>Representacion Grafica</TH>\n");	
		print ("</TR>\n");
		if ($resultado['OPCION1'] != "") {
		$porcentaje = round (($votos1/$totalVotos)*100.2);
		print ("<TR>\n");
		print ("<TD CLASS='izquierda'>".$OPCION1."</TD>\n");
		print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
		print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");	
		print ("</TR>\n");
		}

		if ($resultado['OPCION2'] != "") {
		$porcentaje = round (($votos2/$totalVotos)*100.2);
		print ("<tr>\n");
		print ("<TD CLASS='izquierda'> ".$OPCION2."</TD>\n");
		print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
		print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");	
		print ("</TR>\n");
		}
		if ($resultado['OPCION3'] != "") {
		$porcentaje = round (($votos3/$totalVotos)*100.2);
		print ("<tr>\n");
		print ("<TD CLASS='izquierda'>".$OPCION3."</TD>\n");
		print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
		print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");	
		print ("</TR>\n");
		}
		if ($resultado['OPCION4'] != "") {
		$porcentaje = round (($votos4/$totalVotos)*100.2);
		print ("<tr>\n");
		print ("<TD CLASS='izquierda'> ".$OPCION4."</TD>\n");
		print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
		print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");	
		print ("</TR>\n");
		}
		if ($resultado['OPCION5'] != "") {
		$porcentaje = round (($votos5/$totalVotos)*100.2);
		print ("<tr>\n");
		print ("<TD CLASS='izquierda'> ".$OPCION5."</TD>\n");
		print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
		print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");	
		print ("</TR>\n");
		}
		if ($resultado['OPCION6'] != "") {
		$porcentaje = round (($votos6/$totalVotos)*100.2);
		print ("<tr>\n");
		print ("<TD CLASS='izquierda'> ".$OPCION6."</TD>\n");
		print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
		print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");	
		print ("</TR>\n");
		}
		print ("</TABLE>\n");
		print ("<H4>Numero total de votos emitidos: $totalVotos </H4>\n");
		
		
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
	