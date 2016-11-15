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
	<H2>Paso 1: se crea la variable de sesion y se almacena</H2>
	<?PHP
		$var = "Ejemplo Sesiones";
		$_SESSION['var'] = $var;
		print ("<p>Valor de la variable de sesion: $var</p>\n");
	?>
	<A HREF="lab92.php">Paso 2</A>
</BODY>
<HTML>
