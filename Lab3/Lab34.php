<!DOCTYPE HTML>
<html>
<head>
<title>Laboratorio 3.4</title>
</head>
<body>
<?PHP
	if(array_key_exists('Enviar', $_POST)){
		if ($_REQUEST['Apellido'] !="" && $_REQUEST['Nombre'] !="")
		{
			echo "el apellido ingresado es: $_REQUEST[Apellido]";
			echo "<br>";
			echo "el nombre ingresado es: $_REQUEST[Nombre]";
		}
		else
		{
			$vapellido="";
			$vnombre="";
			if ($_REQUEST['Apellido']==''){
				$vapellido="Favor coloque apellido";
			}
			if ($_REQUEST['Nombre']==''){
				$vnombre="Favor coloque nombre";
			}	
			dibuja_formulario($vnombre,$vapellido);
		}
			
	}
	else{
		dibuja_formulario();
	}
		function dibuja_formulario ($vnombre="",$vapellido="")
		{
		echo "<FORM ACTION ='lab34.php' METHOD = 'POST'>";
		echo "Nombre: <INPUT TYPE= 'TEXT' NAME='Nombre'>$vnombre <br>";
		echo "Apellido: <INPUT TYPE= 'TEXT' NAME='Apellido'>$vapellido <br>";
		echo "<INPUT TYPE= 'SUBMIT' NAME='Enviar' VALUE='Enviar datos'></FORM>";
		}
		
?>
</body>
</html>
