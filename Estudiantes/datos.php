<?php
    //Conexion con bases de datos.
    include('conexion.php');

    
    $usuario = $_POST['usuario'];
     $password = $_POST['password'];
    

    $sql = "SELECT COUNT(*) t
    FROM logi
    WHERE usuario='$usuario' and password='$password'";

    $result = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
        $contador= $row["t"];
    }
    echo $contador;

    $conn->close();


?>
