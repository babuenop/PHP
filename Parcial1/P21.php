<html lang="es">
<head>
	<title>Parcial 2</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>

<H1>Convertidor de Lb a Kg y Viceversa</H1>

<H3>Ingrese el valor que desa convertir</H3>

<form method="post" action="P22.php"><br>
    <input type="text" name="valor"><br><br>
    <input type="submit" value="lb a kg" name="submit"><br><br>
    <input type="submit" value="kg a lb" name="submit2"> 
</form>
<H1>Resultados en base de datos</H1>
<?php

	$conexion=mysqli_connect("localhost","root","") or die("No se puede conectar al servidor");
		mysqli_select_db($conexion,"labsdb")or die("No se puede seleccionar DB");

	$instruccion="CALL sp_listar_datos(); ";
	$consulta=mysqli_query($conexion,$instruccion)or die("Fallo en la consulta".mysqli_error($conexion));

	$nfilas=mysqli_num_rows($consulta);

	if($nfilas > 0){
		print ("<TABLE>\n");
		print ("<TR>\n");
		print ("<TH>ID</TH>\n");
		print ("<TH>Libras</TH>\n");
		print ("<TH>Kilogramos</TH>\n");
		print ("<TH>Convertir</TH>\n");
		print ("<TR>\n");

		for ($i=0; $i<$nfilas;$i++){
			$resultado = mysqli_fetch_array ($consulta);
				print ("<TR>\n");
				print ("<TD>".$resultado['id']."</TD>\n");
				print ("<TD>".$resultado['lb']."</TD>\n");
				print ("<TD>".$resultado['kg']."</TD>\n");
				print ("<TD>".$resultado['conversion']."</TD>\n");
	        	print("</TR>\n");
				    }
		print ("</TABLE>\n");
	}
	else
	{
		print("No hay datos disponibles");
	}
	mysqli_close($conexion);
?>
</body>
</html>