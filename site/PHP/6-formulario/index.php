<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Response</title>
</head>
<body>
    <form action="./response.php" method="get">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br><br>
        <input type="submit" value="Enviar la información">
    </form>

    <?php     
        $myVar = "../index.html";
        echo "<a href=$myVar>Volver</a>"
    ?>

</body>
</html>