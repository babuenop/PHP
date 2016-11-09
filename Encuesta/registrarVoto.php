<?php
	require('conexion.php');
	$instruccion = "CALL sp_obtener_id ();";
	$consulta = mysqli_query ($conexion, $instruccion)
	or die("Fallo en la consulta". mysqli_error($conexion));
	$id = mysqli_fetch_array($consulta);
	$idencuesta=$id ['id'];
	mysqli_close($conexion);
?>
<?php 
	require('conexion.php');
	error_reporting(E_ALL ^ E_NOTICE);	

	$instruccion="CALL sp_registrarVoto()";
	$idpregunta=$_POST['idpregunta'];
	$tipo=$_POST['TIPO'];
		
/* 		$votos1=1;
	$votos2="";
	$votos3="";
	$votos4="";
	$votos5="";
	$votos6=""; */
	
	$votos1=$_POST[$tipo."1"];
	$votos2=$_POST[$tipo."2"];
	$votos3=$_POST[$tipo."3"];
	$votos4=$_POST[$tipo."4"];
	$votos5=$_POST[$tipo."5"];
	$votos6=$_POST[$tipo."6"];
	
	print ("<p>idencuesta=".$idencuesta."</p>");
	print ("<p>idpregunta=".$idpregunta."</p>");
	print ("<p>votos1=".$votos1."</p>");
	print ("<p>votos2=".$votos2."</p>");
	print ("<p>votos3=".$votos3."</p>");
	print ("<p>votos4=".$votos4."</p>");
	print ("<p>votos5=".$votos5."</p>");
	print ("<p>votos6=".$votos6."</p>");  
	
	
	$insertar = mysqli_query($conexion,"call sp_registrarVoto('$idencuesta','$idpregunta','$votos1','$votos2','$votos3','$votos4','$votos5','$votos6')");
			if (!$insertar){
				echo "<script>alert(\"voto ya registrado\");javascript:history.go(-1);</script>";
			}
			else{
				echo "<script>alert(\"Registro exitoso\");javascript:history.go(-1);</script>";
			}			
			mysqli_close($conexion);
?>
