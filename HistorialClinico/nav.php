<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand text-white" href="#">Sistema de Historia Clínica</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarOptions" aria-controls="navbarOptions" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarOptions">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administrar
          </a>
          <ul class="dropdown-menu" aria-labelledby="adminDropdown">
            <li><a class="dropdown-item" href="paciente.php">Administrar Pacientes</a></li>
            <li><a class="dropdown-item" href="historiales.php">Administrar Historiales</a></li>
          </ul>
        </li>
      </ul>
    </div>
</nav>

<script>
  $(document).ready(function() {
    $(".dropdown-toggle").click(function() {
      $(".dropdown-menu").toggle();
    });
  });
</script>
