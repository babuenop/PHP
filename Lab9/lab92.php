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
	<H2>Paso 2: se accede a la variable de sesion almacenada y se destruye</H2>

	<?PHP
		if(isset($_SESSION['var']))
		{
		$var = $_SESSION['var'];
		print ("<p>Valor de la variable de sesion: $var</p>\n");
		unset ($_SESSION['var']);
		print ("<A HREF='lab93.php'>Paso 3</A>");
		}
		else
		{
			print("Sesion no iniciada, ir al <A HREF='lab91.php'>Paso 1</A> para iniciar la sesion");
		}
	?>

</BODY>
<HTML>
