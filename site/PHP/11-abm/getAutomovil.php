<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $dbname = "id20645219_basedepruebas1";
    $host = "localhost";
    $user = "id20645219_emiliano";
    $password = "Emi123!!";

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);

        $id = $_GET["id"];

        $sql = "SELECT * FROM automoviles WHERE ID = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $fila = $stmt->fetch();
    
        $objJson = new stdClass;
        $objJson->codArt = $fila["ID"];
        $objJson->marca = $fila["Marca"];
        $objJson->modelo = $fila["Modelo"];
        $objJson->precio = $fila["Precio"];
        $objJson->fecha = $fila["Fecha"];
    
        $jsonAuto = json_encode($objJson);
        $dbh = null;
        echo $jsonAuto;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $dbh = null;
}
?>