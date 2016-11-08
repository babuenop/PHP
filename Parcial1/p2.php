<html>
<head>
<title>Parcial #2</title>
</head>
<Body>


<?php
$nfilas=0;
if(array_key_exists('enviar', $_POST)){
$conexion= mysqli_connect("localhost", "root", "")
or die ("No se puede conectar al servidor");
mysqli_select_db ($conexion,"labsdb")
or die ("No se puede seleccionar BD");

$instruccion="CALL sp_listar_conversiones();";

$consulta=mysqli_query($conexion, $instruccion) or die("Fallo en la consulta XDD".mysqli_error($conexion));

$nfilas=mysqli_num_rows($consulta);
/*
echo $nfilas;

if($nfilas>0){
print("<TABLE>\n");
print("<tr>\n");
print("<th>ID<th>\n");
print("<th>METROS</th>\n");
print("<th>YARDAS</th>\n");
print("<th>CONVERSION</th>\n");
print("</tr>\n");

for ($i=0; $i<$nfilas; $i++){
$resultado= mysqli_fetch_array($consulta);
print("<tr>\n");
print("<td>".$resultado['ID']."</td>\n");
print("<td>".$resultado['METROS']."</td>\n");
print("<td>".$resultado['YARDAS']."</td>\n");
print("<td>".$resultado['CONVERSION']."</td>\n");

print("</tr>\n");
}
print("</table>\n");
} */
//mysqli_stmt_close($consulta);
mysqli_close($conexion);	
$conexion= mysqli_connect("localhost", "root", "")
or die ("No se puede conectar al servidor");
mysqli_select_db ($conexion,"labsdb")
or die ("No se puede seleccionar BD");


$tot=0;
$valor=$_REQUEST['valor'] ;
if($_REQUEST['valor']>0)
{
	$i=$nfilas+1;
$tot=$valor*1.0936133;
$tot=round($tot,2);
$con="yd-->m";
//echo "$valor yardas es igual a         <img src=descarga.png border=2>         $tot metros <br>";
//$instruccion="CALL sp_listar_conversiones();";

//$instruccion = "INSERT INTO personas (`ID`, `SEXO`, `EDAD`, `SALARIO`, `PROVINCIA`) VALUES ("."$cont".", '"."$sexo"."' ,"." $edad".","."$salario".", '"."$provincia')";

//$instruccion="INSERT INTO parcial2 ('ID','METROS','YARDAS','CONVERSION') VALUES ('".$i."',".$valor.",".$tot",'".$con."');";
$instruccion="INSERT INTO parcial2 (`ID`,`METROS`,`YARDAS`,`CONVERSION`) VALUES ($i".","."$tot".","."$valor".", '"."$con')";
$consulta=mysqli_query($conexion, $instruccion) or die("Fallo en la consulta XD1".mysqli_error($conexion));

mysqli_close($conexion);

$conexion= mysqli_connect("localhost", "root", "")
or die ("No se puede conectar al servidor");
mysqli_select_db ($conexion,"labsdb")
or die ("No se puede seleccionar BD");

$instruccion="CALL sp_listar_conversiones();";

$consulta=mysqli_query($conexion, $instruccion) or die("Fallo en la consulta XDD".mysqli_error($conexion));

$nfilas=mysqli_num_rows($consulta);

echo $nfilas;

if($nfilas>0){
print("<TABLE>\n");
print("<tr>\n");
print("<th>ID<th>\n");
print("<th>METROS</th>\n");
print("<th>YARDAS</th>\n");
print("<th>CONVERSION</th>\n");
print("</tr>\n");

for ($i=0; $i<$nfilas; $i++){
$resultado= mysqli_fetch_array($consulta);
print("<tr>\n");
print("<td>".$resultado['ID']."</td>\n");
print("<td>".$resultado['METROS']."</td>\n");
print("<td>".$resultado['YARDAS']."</td>\n");
print("<td>".$resultado['CONVERSION']."</td>\n");

print("</tr>\n");
}
print("</table>\n");
}
//mysqli_stmt_close($consulta);
mysqli_close($conexion);	

/*
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_votos` (IN `id` VARCHAR(255), IN `m` INT(10), IN `y` INT(10), IN `c` VARCHAR(255))  BEGIN
    SET @s = CONCAT("INSERT INTO parcial2 SET ID='", id ,"', METROS=", m,", YARDAS=",y," CONVERSION='",C,"'");
    
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
    END
*/
}
else{
header('Location: p2.php');

}

}



else{
?>
<FORM ACTION = "p2.php" METHOD = "POST">
Valor en metros: <INPUT TYPE= "text" name= "valor"><br>

<Input Type = "Submit" name="enviar" value="Enviar">
</FORM>


<?php
}
?>
</body>
</html>