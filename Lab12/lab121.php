<html lang="es">
<HEAD>
	<TITLE>Laboratorio 12.1</TITLE>
	<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Consulta de Servicio Web de Conversion de Temperatura</H1>
<FORM NAME="FormConv" METHOD="POST" ACTION="lab121.php">
	<BR>
		Convertir desde <SELECT NAME="temp">
		<OPTION VALUE="CtoF" SELECTED>°C a °F
		<OPTION VALUE="FtoC">°F a °C	
	</SELECT>  El Valor  
	<INPUT TYPE="number" NAME="valor" STEP="Any" required>
	<INPUT NAME="Convertir" VALUE="Convertir" TYPE="submit" />
</FORM>
<?PHP
if (array_key_exists('Convertir', $_POST)){
	$valor=$_POST['valor'];
	$temp=$_POST['temp'];
	
if($temp=="CtoF"){
	$temporigen="degreeCelsius";
	$tempdestino="degreeFahrenheit";
}
else{
	$temporigen="degreeFahrenheit";
	$tempdestino="degreeCelsius";
}	
$servicio="http://www.webservicex.net/ConvertTemperature.asmx?wsdl";
$parametros=array();
$parametros['Temperature']=$valor;
$parametros['FromUnit']=$temporigen;
$parametros['ToUnit']=$tempdestino;
$cliente = new SoapClient($servicio,$parametros);
$resultObj = $cliente->ConvertTemp($parametros);
$resultado = $resultObj->ConvertTempResult;

print("<BR>La temperatura $valor ".substr($temp,0,1)." es igual a: $resultado".substr($temp,3,1));
}
?>
</body>
</HTML>