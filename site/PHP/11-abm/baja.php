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

        $codArt = $_POST["codArt"];

        $sql = "DELETE FROM Guitarras WHERE ID = :codArt";
        $stmt = $dbh->prepare($sql);
        $respuesta_estado = $respuesta_estado . "\nPreparación exitosa.";
        $stmt->bindParam(':codArt', $codArt);
        $respuesta_estado = $respuesta_estado . "\nBind exitoso.";
        $stmt->execute();
        $respuesta_estado = $respuesta_estado . "\nEjecución exitosa.";

        $respuesta_estado = $respuesta_estado . "\nEl artículo ha sido dado de baja. Vuelva a cargar los datos para visualizar los cambios.";
        echo $respuesta_estado;
    }
    catch (PDOException $e)
    {
        $respuesta_estado = $respuesta_estado . "\nERROR: \n" . $e->getMessage();
        echo $respuesta_estado;
    }

?>