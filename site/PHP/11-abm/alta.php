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

        // $codArt = $_POST["codArt"];
        // $marca = $_POST["marca"];
        // $modelo = $_POST["modelo"];
        // $precio = $_POST["precio"];
        // $fecha = $_POST["fecha"];

        $codArt = $_POST["idAlta"];
        $marca = $_POST["marcaAlta"];
        $modelo = $_POST["modeloAlta"];
        $precio = $_POST["precioAlta"];
        $fecha = $_POST["fechaAlta"];

        $sql = "INSERT INTO Guitarras (ID, Marca, Modelo, Precio, Fecha) VALUES (:codArt, :marca, :modelo, :precio, :fecha)";
        $stmt = $dbh->prepare($sql);
        $respuesta_estado = $respuesta_estado . "\nPreparación exitosa.";

        $stmt->bindParam(':codArt', $codArt);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':fecha', $fecha);
        $respuesta_estado = $respuesta_estado . "\nBind exitoso.";
        $stmt->execute();
        $respuesta_estado = $respuesta_estado . "\nEjecución exitosa.";

        if(!isset($_FILES["pdfAlta"]))
        {
            $respuesta_estado = $respuesta_estado . "\nNo se inicializó la variable FILES";
        }
        else
        {
            if(empty($_FILES["pdfAlta"]["name"]))
            {
                $respuesta_estado = $respuesta_estado . "\nNo se eligieron archivos PDF.";
            }
            else
            {
                $respuesta_estado = $respuesta_estado . "\nBuscando documento asociado al codigo de artículo $codArt";
                $contenidoPDF = file_get_contents($_FILES["pdfAlta"]["tmp_name"]);
                $sql = "UPDATE Guitarras SET Archivo = :contenidoPdf WHERE ID = :codArt";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(":contenidoPdf", $contenidoPDF);
                $stmt->bindParam(":codArt", $codArt);
                $stmt->execute();
                $respuesta_estado = $respuesta_estado . "\nPDF cargado";
            }
        }

        $dbh = null;
        $respuesta_estado = $respuesta_estado . "\nSe ha dado de alta al artículo. Vuelva a cargar los datos para visualizar los cambios.";
        echo $respuesta_estado;
    }
    catch(PDOException $e)
    {
        $respuesta_estado = $respuesta_estado . "\nERROR: \n" . $e->getMessage();
        echo $respuesta_estado;
    }

?>