<?php
include './includes/db_connection.php';

if (isset($_GET['id_historial'])) {
  $historialId = $_GET['id_historial'];

  $query = "SELECT historiales.*, pacientes.nombre, pacientes.apellido, pacientes.edad, pacientes.enfermedad FROM historiales JOIN pacientes ON historiales.id_paciente = pacientes.id_paciente WHERE historiales.id_historial = $historialId";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $historial = mysqli_fetch_assoc($result);
    $nombre = $historial['nombre'];
    $apellido = $historial['apellido'];
    $edad = $historial['edad'];
    $enfermedad = $historial['enfermedad'];
    $fecha = $historial['fecha'];
    $diagnostico = $historial['diagnostico'];
    $tratamiento = $historial['tratamiento'];
  } else {
    echo "No se encontró el historial.";
    exit;
  }
} else {
  echo "ID de historial no especificado.";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['eliminar_historial'])) {
    $eliminarId = $_POST['eliminar_historial'];

    $queryEliminar = "DELETE FROM historiales WHERE id_historial = $eliminarId";
    $resultEliminar = mysqli_query($conn, $queryEliminar);

    if ($resultEliminar) {
      $queryRestablecerIds = "ALTER TABLE historiales AUTO_INCREMENT = 1";
      mysqli_query($conn, $queryRestablecerIds);

      // Actualizar el campo id_historial en la tabla pacientes
      $queryActualizarPacientes = "UPDATE pacientes SET id_historial = NULL WHERE id_historial = $eliminarId";
      mysqli_query($conn, $queryActualizarPacientes);

      echo "<div class='alert alert-success'>Historial eliminado correctamente.</div>";
    } else {
      echo "<div class='alert alert-danger'>Error al eliminar el historial.</div>";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ver Historial</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <?php include 'nav.php'; ?>
  <div class="container">
    <h1>Historial de <?php echo $nombre . ' ' . $apellido; ?></h1>
    <p><strong>Edad:</strong> <?php echo $edad; ?></p>
    <p><strong>Enfermedad:</strong> <?php echo $enfermedad; ?></p>
    <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
    <p><strong>Diagnóstico:</strong> <?php echo $diagnostico; ?></p>
    <p><strong>Tratamiento:</strong> <?php echo $tratamiento; ?></p>

    <form method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este historial?');">
      <input type="hidden" name="eliminar_historial" value="<?php echo $historialId; ?>">
      <button type="submit" class="btn btn-danger">Eliminar Historial</button>
    </form>
  </div>
  
  <script src="js/bootstrap.min.js"></script>
</body>
<?php include 'footer.php'; ?>
</html>
