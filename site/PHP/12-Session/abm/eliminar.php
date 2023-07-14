<?php
    include("../verificarUsuario.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbname = "id20645219_basedepruebas1";
    $host = "localhost";
    $user = "id20645219_emiliano";
    $password = "Emi123!!";

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
        $id_usuario = $_SESSION["id_usuario"];
        $id = $_POST["id"];

        echo "Se va a eliminar el registro $id ";
        
        $sql = "DELETE FROM automoviles WHERE id = :id AND id_usuario = :id_usuario";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();


        echo "\nAutomóvil eliminado correctamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $dbh = null;
}
?>