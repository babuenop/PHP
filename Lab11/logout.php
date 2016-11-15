<?php
session_start();
?>
<HTML lang="es">
<HEAD>
<TITLE>Desconectar</TITLE>
<LINK rel="stylesheet" type="text/css" href="css/estilo.css">
</HEAD>
<BODY>
<?PHP 
	if (isset($_SESSION["usuario_valido"]))
	{
		session_destroy ();
		print ("<BR><BR><P ALING='CENTER'>Conexion Finalizada</p>\n");
		print ("<P ALIGN='CENTER'>[ <A HREF='login.php'>Conectar</A>]</P>\n");	}
	else
	{
		print ("<BR><BR>\n");
		print ("<P ALIGN='CENTER'>No existe una conexion activa</P>\n");
		print ("<P ALIGN='CENTER'>[ <A HREF='login.php'>Conectar</A>]</P>\n");
	}
?>
</BODY>
</HTML>



