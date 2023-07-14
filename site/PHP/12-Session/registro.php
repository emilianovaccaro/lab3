<?php
    $dbname = "id20645219_basedepruebas1";
    $host = "localhost";
    $user = "id20645219_emiliano";
    $password = "Emi123!!";

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
    $logPage = "./index.php";

    $nombreUsuario = $_POST["nombre_usuario"];
    $contrasenia = $_POST["contrasenia"];
    $correoElectronico = $_POST["correo_electronico"];

    // Encriptar la contraseña
    $contraseniaEncriptada = password_hash($contrasenia, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre_usuario, contrasenia, correo_electronico) VALUES (:nombreUsuario, :contrasenia, :correoElectronico)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':nombreUsuario', $nombreUsuario);
    $stmt->bindParam(':contrasenia', $contraseniaEncriptada);
    $stmt->bindParam(':correoElectronico', $correoElectronico);
    $stmt->execute();

    echo "El usuario se ha registrado correctamente";
    echo "<a href=$logPage>Iniciar sesión</a>";

    $dbh = null;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
