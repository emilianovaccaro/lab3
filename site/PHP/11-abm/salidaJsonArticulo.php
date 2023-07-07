<?php
$dbname = "bqaqedrgszmaxzzry3xb";
$host= "bqaqedrgszmaxzzry3xb-mysql.services.clever-cloud.com";
$user= "ussg4ckvxuovpsxj";
$password= "DzvwoTvBsMNPFIDxncts";

try {
    $dsn = "mysql:host=$host;dbname=$dbname"; 
    $dbh = new PDO($dsn, $user, $password);

    $codArt = $_GET["codArt"];

    $sql = "SELECT * FROM Guitarras WHERE ID  = :filtroCodArt";
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':filtroCodArt', $codArt);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $fila = $stmt->fetch();

    $objGuitarra = new stdClass;
    $objGuitarra->codArt = $fila["ID"];
    $objGuitarra->marca = $fila["Marca"];
    $objGuitarra->modelo = $fila["Modelo"];
    $objGuitarra->precio = $fila["Precio"];
    $objGuitarra->fecha = $fila["Fecha"];

    $jsonGuitarra = json_encode($objGuitarra);
    $dbh = null;
    echo $jsonGuitarra;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>