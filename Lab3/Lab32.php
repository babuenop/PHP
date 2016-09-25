<?php
$precio1 = $_POST['precio1'];
$precio2 = $_POST['precio2'];
$precio3 = $_POST['precio3'];
$media = ($precio1+$precio2+$precio3)/3;
echo "<link href='http://localhost/DS7/css/customer-comp.css' rel='stylesheet'>";
echo "<br/><H1> 
DATOS RECIBIDOS</H1>";
echo "<br/> Precio producto establecimiento 1: $".$precio1." dolares";
echo "<br/> Precio producto establecimiento 2: $".$precio2." dolares";
echo "<br/> Precio producto establecimiento 3: $".$precio3." dolares <br/>";

echo "<br/> El Precio medio del producto es de: $".$media." dolares";
?>