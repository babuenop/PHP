<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<head>
<title>laboratorio 4.3</title>
</head>
<body>
<form name="contar" method="POST" action="lab431.php")>
<h3>Contar de Vocales</h3><br>
Introduzca un texto: <input type="text" name="txt1" value="">
<br><br>
<input value="Contar" name='enviar' type="submit" />
</form>
<?php
if(array_key_exists('enviar', $_POST)){
	if ($_REQUEST['txt1'] != "") {
	
function contar_vocales($vocales, $txt1){
	$cont=0;
	foreach ($vocales as $vocal) {
		# code...
		$cont += substr_count($txt1, $vocal);
	}
	echo "El texto tiene: ".$cont." vocales";
}
$vocales = array('a','e','i','o','u','á','é','í','ó','ú','ü','A','E','I','O','U');
$txt1 = $_POST['txt1'];
contar_vocales($vocales, $txt1);
}else
	{
		echo "Debe introducir un texto";
	}
}
?>
</body>
</html>