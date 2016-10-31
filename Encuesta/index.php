<HTML LANG="ES">
<HEAD>
	<TITLE>Encuesta</title>
	<Link REL="stylesheet" TYPE="TEXT/css" href="bootstrap/css/bootstrap.min.css">
</HEAD>
<body>
<?PHP
if(array_key_exists('enviar',$_POST)){
	
	
if ($_REQUEST['nombre'] != "" && $_REQUEST['sexo'] != ""  && $_REQUEST['edad'] != ""  && $_REQUEST['salario'] != ""  && $_REQUEST['provincia'] != "") {
		
		$nombre = $_POST['nombre'];
		$sexo = $_POST['sexo'];
		$edad = $_POST['edad'];
		$salario = $_POST['salario'];
		$provincia = $_POST['provincia'];
		
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "encuesta");
		mysqli_query($link, "INSERT INTO `usuario` (`id`, `Nombre`, `Sexo`, `Edad`, `Salario`, `Provincia`) VALUES (NULL, '$nombre', '$sexo', '$edad', '$salario', '$provincia');");
		mysqli_close($link); 
			
		print "<script>alert(\"Registro exitoso. Proceda a contestar la encuesta\");window.location='../encuesta';</script>";
		}
		else{
		print "<script>alert(\"Debe ingresar todos los datos para iniciar la encuesta\");window.location='../encuesta/index.php';</script>";
		}
}

?>

<FORM action="index.php" method="POST">
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<H1>Registro Inicial</H1>
			<h3>Ingrese los siguientes datos para iniciar la encuesta</h3>
		
			<label for="nombre">Nombre</label>
			<INPUT type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
			<label for="sexo">Sexo</label>
			<select name="sexo" class="form-control" id="salario" name="salario">
				<option value="" select></option> 
				<option value="M">M</option> 
				<option value="F">F</option>
			</select><br>
			<label for="edad">Edad</label>
			<INPUT type="number" class="form-control" id="edad" name="edad" placeholder="00">
			<label for="salario">Salario</label>
			<INPUT type="number" class="form-control" id="salario" name="salario" placeholder="0000">
			<label for="Provincia">Provincia</label>
				<select name="provincia" class="form-control" id="salario" name="salario">
				<option value="" select></option> 
				<option value="Bocas del Toro">Bocas del Toro</option> 
				<option value="Cocle">Cocle</option>
				<option value="Colon">Colon</option>
				<option value="Chiriqui">Chiriqui</option>
				<option value="Darien">Darien</option>
				<option value="Herrera">Herrera</option>
				<option value="Los Santos">Los Santos</option>
				<option value="Panama">Panama</option>
				<option value="Veraguas">Veraguas</option>
				<option value="Panama Oesta">Panama Oesta</option>
			</select>	
				
			<br>
			<INPUT TYPE="submit" class="btn btn-default" NAME="enviar" VALUE="Registrar"><BR>
	
					</div>
	</div>
</div>
</form>
	
<?php

?>

</BODY>
</HTML>
	