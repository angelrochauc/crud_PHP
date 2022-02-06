<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD</title>
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 


</head>
<body background="img/3.jpg" style="background-size: cover">



<!-- Modal agregra-->
<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#DDE4E4">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Agregar Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="agregar.php" method="POST" style="background-color:#E6FAFA">
		      <div class="modal-body">
				  <div class="form-group">
				    <label >Nombres</label>
				    <input type="text" name="nombre" class="form-control" placeholder="ej: Pedro Jose" required>
				  </div>

				  <div class="form-group">
				    <label >Apellidos</label>
				    <input type="text" name="apellido" class="form-control" placeholder="ej: Quijote Perez" required>
				  </div>

				  <div class="form-group">
				    <label >Curso </label>
				    <input type="text" name="curso" class="form-control" placeholder="ej: 5to semestre de Mecatronica" required>
				  </div>

				  <div class="form-group">
				    <label >Telefono</label>
				    <input type="number" name="telefono" class="form-control" placeholder="ej: 67689595" required>
				  </div>

				  
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" name="guardar" class="btn btn-primary">Guardar Datos</button>
		      </div>
      </form>
    </div>
  </div>
</div>


<!-- editar-->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#DDE4E4">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="editar.php" method="POST" style="background-color:#E6FAFA">
		      <div class="modal-body">
		      	  <input type="hidden" name="update_id" id="update_id">

				  <div class="form-group">
				    <label >Nombres</label>
				    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="ej: Pedro Jose">
				  </div>

				  <div class="form-group">
				    <label >Apellidos</label>
				    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="ej: Quijote Perez">
				  </div>

				  <div class="form-group">
				    <label >Curso </label>
				    <input type="text" name="curso" id="curso" class="form-control" placeholder="ej: 5to semestre de Mecatronica">
				  </div>

				  <div class="form-group">
				    <label >Telefono</label>
				    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="ej: 67689595">
				  </div>

				  
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" name="actualizar" class="btn btn-primary">Actualizar Datos</button>
		      </div>
      </form>
    </div>
  </div>
</div>


<!-- borrar-->
<div class="modal fade" id="borrarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="borrar.php" method="POST">
		      <div class="modal-body">
		      	  <input type="hidden" name="borrar_id" id="borrar_id">
		      	  <h4>¿Quieres borrar estos datos?</h4>

				  
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		        <button type="submit" name="borrar" class="btn btn-primary">Si, Borrar Datos</button>
		      </div>
      </form>
    </div>
  </div>
</div>





	<div class="container">
		<div class="jumbotron">
			<div class="card">
				<center><h2> Registro de Estudiantes</h2></center>
			</div>
			<div class="card">
				<div class="card-body">
					<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#studentaddmodal">
					  Agregar
					</button>

	
					<a href="index.html" style="float:right"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#studentaddmodal">
					  Cerrar
					</button></a> 
				</div>

			</div>

			<div class="card">
				<div class="card-body">

					
						
									

<?php 

						$conexion = mysqli_connect("localhost","root","");
						$db = mysqli_select_db($conexion,'php');

						$query = "SELECT * FROM estudiantes";
						$angel = mysqli_query($conexion,$query);
						?>
					<table id="buscar" class="table table-success">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nombres</th>
					      <th scope="col">Apellidos</th>
					      <th scope="col">Curso</th>
					      <th scope="col">Telefono</th>
					      <th scope="col" colspan="2"><center>Opciones</center> </th>
					    </tr>
					  </thead>

					  <?php


							if ($angel) {
								foreach ($angel as $row) {
						?>
					  <tbody>
					    <tr>
					      
					      	<td> <?php echo $row['id']; ?></td>
						  	<td> <?php	echo $row['nombre']; ?></td>
							<td> <?php echo $row['apellido']; ?></td>
							<td> <?php echo $row['curso']; ?></td>
							<td> <?php echo $row['telefono']; ?></td>
							<td> <button type="button" class="btn btn-outline-warning editbtn">Editar</button></td>
							<td><button type="button" class="btn btn-outline-danger borrarbtn">Borrar</button></td>
						
					    </tr>
					    
					  </tbody>
					  <?php
								}
							}
							else{
								echo "Ningún registro fue encontrado";

								
							}
						

						 ?>

					</table>

				</div>

			</div><br>
			<center>
				<i class="bi bi-whatsapp" ></i><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
