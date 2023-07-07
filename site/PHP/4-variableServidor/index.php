<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables Servidor</title>
    <style>
        table
        {
            background-color: green;
            color: white;
            padding: 10px;
            border-collapse: collapse;
        }
        td
        {
            border: 2px solid white;
            padding: 5px;
            width: 200px;
        }

    </style>
</head>
<body>
    <?php 
        echo "<h2>Variables del Servidor</h2>";
        echo "<table>";
        echo "<tr><td>" . "SERVER_ADDR" . "</td>";
        echo "<td>" . $_SERVER["SERVER_ADDR"] . "</td></tr>";
        echo "<tr><td>" . "SERVER_PORT" . "</td>";
        echo "<td>" . $_SERVER["SERVER_PORT"] . "</td></tr>";
        echo "<tr><td>" . "SERVER_NAME" . "</td>";
        echo "<td>" . $_SERVER["SERVER_NAME"] . "</td></tr>";
        echo "<tr><td>" . "DOCUMENT_ROOT" . "</td>";
        echo "<td>" . $_SERVER["DOCUMENT_ROOT"] . "</td></tr>";
        echo "</table>";
        echo "<hr/>";
        echo "<h2>Variables del Cliente</h2>";
        echo "<table>";
        echo "<tr><td>" . "REMOTE_ADDR" . "</td>";
        echo "<td>" . $_SERVER["REMOTE_ADDR"] . "</td></tr>";
        echo "<tr><td>" . "REMOTE_PORT" . "</td>";
        echo "<td>" . $_SERVER["REMOTE_PORT"] . "</td></tr>";
        echo "</table>";
        echo "<hr/>";
        echo "<h2>Variables del Requerimiento</h2>";
        echo "<table>";
        echo "<hr/>";
        echo "<tr><td>" . "SCRIPT_NAME" . "</td>";
        echo "<td>" . $_SERVER["SCRIPT_NAME"] . "</td></tr>";
        echo "<tr><td>" . "SERVER_ADDR" . "</td>";
        echo "<td>" . $_SERVER["REQUEST_METHOD"] . "</td></tr>";
        echo "</table>";
        echo "<hr/>";
        echo "<h2>TODAS: </h2>";
        foreach($_SERVER as $clave => $valor)
        {
            echo $clave . " = " . $valor . "<br>";
        }
        echo "<hr/>";
        $myVar = "../index.html";
        echo "<a href=$myVar>Volver</a>"
    ?>

</body>
</html>