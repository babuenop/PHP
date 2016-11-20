<?php
session_start();
?>
<?php
if (isset($_SESSION["usuario_valido"]))
{
	print ("<P>[<A HREF='login.php'>Menu Principal</A>]</P>");
?>
<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 8.1</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">

</HEAD>
<BODY>
<H1> Consulta de noticia</H1>
<?PHP error_reporting(0);
$control=0;
$control2=0;
$control3=1;
$conexion2 = mysqli_connect ("localhost","root", "") or die ("No se puede conectar con el servidor");
mysqli_select_db ($conexion2,"labsdb") or die ("No se puede seleccionar la base de datos");
$instruccion2 = "CALL sp_listar_noticias();";
$consulta2 = mysqli_query ($conexion2,$instruccion2) or die ("Fallo en la consulta" . mysqli_error($conexion));
$nfilas2 = mysqli_num_rows($consulta2);
mysqli_close ($conexion2);

echo "<INPUT TYPE='HIDDEN' NAME='control' VALUE='0'>";
$conexion = mysqli_connect ("localhost","root", "") or die ("No se puede conectar con el servidor");
mysqli_select_db ($conexion,"labsdb") or die ("No se puede seleccionar la base de datos");
$instruccion = "CALL sp_listar_noticias2('" . $control . "');";
$consulta = mysqli_query ($conexion,$instruccion) or die ("Fallo en la consulta" . mysqli_error($conexion));
$cali = mysqli_num_rows($consulta);
mysqli_close ($conexion);

if($cali==$nfilas2){
	$rector = 1;
       echo "Mostrando registros " . $rector . " al " . $nfilas2 . " de " . $nfilas2 . " [Anterior|Siguiente]";
       $control2=0;
       $control3=$control2+1;
}
else if($nfilas2 > $cali)
{  
    
    if(is_null($_GET['control']))
    {   
    	
        if(is_null($_GET['control2']))
    	{	
    	   $rector=$cali;
        }
        else{
        	$rector=$_GET['control2'] - $cali;
        	$control2=$_GET['control2'] - ($cali+$cali);
        	$control3=$control2+1;
        	if($control2 < 0){
        		$control2=$cali;

        		$rector=$cali;

        	}
        }
    }
    else{
    	if(is_null($_GET['control2']))
    	{	
    	$control2=$_GET['control'];
    	$control3=$control2+1;
    	$rector=$cali+$_GET['control'];
        }
        else{
        	$rector=$_GET['control2'] - $cali;
        	$control2=$_GET['control2'] - $cali;
        	
        }
    }
    if($rector > $cali && $rector < $nfilas2){
	echo "Mostrando registros " . $control3 . " al " . $rector . " de " . $nfilas2 . " [<a href='http://localhost/DS7/Lab11/lab113.php?control2= " . $rector . "'>Anterior</a>|<a href='http://localhost/DS7/Lab11/lab113.php?control= " . $rector . "'>Siguiente</a>]";  
    }
    else if($rector>=$nfilas2)
    {
    	echo "Mostrando registros " . $control3 . " al " . $nfilas2 . " de " . $nfilas2 . " [<a href='http://localhost/DS7/Lab11/lab113.php?control2= " . $rector . "'>Anterior</a>|Siguiente]";
    }
    else if($rector==$cali){
    	echo "Mostrando registros " . $control3 . " al " . $rector . " de " . $nfilas2 . " [Anterior|<a href='http://localhost/DS7/Lab11/lab113.php?control= " . $rector . "'>Siguiente</a>]"; 
    }
    else{
	echo "Mostrando registros " . $control3 . " al " . $rector . " de " . $nfilas2 . "[Anterior|Siguiente]";
	}  
} 
$conexion3 = mysqli_connect ("localhost","root", "") or die ("No se puede conectar con el servidor");
mysqli_select_db ($conexion3,"labsdb") or die ("No se puede seleccionar la base de datos");
$instruccion3 = "CALL sp_listar_noticias2(" . $control2 . ");";
$consulta3 = mysqli_query ($conexion3,$instruccion3) or die ("Fallo en la consulta" . mysqli_error($conexion3));
$nfilas = mysqli_num_rows($consulta3);
$control=$nfilas;
if ($nfilas > 0){
	print("<TABLE>\n");
	print("<TR>\n");
	print("<TH>Titulo</TH>\n");
	print("<TH>Texto</TH>\n");
	print("<TH>Categoria</TH>\n");
	print("<TH>Fecha</TH>\n");
	print("<TH>Imagen</TH>\n");
	print("</TR>\n");

			for ($i=0; $i<$nfilas; $i++){
			$resultado = mysqli_fetch_array ($consulta3);
			
			print ("<TR>\n");
			print ("<TD>" . $resultado['titulo'] . "</TD>\n");
			print ("<TD>" . $resultado['texto'] . "</TD>\n");
			print ("<TD>" . $resultado['categoria'] . "</TD>\n");
			print ("<TD>" . date ("j/n/Y",strtotime($resultado['fecha'])). "</TD>\n");

			if($resultado['imagen'] !=""){
			print ("<TD><A TARGET='_blank' HREF= 'ímg/". $resultado['imagen'] . "'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
			}
			else{
			print ("<TD>&nbsp;</TD>\n");
			}
			print("</TR>\n");
			}
			print("</TABLE>\n");
			
}
else{
	print("No hay noticias disponibles");
}
mysqli_close ($conexion3);
?>
</BODY>
</HTML>
<?php
}
else 
	{
		print ("<BR><BR>\n");
		print ("<p Align='CENTER'>Acceso no autorizado</p>\n");
		print ("<p Align='CENTER'>[ <A HREF='login.php'>Conectar</A>]</p>\n");			
	}
?>