<html>
<head>
<title>Laboratorio 2.4</title>
</head>
<body>

<?php 
	//Creacion del arreglo array ("Clave"=>"Valor")
	$personas = array ("Juan" => "Panama",
	"John" => "USA", 
	"Eica" => "Finlandia", 
	"Kusanagi" => "japon"
 	);
	
	//Recorrer todo el arreglo 
	foreach ($personas as $persona => $pais){
		print "$persona es de $pais <br>";
	}
	
	//Impresion especifica 
	echo "<br>".$personas["Juan"];
	echo "<br>".$personas["Eica"];
	
	
?>
</body>
</html>