</svg>
<i class="bi bi-skype"></i><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-skype" viewBox="0 0 16 16">
  <path d="M4.671 0c.88 0 1.733.247 2.468.702a7.423 7.423 0 0 1 6.02 2.118 7.372 7.372 0 0 1 2.167 5.215c0 .344-.024.687-.072 1.026a4.662 4.662 0 0 1 .6 2.281 4.645 4.645 0 0 1-1.37 3.294A4.673 4.673 0 0 1 11.18 16c-.84 0-1.658-.226-2.37-.644a7.423 7.423 0 0 1-6.114-2.107A7.374 7.374 0 0 1 .529 8.035c0-.363.026-.724.08-1.081a4.644 4.644 0 0 1 .76-5.59A4.68 4.68 0 0 1 4.67 0zm.447 7.01c.18.309.43.572.729.769a7.07 7.07 0 0 0 1.257.653c.492.205.873.38 1.145.523.229.112.437.264.615.448.135.142.21.331.21.528a.872.872 0 0 1-.335.723c-.291.196-.64.289-.99.264a2.618 2.618 0 0 1-1.048-.206 11.44 11.44 0 0 1-.532-.253 1.284 1.284 0 0 0-.587-.15.717.717 0 0 0-.501.176.63.63 0 0 0-.195.491.796.796 0 0 0 .148.482 1.2 1.2 0 0 0 .456.354 5.113 5.113 0 0 0 2.212.419 4.554 4.554 0 0 0 1.624-.265 2.296 2.296 0 0 0 1.08-.801c.267-.39.402-.855.386-1.327a2.09 2.09 0 0 0-.279-1.101 2.53 2.53 0 0 0-.772-.792A7.198 7.198 0 0 0 8.486 7.3a1.05 1.05 0 0 0-.145-.058 18.182 18.182 0 0 1-1.013-.447 1.827 1.827 0 0 1-.54-.387.727.727 0 0 1-.2-.508.805.805 0 0 1 .385-.723 1.76 1.76 0 0 1 .968-.247c.26-.003.52.03.772.096.274.079.542.177.802.293.105.049.22.075.336.076a.6.6 0 0 0 .453-.19.69.69 0 0 0 .18-.496.717.717 0 0 0-.17-.476 1.374 1.374 0 0 0-.556-.354 3.69 3.69 0 0 0-.708-.183 5.963 5.963 0 0 0-1.022-.078 4.53 4.53 0 0 0-1.536.258 2.71 2.71 0 0 0-1.174.784 1.91 1.91 0 0 0-.45 1.287c-.01.37.076.736.25 1.063z"/>
</svg>
<i class="bi bi-facebook"></i>
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg>
<i class="bi bi-instagram"></i>
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" style="float:center" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
</svg><br><br>

		<h6 style="color:black">PARA MÁS INFORMACIÓN</h6>
		<h8 style="color:black">Teléfono: (031) 000 7477<br> Celular: +57 316 000 000<br>email: formacion@vida.com</h8>
    
				
			</center>
		
		



		</div>
	</div>

<div class="wpb_wrapper">
			
			
</body>

</html>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>



<script>
$(document).ready(function() {
		$('.editbtn').on('click', function() {

			$('#editmodal').modal('show');


			$tr = $(this).closest('tr');

			var data = $tr.children('td').map(function() {
				return $(this).text();
			}).get();

			console.log(data);
			$('#update_id').val(data[0]);
			$('#nombre').val(data[1]);
			$('#apellido').val(data[2]);
			$('#curso').val(data[3]);
			$('#telefono').val(data[4]);
		});
		
	});
	
</script>


<script>
$(document).ready(function() {
		$('.borrarbtn').on('click', function() {

			$('#borrarmodal').modal('show');


			$tr = $(this).closest('tr');

			var data = $tr.children('td').map(function() {
				return $(this).text();
			}).get();

			console.log(data);
			$('#borrar_id').val(data[0]);
			
		});
		
	});
	
</script>