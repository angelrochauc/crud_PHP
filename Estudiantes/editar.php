<?php 

$conexion = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conexion,'php');




if (isset($_POST['actualizar'])) 
{
	$id = $_POST['update_id'];


	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$curso = $_POST['curso'];
	$telefono = $_POST['telefono'];


	$query = "UPDATE estudiantes SET nombre='$nombre', apellido='$apellido', curso='$curso', telefono='$telefono' WHERE id='$id' ";
	$angel = mysqli_query($conexion,$query);

	if ($angel) {
		
		header('location: pagina.php');
	}
	else{
		echo' <script> alert("Datos No Actualizados");</script>';

		
	}
}


 ?>