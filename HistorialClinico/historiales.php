<!DOCTYPE html>
<html>
<head>
  <title>Administrar Historiales</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".textarea-resizable").on("input", function() {
        this.style.height = "auto";
        this.style.height = (this.scrollHeight) + "px";
      });
    });
  </script>
</head>
<body>
  <?php include 'nav.php'; ?>
  <body>
  <div class="container">
    <h1>Administrar Historiales</h1>
    
    <h2>Agregar Historial</h2>
    <form action="guardar_historial.php" method="POST">
      <div class="form-group">
        <label for="id_paciente">Seleccionar Paciente:</label>
        <select name="id_paciente" id="id_paciente" class="form-control" required>
          <option value="">Seleccionar Paciente</option>
          <?php
          include './includes/db_connection.php';

          $consulta = "SELECT * FROM pacientes";
          $resultado = mysqli_query($conn, $consulta);

          while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<option value='" . $fila['id_paciente'] . "'>" . $fila['nombre'] . " " . $fila['apellido'] . "</option>";
          }

          mysqli_close($conn);
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="diagnostico">Diagnóstico:</label>
        <textarea name="diagnostico" id="diagnostico" class="form-control textarea-resizable" maxlength="150" required></textarea>
      </div>

      <div class="form-group">
        <label for="tratamiento">Tratamiento:</label>
        <textarea name="tratamiento" id="tratamiento" class="form-control textarea-resizable" maxlength="150" required></textarea>
      </div>

      <button type="submit">Agregar</button>
    </form>

  </div>
  <?php include 'footer.php'; ?>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
