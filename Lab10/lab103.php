<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 10</TITLE>
<LINK REL="stylesheet" TYPE= "text/css" HREF="css/estilo.css">
</HEAD>

<BODY>
	<H1> Recuperar valor de una Cookie</H1>
	
	<H2>La cookie "User" tendra solo 5 minutos de duracion</H2>
<?PHP
	if(isset($_COOKIE["user"]))
	{
		echo "<H2> Bienvenido " .$_COOKIE["user"]."!	</H2><BR/>";			
	}
	else
	{		
		echo "<H2> Bienvenido invitado!</H2><br/>";
	}
?>
<BR/> <a href="lab101.php">...Regresar</a> &nbsp;
<BR/> <a href="lab104.php">Continuar...</a>	
</BODY>
</HTML>