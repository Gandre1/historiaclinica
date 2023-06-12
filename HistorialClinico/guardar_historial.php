<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pacienteId = $_POST['id_paciente'];
    $fecha = $_POST['fecha'];
    $diagnostico = $_POST['diagnostico'];
    $tratamiento = $_POST['tratamiento'];
  
    include './includes/db_connection.php';
  
    $query = "INSERT INTO historiales (id_paciente, fecha, diagnostico, tratamiento) VALUES ('$pacienteId', '$fecha', '$diagnostico', '$tratamiento')";
  
    if (mysqli_query($conn, $query)) {
      $idHistorial = mysqli_insert_id($conn);
  
      $queryActualizarPaciente = "UPDATE pacientes SET id_historial = $idHistorial WHERE id_paciente = $pacienteId";
      mysqli_query($conn, $queryActualizarPaciente);
  
      header("Location: historiales.php");
      exit;
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  
    mysqli_close($conn);
  }  
?>
