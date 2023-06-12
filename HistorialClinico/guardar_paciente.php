<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $edad = $_POST['edad'];
  $enfermedad = $_POST['enfermedad'];   

  
  include './includes/db_connection.php';
  
  $consulta = "INSERT INTO pacientes (nombre, apellido, edad, enfermedad) VALUES ('$nombre', '$apellido', '$edad', '$enfermedad')";
  if (mysqli_query($conn, $consulta)) {
    header("Location: paciente.php");
    exit();
  } else {
    echo "Error al agregar el paciente: " . mysqli_error($conexion);
  }

  
  mysqli_close($conn);
}
?>