<?PHP
	session_start ();
?>
<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 9</TITLE>
<LINK REL="stylesheet" TYPE= "text/css" HREF="css/estilo.css">
</HEAD>

<BODY>
	<H1> Manejo de sesiones</H1>
	<H2>Paso 3: La variable ha sido destruida y su valor se ha perdido</H2>

	<?PHP
		if(isset($SESSION['VAR']))
		{
			$var = $SESSION['VAR'];				
		}
		else
		{
			$var = "";
		}
		print ("<p>Valor de la variable de sesión: $var</p>");
		session_destroy();
	?>
<A HREF="lab91.php">Volver al paso 1</A>

</BODY>
<HTML>
