<HTML LANG="ES">
<HEAD>
	<TITLE>Laboratorio 7.1</title>
	<Link REL="stylesheet" TYPE="TEXT/css" href="css/estilo.css">
</HEAD>
<body>
<?PHP
if(array_key_exists('enviar',$_POST))
{
	print("<h1>Encuesta. Voto Registrado</h1>\n");
	
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
	
	$voto = $_REQUEST['voto'];
	if ($voto == "si")
		$votos1 = $votos1 + 1;
	else if($voto == "no")
		$votos2 = $votos2 + 1;
		
	$instruccion= "CALL sp_actualizar_votos(?,?)";
	
	if($stmt = mysqli_prepare($conexion,$instruccion)){
		mysqli_stmt_bind_param($stmt,'ss', $votos1, $votos2);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	else{
		echo ("Error al actualizar los votos");
	}
	
	mysqli_close($conexion);
	
	print ("<p>Su voto ha sido registrado. Gracias por participar</p>\n");
	print ("<A HREF='Encuesta.php'>Ver resultados</A>\n");
	}
	else
	{
?>

<H1>ENCUESTA</H1>

<P>¿Cree usted que el precio de la vivienda seguira subiendo al ritmo actual?</p>

<FORM action="lab71.php" method="POST">
	<INPUT TYPE="Radio" NAME="voto" VALUE="si" CHECKED>Si<BR>
	<INPUT TYPE="RADIO" NAME="voto" VALUE="no">No<BR><BR>
	<INPUT TYPE="submit" NAME="enviar" VALUE="votar"><BR>
	</form>
	
	<A HREF="LAB72.PHP">Ver Resultados</A>
	
	<A HREF="LAB72.PHP">Ver Resultados</A>
	
<?php
}
?>

</BODY>
</HTML>
	