<?php 

    $dbname = "bqaqedrgszmaxzzry3xb";
    $host= "bqaqedrgszmaxzzry3xb-mysql.services.clever-cloud.com";
    $user= "ussg4ckvxuovpsxj";
    $password= "DzvwoTvBsMNPFIDxncts";
    $respuesta_estado = "";

    try
    {
        $dsn = "mysql:host=$host;dbname=$dbname"; 
        $dbh = new PDO($dsn, $user, $password);

        $codArt = $_GET["codArt"];

        $sql = "SELECT Archivo FROM Guitarras WHERE ID = :codArt";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':codArt', $codArt);
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $fila = $stmt->fetch();
        $objGuitarra = new stdClass;
        $objGuitarra->documentoPDF = base64_encode($fila["Archivo"]);
        $salidaJSON = json_encode($objGuitarra, JSON_INVALID_UTF8_SUBSTITUTE);
        echo $salidaJSON;
        $dbh = null;

    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }

?>