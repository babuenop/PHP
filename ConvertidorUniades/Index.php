<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<head>
<title>Parcial 1</title>

<link href="http://localhost/DS7/Lab7/rl-php/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
<form name="contar" method="POST" action="index.php")>
<h1>Convertidor de Unidades de Longitud</h1>
Introduzca el valor: <input type="text" name="valor" value="">
<br><br>
<input value="Convertir mts -> yardas " name='ayardas' type="submit" />
<input value="Convertir yardas -> mts " name='ametros' type="submit" />
</form>

<?php
$ayardas = 1.0936133;
$ametros = 0.9144;
if(array_key_exists('ayardas', $_POST)){
	$valor = $_POST['valor'];
	if ($_REQUEST['valor'] != "") {
		if (is_numeric($valor)){
			$resultado=$valor*$ayardas;
			$resultado= round($resultado, 2);
			echo "<img src='http://localhost/DS7/images/Flechas.PNG' border='0' width='70' height='50' >"; 
			echo "<br>".$valor." mts equivale a: ".$resultado." yd";
		}
		else{
		echo "**Error** <br> El valor ingresado debe ser numerico";
		}
		}
	else 	{
		echo "**Error** <br> No es posible calcular el valor esta vacio";
	}
}
if(array_key_exists('ametros', $_POST)){
	$valor = $_POST['valor'];
	if ($_REQUEST['valor'] != "") {
		if (is_numeric($valor)){
			$resultado=$valor*$ametros;
			$resultado= round($resultado, 2);
			echo "<img src='http://localhost/DS7/images/Flechas.PNG' border='0' width='70' height='50'>"; 
			echo "<br>".$valor." yd equivale a: ".$resultado." mts";
			}
		else{
		echo "**Error** <br> El valor ingresado debe ser numerico";
		}
		}
	else 	{
		echo "**Error** <br> No es posible calcular el valor esta vacio";
	}
}
	
?>
</body>
</html>