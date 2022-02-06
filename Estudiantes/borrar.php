<?php 

$conexion = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conexion,'php');




if (isset($_POST['borrar'])) 
{
	$id = $_POST['borrar_id'];



	$query = "DELETE FROM estudiantes WHERE id='$id' ";
	$angel = mysqli_query($conexion,$query);

	if ($angel) {
		
		header('location: pagina.php');
	}
	else{
		echo' <script> alert("Datos No Eliminados");</script>';

		
	}
}


 ?>