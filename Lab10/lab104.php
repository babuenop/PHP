<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 10</TITLE>
<LINK REL="stylesheet" TYPE= "text/css" HREF="css/estilo.css">
</HEAD>

<BODY>
	<H1> Eliminar Cookie</H1>
<?PHP
	if(isset($_COOKIE["user"]))
	{
		setcookie("user","",time()+60*5);
		echo "<H3> La cookie 'user' ha sido eliminada satisfactoriamente</H3>";			
	}
	else
	{
		echo "<H3> lA cookie 'user' no existe</H3><br/>";
	}

	if(isset($_COOKIE["contador"]))
	{
		setcookie("contador","",time() +365 *24*60*60);
		echo "<H3> La cookie 'contador' ha sido eliminada satisfactoriamente</H3>";			
	}
	else
	{
		echo "<H3> lA cookie 'contador' no existe</H3><br/>";
	}
?>
<a href="lab101.php">Volver al contador de visitas</a>&nbsp;
<a href="lab102.php">Volver al saludo a usuario...</a>
</BODY>
</HTML>