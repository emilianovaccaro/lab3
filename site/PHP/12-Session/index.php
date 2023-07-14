<?php
    include("./verificarUsuario.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal protegida</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido a la página principal</h1>
        <p class="welcome">Hola, <?php echo $_SESSION["nombre_usuario"]; ?>. Has iniciado sesión correctamente.</p>
        <a href="./logout.php" class="button logout-button">Cerrar sesión</a>
        <a href="./abm/index.php" class="button">Ir a la aplicación</a>
    </div>
</body>
</html>
