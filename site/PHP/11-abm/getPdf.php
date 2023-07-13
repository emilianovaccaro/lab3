<?php
$dbname = "id20645219_basedepruebas1";
$host = "localhost";
$user = "id20645219_emiliano";
$password = "Emi123!!";

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
    $id = $_GET["id"];

    $sql = "SELECT Imagenes FROM automoviles WHERE ID = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && $row["Imagenes"]) {
        $pdfData = $row["Imagenes"];

        // Establecer las cabeceras para indicar que es un archivo PDF
        header("Content-Type: application/pdf");
        header("Content-Length: " . strlen($pdfData));
        header("Content-Disposition: inline; filename=archivo.pdf");

        // Imprimir el contenido del PDF
        echo $pdfData;
    } else {
        echo "El archivo PDF no existe";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$dbh = null;
?>
