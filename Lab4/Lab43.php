<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<head>
<title>laboratorio 4.3</title>
</head>
<body>
<form name="contar" method="POST" action="lab43.php")>
<h3>Contar de Vocales</h3><br>
Introduzca un texto: <input type="text" name="texto" value="">
<br><br>
<input value="Contar" name='enviar' type="submit" />
</form>
<?php
if(array_key_exists('enviar', $_POST)){
	if ($_REQUEST['texto'] != "") {
	
function verificar($vocales, $texto){
	$contador=0;
	foreach ($vocales as $vocal) {
		
		$contador += substr_count($texto, $vocal);
	}
	echo "Ingreso ".$contador." vocales";
}
$vocales = array('a','e','i','o','u');
$texto = $_POST['texto'];
verificar($vocales, $texto);
}else
	{
		echo "El texto esta vacio";
	}
}
?>
</body>
</html>