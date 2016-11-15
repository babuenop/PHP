<?php

error_reporting(E_ALL ^ E_NOTICE );

session_start();

if (isset($_REQUEST['usuario']) && isset ($_REQUEST['clave']));
{
	$usuario = $_REQUEST['usuario'];
	$clave = $_REQUEST['clave'];
	
	//Comprobar que el usuario esta autorizado a entrar
	$conexion =mysqli_connect("localhost","root","")
	or die ("No se puede conectar con el servidor");
	mysqli_select_db ($conexion,"labsdb")
	or die ("Nose puede seleccionar la base de datos");
	$salt = substr ($usuario, 0, 2);
	$clave_crypt = crypt ($clave, $salt);
	$instruccion = "call sp_validar_usuario(?,?)";
	
	if($stmt = mysqli_prepare($conexion, $instruccion)){
		mysqli_stmt_bind_param($stmt,'ss', $usuario, $clave_crypt);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $nfilas);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
	}
	else{
		echo "Error al validar usuario en la base de datos";
	}
	mysqli_close($conexion);
	//los datos introducidos son correctos 
	if ($nfilas >0)
	{
		$usuario_valido = $usuario;
		$_SESSION["usuario_valido"] = $usuario_valido;
	}
	
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<HTML lang="es">
<HEAD>
<TITLE>Laboratorio 11 - Login al sitio de noticias </title>
<LINK rel="stylesheet" type="text/css" href="http://localhost/DS7/Lab11/css/estilo.css">
</HEAD>

<BODY>
<?PHP 
//Sesion iniciada 
if(isset($_SESSION["usuario_valido"]))
{
	?>
	<H1>Gestion de Noticias</H1>
	<HR>
	<UL>
		<LI> <A HREF="lab112.php">Listar todas las noticias</A>
		<LI> <A HREF="lab113.php">Listar noticias por partes</A>
		<LI> <A HREF="lab114.php">Buscar noticia</A>
	</ul>
	
	<HR>
	<P>[ <A href='logout.php'>Desconectar</a>]</p>
<?php
}
//Intento de entrada fallido
		else if (isset ($usuario))
		{
			print ("<BR><BR>\n");
			print ("<p Align='CENTER'>Acceso no autorizado</p>\n");
			print ("<p Align='CENTER'>[ <A HREF='login.php'>Conectar</A>]</p>\n");			
		}
//sesion no iniciada 
		else{
			print ("<BR><BR>\n");
			print ("<p class='parrafocentrado'>Esta zona tiene acceso restringido.<BR>".
					"para entrar debe identificarse</p>\n");
			print ("<FORM CLASS='entrada' NAME='login' ACTION='login.php' METHOD='POST'>\n");
			
			print("<P><LABEL CLASS ='etiqueta-entrada'>Usuario:</LABEL>\n");
			print("		<INPUT TYPE='TEXT' NAME='usuario' SIZE='15'></p>\n");
			print("<P><LABEL CLASS ='etiqueta-entrada'>Clave:</LABEL>\n");
			print("		<INPUT TYPE='PASSWORD' NAME='clave' SIZE='15'></p>\n");
			print("<P><INPUT TYPE='SUBMIT' VALUE='entrar'></P>\n");
			print("</FORM>\n");
			
			print("<p class='parrafocentrado'>NOTA: Si no dispone de identificacion o tiene problemas ".
				"para entrar<br>pongase en contacto con el " .
				"<A HREF='MAILTO:webmaster@localhost'> administrador</a> del sitio </p>\n ");
			}
	

?>
</BODY>
</HTML>



