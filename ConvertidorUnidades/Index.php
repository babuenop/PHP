<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<head>
<title>Parcial 2</title>

<link href="http://localhost/DS7/ConvertidorUnidades/css/estilo.css" rel="stylesheet">
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
			$resultado = $valor * $ayardas;
			$resultado= round($resultado, 2);

			echo "<br>".$valor." mts equivale a: ".$resultado." yd";
		
			$link = mysqli_connect("localhost", "root", "");
			mysqli_select_db($link, "labsdb");
			mysqli_query($link, "INSERT INTO parcial2 VALUES (NULL, '$valor', '$resultado', 'mts -> yd')");
			mysqli_close($link); 
			
		
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
			echo "<br>".$valor." yd equivale a: ".$resultado." mts";
			
			$link = mysqli_connect("localhost", "root", "");
			mysqli_select_db($link, "labsdb");
			mysqli_query($link, "INSERT INTO parcial2 VALUES (NULL, '$valor', '$resultado', 'yd -> mts')");
			mysqli_close($link); 
			
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
<br><br><br>

<?php

$conexion = mysqli_connect ("localhost","root","")
	or die ("No se puede conectar la base de datos");

mysqli_select_db ($conexion, "labsdb")
	or die("No se puede seleccionar la base de datos");

$instruccion = "CALL sp_listar_conversiones();";
$consulta = mysqli_query ($conexion, $instruccion)
	or die("Fallo en la consulta". mysqli_error($conexion));

$nfilas = mysqli_num_rows($consulta);

if($nfilas > 0)
{
	print("<TABLE> \n ");
	print("<TR> \n");
	print("<TH>ID</TH> \n");
	print("<TH>METROS</TH> \n");
	print("<TH>YARDAS</TH> \n");
	print("<TH>CONVERSION</TH> \n" );
	print("</TR>\n");

	for ($i=0; $i<$nfilas; $i++)
	{
		$resultado = mysqli_fetch_array($consulta);
		print("<TR> \n");
		print("<TD>" .$resultado ['ID'] . "</TD> \n");
		print("<TD>" .$resultado ['METROS'] . "</TD> \n");
		print("<TD>" .$resultado ['YARDAS'] . "</TD> \n");
		print("<TD>" .$resultado ['CONVERSION'] . "</TD> \n");
	}
	print("</TABLE> \n ");
}
else
{
	print("No hay resultados disponibles");
}
mysqli_close($conexion)
?>


</body>
</html>
