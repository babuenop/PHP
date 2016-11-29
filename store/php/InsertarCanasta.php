<?php
session_start(); 
if (isset($_SESSION["user_id"]))
{

$UserId=$_POST["UserId"];
$Idarticulo =$_POST["Idarticulo"];
$Articulo =$_POST["Articulo"];
$Precio =$_POST["Precio"];
$Cantidad =$_POST["cantidad"];
$Talla =$_POST["Talla"];
$Status=$_POST["Status"];


include ("conexion.php");

$sql = "INSERT INTO `canasta` (`IdCanasta`, `UserId`, `IdArticulo`, `Articulo`, `Precio`, `Cantidad`, `Fecha`, `Status`) VALUES (NULL, '$UserId', '$Idarticulo', '$Articulo', '$Precio', '$Cantidad', 'Now()','PENDIENTE');";

	$query = $con->query($sql);

			if($query!=null){
				print "<script>alert(\"Registro exitoso. Continue Comprando\");window.location='../index.php';</script>";
mysqli_close($conexion);
}

}
else 
	{
		print "<script>alert(\"Debe registrarse o hacer Login\");window.location='../login.php';</script>";	
	}
?>
