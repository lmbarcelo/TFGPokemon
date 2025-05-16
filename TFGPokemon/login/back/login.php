<?php
    session_start();

    // Conexión a la base de datos (ajusta las credenciales)
    $conexion = new mysqli("localhost", "root", "", "magiktcg");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario['nombre'];
            header("Location: ../../index.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No existe una cuenta con ese correo.";
    }

    $stmt->close();
    $conexion->close();
?>
