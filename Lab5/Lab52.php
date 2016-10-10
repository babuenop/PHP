<?php

if (is_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name']))
	{
		$nombreDirectorio = "archivos/";
		$nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
		$tamañoarchivo = $_FILES['nombre_archivo_cliente']['size'];
		$imageFileType = pathinfo($nombrearchivo,PATHINFO_EXTENSION);
		$nombreCompleto = $nombreDirectorio.$nombrearchivo;
	
		if ($tamañoarchivo>1000000){
				echo "El archivo $nombrearchivo es superior a 1MB <br>";
				exit;
		}
		
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
				echo "El archivo debe ser jpg, png, jpeg o gif <br>"; 
				exit;
		}
		
		if (is_file($nombreCompleto)){
				$idUnico = time();
				$nombrearchivo= $idUnico . "-". $nombrearchivo;
				echo "Archivo repetido, se cambió el nombre a $nombrearchivo
				<br/><br/>";
		}
		move_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio.$nombrearchivo);
		echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio <br>";		
	}	
	else
echo "No se ha podido subir el erchivo"
?>

