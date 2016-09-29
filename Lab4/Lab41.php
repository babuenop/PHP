<?php
$ventas = 100;
$valor = $_POST['valor'];
$porcentaje = $valor/$ventas;

if ($porcentaje>=0.80){
echo "<H2>Resultado</H2>";
echo "<br/> Presupuesto: $".$ventas."";
echo "<br/> Porcentaje: ".$porcentaje*'100'."";
echo "<br/><br/> <img src='http://localhost/DS7/Lab4/Image1.PNG' border='0' width='50' height='50'>";  	
}
if ($porcentaje>=0.50 && $porcentaje<0.8){
echo "<H2>Resultado</H2>";
echo "<br/> Presupuesto: $".$ventas."";
echo "<br/> Porcentaje: ".$porcentaje*'100'."";
echo "<br/><br/> <img src='http://localhost/DS7/Lab4/Image2.PNG' border='0' width='50' height='50'>";  	
}
if ($porcentaje<0.50){
echo "<H1>Resultado</H2>";
echo "<br/> Presupuesto: $".$ventas."";
echo "<br/> Porcentaje: ".$porcentaje*'100'."";
echo "<br/><br/> <img src='http://localhost/DS7/Lab4/Image3.PNG' border='0' width='50' height='50'>";  	
}
?>