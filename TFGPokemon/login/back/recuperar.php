<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? '');

    // Validación básica
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['recuperar_error'] = "Introduce un correo válido.";
        header("Location: ../front/recuperar.php");
        exit;
    }

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "magiktcg");
    if ($conexion->connect_error) {
        $_SESSION['recuperar_error'] = "Error de conexión.";
        header("Location: ../front/recuperar.php");
        exit;
    }

    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        $_SESSION['recuperar_error'] = "No existe ninguna cuenta con ese correo.";
        header("Location: ../front/recuperar.php");
        exit;
    }

    $_SESSION['recuperar_exito'] = "Si el correo existe, recibirás instrucciones para restablecer tu contraseña.";
    header("Location: ../front/recuperar.php");
    exit;
} else {
    header("Location: ../front/recuperar.php");
    exit;
}
