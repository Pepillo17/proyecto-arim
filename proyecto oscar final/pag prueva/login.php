<?php
session_start();

// Verificar si los datos de inicio de sesión son válidos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "catalogoambar";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }

    // Consultar la base de datos para verificar los datos de inicio de sesión
    $stmt = $conn->prepare("SELECT * FROM usuarios ");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Los datos de inicio de sesión son válidos, iniciar sesión y almacenar datos en variables de sesión
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;

        // Redirigir al usuario a la página de inicio después de iniciar sesión
        header('Location: inicio.php');
        exit;
    } else {
        // Los datos de inicio de sesión son inválidos, mostrar un mensaje de error
        $error = 'Usuario o contraseña incorrectos';
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado del inicio de sesión</title>
</head>
<body>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
