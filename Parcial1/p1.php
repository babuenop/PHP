
<html>
<head>
<title>Parcial #1</title>
</head>
<Body>


<?php

if(array_key_exists('enviar', $_POST)){

if($_REQUEST['val']==1)
{
header('Location: p2.php');
}
else if($_REQUEST['val'] ==2)
{
header('Location: p3.php');
}

else{
header('Location: p1.php');
echo "Introduzca valores correctos";
}
}
else{

?>


<FORM ACTION = "p1.php" METHOD = "POST">
<h1><center>Teclee 1 para convertir de metros a yardas</center></h1>
<h1><center>Teclee 2 para convertir de yardas a metros</center></h1>

Teclee una de las opciones: <INPUT TYPE= "text" name= "val"><br>

<Input Type = "Submit" name="enviar" value="Enviar datos">
</FORM>
<?php
}
?>
</body>
</html>