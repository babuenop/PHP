<HTML LANG="ES">
<HEAD>
	<TITLE>Laboratorio 7.2</title>
	<Link REL="stylesheet" TYPE="TEXT/css" href="css/estilo.css">
</HEAD>
<body>
<?PHP
	$conexion = mysqli_connect ("localhost","root","")
		or die ("No se puede conectar al servidor");
	mysqli_select_db($conexion,"labsdb")
		or die ("No se puede seleccionar BD");
		
	$instruccion="CALL sp_listar_votos()";
	
	if($stmt = mysqli_prepare($conexion,$instruccion)){
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$votos1,$votos2);
		mysqli_stmt_fetch($stmt);		
		mysqli_stmt_close($stmt);
	}
	else {
		echo "Error al ejecutar la cantidad de votos existente";		
	}
	
	$totalVotos = $votos1 + $votos2;
	
	print ("<TABLE>\n");
	
	print ("<TR>\n");
	print ("<TH>Respuesta</TH>\n");
	print ("<TH>Votos</TH>\n");
	print ("<TH>Porcentaje</TH>\n");
	print ("<TH>Representacion Grafica</TH>\n");	
	print ("</TR>\n");
	$porcentaje = round (($votos1/$totalVotos)*100.2);
	print ("<TR>\n");
	print ("<TD CLASS='izquierda'>Si </TD>\n");
	print ("<TD CLASS='derecha'>$votos1</TD>\n");
	print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
	print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");	
	print ("</TR>\n");
	$porcentaje = round (($votos2/$totalVotos)*100.2);
	print ("<tr>\n");
	print ("<TD CLASS='izquierda'>No </TD>\n");
	print ("<TD CLASS='derecha'>$votos2</TD>\n");
	print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
	print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");	
	print ("</TR>\n");
	
	print ("</TABLE>\n");
	print ("<p>Numero total de votos emitidos: $totalVotos </P>\n");
	print ("<p><A HREF='lab71.php'>Pagina de Votacion</A></P>\n");
	mysqli_close ($conexion);
	
	?>
</body>
</html>
