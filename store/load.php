<?php
if (is_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name']))
	{
	$nombreDirectorio = "img/";
	$nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
	$nombreCompleto = $nombreDirectorio.$nombrearchivo;
	if (is_file($nombreCompleto))
		{
		$idUnico = time();
		$nombrearchivo= $idUnico . "-". $nombrearchivo;
		echo "Archivo repetido, se cambió el nombre a $nombrearchivo
		<br/><br/>";
		print ("<input type=hidden name=idpregunta value=".$nombrearchivo ." /><br>");
		}
	move_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio.$nombrearchivo);
	print ("<input type=hidden name=idpregunta value=".$nombrearchivo." /><br>");
	echo "<script>alert(\"Archivo Cargado\");window.location='./insertararticulo.php';</script>";
	}
else 
	echo "No se ha podido subir el archivo <br>";

?>

