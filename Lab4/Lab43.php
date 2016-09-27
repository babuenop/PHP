<!DOCTYPE HTML>
<html>
<head>
<title>Laboratorio 4.3</title>
</head>

<body>
<h3>Cantidad de Vocales</h3>

<?PHP
	if(array_key_exists('Enviar', $_POST)){
		if ($_REQUEST['Texto'] !="")
		{
			echo "El Texto es $_REQUEST[Texto]";
			echo "<br>";
			echo "La cantidad de vocales son:";
		}

		dibuja_formulario();
	}
		function dibuja_formulario ($Texto="")
		{
		echo "<FORM ACTION ='lab43.php' METHOD = 'POST'>";
		echo "Nombre: <INPUT TYPE= 'TEXT' NAME='Ingrese el Texto'>$texto <br>";
		echo "<INPUT TYPE= 'SUBMIT' NAME='Enviar' VALUE='Enviar datos'></FORM>";
		}
		
?>
</body>
</html>
