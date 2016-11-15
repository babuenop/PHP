<?php
session_start();
?>
<?php
if (isset($_SESSION["usuario_valido"]))
{
	print ("<P>[<A HREF='login.php'>Menu Principal</A>]</P>");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio 8.1</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
</head>
<body>
    <h1>Consulta de noticias</h1>
    <?PHP
        if (!isset($_REQUEST['pagina'])){
            $pagina = 0;
        }else{
            if ($_REQUEST["pagina"] > 0){
                $pagina = $_REQUEST["pagina"];
            }
            else{
                $pagina = 0;
            }    
        } 
        
        $conexion = mysqli_connect("localhost", "root", "")
        or die ("No se puede conectar con el servidor");

        mysqli_select_db ($conexion, "labsdb")
        or die ("No se puede seleccionar la base de datos");

        $instruccion = "CALL  	sp_listar_noticias() ";
        $consulta = mysqli_query ($conexion, $instruccion)
        or die ("Fallo en la consulta ".mysqli_error($conexion));
        
        $nfilas = mysqli_num_rows($consulta);

        mysqli_close($conexion);

        $conexion = mysqli_connect("localhost", "root", "")
        or die ("No se puede conectar con el servidor");

        mysqli_select_db ($conexion, "labsdb")
        or die ("No se puede seleccionar la base de datos");

        $consultaResultados = mysqli_query($conexion, "CALL sp_listar_noticias_limite ($pagina)")
        or die ("Fallo en la consulta ".mysqli_error($conexion));

        $totalConsultaResultado = mysqli_num_rows($consultaResultados);

        $desde = $pagina + 1;
        if ($pagina - 5 > 0){
            $anterior = $pagina - 5;
        }
        else{
            $anterior = 0;
        }
        
        $siguiente = $pagina + $totalConsultaResultado;
        if ($totalConsultaResultado > $desde ){
            echo "Mostrando noticias ".$desde." a ".$totalConsultaResultado." de un total de ".$nfilas.". [ <a href='?pagina=".$anterior."'>Anterior</a> | <a href='?pagina=".$siguiente."'>Siguiente</a> ]";
        }elseif($totalConsultaResultado + 1 >= $desde ){
            echo "Mostrando noticias ".$desde." a ".$siguiente." de un total de ".$nfilas.". [ <a href='?pagina=".$anterior."'>Anterior</a> | <a href='?pagina=".$siguiente."'>Siguiente</a> ]";
        }
        else{
            echo "Mostrando noticias ".$desde." a ".$siguiente." de un total de ".$nfilas.". [ <a href='?pagina=".$anterior."'>Anterior</a> | <label>Siguiente</label> ]";
        }
        

        if ($totalConsultaResultado > 0){
            print("<br><br>\n");
            print ("<table>\n");
            print ("<tr>\n");
            print ("<th>Titutlo</th>\n");
            print ("<th>Texto</th>");
            print ("<th>Categoria</th>");
            print ("<th>Fecha</th>");
            print ("<th>Imagen</th>");
            print ("</tr>\n");
        
            while ($resultado = mysqli_fetch_array($consultaResultados)){
                print ("<tr>\n");
                print ("<td>". $resultado['titulo'] . "</td>\n");
                print ("<td>". $resultado['texto'] . "</td>\n");
                print ("<td>". $resultado['categoria'] . "</td>\n");
                print ("<td>". date("j/n/Y",strtotime($resultado['fecha'])) . "</td>\n");

                if ($resultado['imagen'] != ""){
                    print ("<td><a href='img/".$resultado['imagen']."' target='_blank'><img border='0' src='img/iconotexto.gif'></a></td>\n");
                }
                else{
                    print ("<td>&nbsp;</td>\n");
                }
                print("</tr>\n");
            }
            print ("</table>\n");
            print ("<br>");

            
            
        }
        else{
            print ("No hay noticias disponibles");
        }

        mysqli_close($conexion);
    ?>
</body>
</html>
<?php
}
else 
	{
		print ("<BR><BR>\n");
		print ("<p Align='CENTER'>Acceso no autorizado</p>\n");
		print ("<p Align='CENTER'>[ <A HREF='login.php'>Conectar</A>]</p>\n");			
	}
?>