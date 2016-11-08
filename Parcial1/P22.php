<!DOCTYPE html>
<html>
<head>
	<title>Parcial 2</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>
<body>
<H1>Resultados</H1>
<?php

function lbakg  () {
	$valor =$_POST["valor"];
	$conver1 = "lbs a kgs";

		if($valor!="" && is_numeric($valor))
		{
			$kgs = round(($valor / 2.2046),4);

			$conexion=mysqli_connect("localhost","root","") or die("No se puede conectar al servidor");
			mysqli_select_db($conexion,"labsdb")or die("No se puede seleccionar DB");

			$insertar = mysqli_query($conexion,"call Insertar('0','$kgs','$valor','lbs a kg')");
			if (!$insertar){echo "Error al guardar";}else{echo "Guardado con exito";}
			
			mysqli_close($conexion);
			echo"Datos insertados";
			?> 
				<A HREF="P21.php">Ver Resultados</A>

<?php
		}else
		{
			echo "El número ingresado no es valido";
			?>
				<A HREF="P21.php">Convertidor</A>
<?php
		}
}

function kgalb (){
	$valor =$_POST["valor"];	
  
  if ($valor!="" && is_numeric($valor)){
   $lbs = round(($valor * 2.2046),4);

   		$conexion=mysqli_connect("localhost","root","") or die("No se puede conectar al servidor");
		mysqli_select_db($conexion,"labsdb")or die("No se puede seleccionar DB");

		mysqli_query($conexion,"INSERT INTO parcial(lb,kg,conversion) VALUES ($lbs,'$valor','kgs a lbs');");
		mysqli_close($conexion);
		echo"Datos insertados";
			?> 
				<A HREF="P21.php">Ver Resultados</A>
<?php
		}else
		{
			echo "El número ingresado no es valido";
			?>
				<A HREF="P21.php">Convertidor</A>
<?php
		}
}

if(isset($_POST['submit']))
{
  lbakg ();
} 

if(isset($_POST['submit2']))
{
   kgalb();
} 

?>
</body>
</html>