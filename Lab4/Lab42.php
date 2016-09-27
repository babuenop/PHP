<?php
$valor=$_POST['valor'];

$i;
$factorial=$valor;

for ($i=1;$i<=$valor;$i++){
	$factorial=$i*$factorial;
}
echo "<h3>Calculo Factorial</h3>";
echo "El factorial de ".$valor." es: ".$factorial."";
	
?>
