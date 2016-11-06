<?php 
	$conexion = mysqli_connect ("localhost","root","")
	or die ("No se puede conectar la base de datos");

	mysqli_select_db ($conexion, "encuesta")
	or die("No se puede seleccionar la base de datos");
 ?>