<?PHP
	if(isset($_COOKIE['contador']))
		{
		setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 *60 * 60);
		$mensaje = 'Gracias por visitarnos. Número de Visitas: ' .$_COOKIE['contador'];		
		}
		else
		{
			//caduca en un año
			setcookie('contador', 1, time() + 365 * 24 *60 * 60);
			$mensaje = 'Bienvenido a nuestro sitio web';
		}
?>
<HTML XMLNS="http://wwww.w3.org/1999/xhtml" xml:lang="es" LANG="es">
<HEAD>
<TITLE>Laboratorio 10</TITLE>
<LINK REL="stylesheet" TYPE= "text/css" HREF="css/estilo.css">
</HEAD>

<BODY>
	<H1> Contador de Visitas con Cookies</H1>
	<p>
	<H3><?PHP  echo $mensaje; ?></H3>
	</p>
</BODY>
<HTML>
