<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistema de Historia Clínica</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-zKldiCyzv9zt9lUM4b39i9tqLsLmT3FOunKjrcd3C8BJ6YEVW9MTrYRnXxm9j/THsYSYvt3+DXV0DZoFv6zZcw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-LOicD/ZGugn3Gvj8ONdAvsLbYa9yTW8tK9d0mC2yJMIzR5LYrK9+r6I0S40Gr1gjU2Xeb5KThpsnT9EUHjjxlQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="container">
        <h1>Bienvenido al Sistema de Historia Clínica</h1>
        <p>Selecciona una opción:</p>
        <ul>
            <li><a href="paciente.php">Administrar Pacientes</a></li>
            <li><a href="historiales.php">Administrar Historiales Clínicos</a></li>
        </ul>
    </div>

    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
