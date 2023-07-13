<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modalButton"])) {
    $dbname = "id20645219_basedepruebas1";
    $host = "localhost";
    $user = "id20645219_emiliano";
    $password = "Emi123!!";

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
        
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $precio = $_POST["precio"];
        $anio = $_POST["anio"];

        $pdfData = file_get_contents($_FILES["imagen"]["tmp_name"]);

        $sql = "INSERT INTO automoviles (Marca, Modelo, Precio, Anio, Imagenes) VALUES (:marca, :modelo, :precio, :anio, :pdfData)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':anio', $anio);
        $stmt->bindParam(':pdfData', $pdfData, PDO::PARAM_LOB);
        $stmt->execute();

        echo "El automóvil se ha agregado correctamente";

        $myVar = "./index.html";
        echo "<a href=$myVar><button>Back</button></a>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $dbh = null;
}
?>
