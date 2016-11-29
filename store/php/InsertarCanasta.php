<?php
session_start(); 
$Articulo =$_POST["Articulo"];
$Detalle =$_POST["Detalle"];
$Precio =$_POST["Precio"];
$Talla =$_POST["Talla"];
$Stock =$_POST["Stock"];
$Imagen = $_POST["Imagen"];

Echo($Articulo."<br>".$Detalle."<br>".$Precio."<br>".$Talla."<br>".$Stock."<br>".$Imagen);

include ("conexion.php");

$sql = "INSERT INTO `canasta` (`IdCanasta`, `UserId`, `IdArticulo`, `Articulo`, `Precio`, `Cantidad`, `Fecha`) VALUES (NULL, \'2\', \'3\', \'ertyuio\', \'4\', \'6\', \'2016-11-29 00:00:00\')";

	$query = $con->query($sql);

			if($query!=null){
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../index.php';</script>";
mysqli_close($conexion);
}
?>
