<!DOCTYPE html>
<html>
<head>
  <title>Administrar Pacientes</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <?php include 'nav.php'; ?>
  <div class="container">
    <h1>Administrar Pacientes</h1>
    
    <h2>Agregar Paciente</h2>
    <form action="guardar_paciente.php" method="POST">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="edad">Edad</label>
            <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="enfermedad">Enfermedad</label>
            <input type="text" class="form-control" id="enfermedad" name="enfermedad" placeholder="Enfermedad" required>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
    
    <h2>Lista de Pacientes</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Edad</th>
          <th>Enfermedad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include './includes/db_connection.php';

          $consulta = "SELECT * FROM pacientes";
          $resultado = mysqli_query($conn, $consulta);

          if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
              echo "<tr>";
              echo "<td>" . $fila['id_paciente'] . "</td>";
              echo "<td>" . $fila['nombre'] . "</td>";
              echo "<td>" . $fila['apellido'] . "</td>";
              echo "<td>" . $fila['edad'] . "</td>";
              echo "<td>" . $fila['enfermedad'] . "</td>";
              echo "<td>";
              if (!empty($fila['id_historial'])) {
                echo "<a href='ver_historial.php?id_historial=" . $fila['id_historial'] . "' class='btn btn-primary'>Ver Historial</a>";
              }              
              echo "<a href='?eliminar_id=" . $fila['id_paciente'] . "' class='btn btn-danger'>Eliminar</a>";
              echo "</td>";
              echo "</tr>";

              if (isset($_GET['eliminar_id']) && $_GET['eliminar_id'] == $fila['id_paciente']) {
                $eliminar_id = $_GET['eliminar_id'];

                $consulta_eliminar = "DELETE FROM pacientes WHERE id_paciente = '$eliminar_id'";
                $resultado_eliminar = mysqli_query($conn, $consulta_eliminar);

                if ($resultado_eliminar) {
                  $consulta_restablecer_ids = "ALTER TABLE pacientes AUTO_INCREMENT = 1";
                  mysqli_query($conn, $consulta_restablecer_ids);

                  echo "<div class='alert alert-success'>Paciente eliminado correctamente.</div>";
                } else {
                  echo "<div class='alert alert-danger'>Error al eliminar el paciente.</div>";
                }
              }
            }
          } else {
            echo "<tr><td colspan='6'>No se encontraron pacientes</td></tr>";
          }

          mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
  <?php include 'footer.php'; ?>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
