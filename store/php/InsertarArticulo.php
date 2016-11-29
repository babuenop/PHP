<?php

$Articulo =$_POST["Articulo"];
$Detalle =$_POST["Detalle"];
$Precio =$_POST["Precio"];
$Talla =$_POST["Talla"];
$Stock =$_POST["Stock"];
$Imagen = $_POST["Imagen"];



Echo($Articulo."<br>".$Detalle."<br>".$Precio."<br>".$Talla."<br>".$Stock."<br>".$Imagen);

include ("conexion.php");

$sql = "INSERT INTO `articulos` (`Idarticulo`, `Articulo`, `Precio`, `Detalle`, `Talla`, `stock`, `Imagen`, `Created`) VALUES (NULL, '$Articulo', '$Precio', '$Detalle', '$Talla', '$Stock', '$Imagen', 'Now()');";

	$query = $con->query($sql);

			if($query!=null){
				print "<script>window.location='../index.php';</script>";
mysqli_close($conexion);
}
?>
