<?php
if (isset($_GET['id_paciente'])) {
  $id = $_GET['id_paciente'];

    $consulta = "DELETE FROM pacientes WHERE id_paciente = $id";

  if (mysqli_query($conn, $consulta)) {
    header("Location: paciente.php");
    exit();
  } else {
    echo "Error al eliminar el paciente: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>
