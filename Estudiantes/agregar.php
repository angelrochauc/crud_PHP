<?php 

$conexion = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conexion,'php');




if (isset($_POST['guardar'])) 
{
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$curso = $_POST['curso'];
	$telefono = $_POST['telefono'];


	$query = "INSERT INTO estudiantes(nombre,apellido,curso,telefono)
	          VALUES('$nombre','$apellido','$curso','$telefono')";
	$angel = mysqli_query($conexion,$query);

	if ($angel) {
		header('location: pagina.php');
	}
	else{
		echo' <script> alert("Datos No Guardados");</script>';

		
	}
}


 ?>