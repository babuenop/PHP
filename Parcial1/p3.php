<html>
<head>
<title>Parcial #1</title>
</head>
<Body>


<?php

if(array_key_exists('enviar', $_POST)){

$tot=0;
$valor=$_REQUEST['valor'] ;
if($_REQUEST['valor']>0)
{
$tot=$valor*0.9144;
$tot=round($tot,2);
echo "$valor yardas es igual a         <img src=descarga.png border=2>         $tot metros <br>";


 
}

else{
header('Location: p2.php');
echo "Introduzca valores correctos";
}

}





else{

?>


<FORM ACTION = "p3.php" METHOD = "POST">
Valor en yardas: <INPUT TYPE= "text" name= "valor"><br>

<Input Type = "Submit" name="enviar" value="Enviar">
</FORM>


<?php
}
?>
</body>
</html>