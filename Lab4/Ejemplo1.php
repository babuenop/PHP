<?php
srand((double)microtime()*10000000);
$nota=rand(0,20);
echo "<H1>Nota: $nota</H1>";
if($nota<14){
	?>
	<h1 textcolor=#ebebeb>Estas Desaprobado</h1>
<?php
}
else{
	?>
	<h1>Felicitaciones Aprobaste<h1>
<?php
}
?>


