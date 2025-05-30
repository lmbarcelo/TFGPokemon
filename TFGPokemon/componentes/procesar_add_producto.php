<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'Admin') {
    header('Location: /TFGPokemon/index.php');
    exit;
}

// Conexión
$conexion = new mysqli("localhost", "root", "", "magiktcg");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recogida de datos
$nombre = $conexion->real_escape_string($_POST['nombre']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$precio = floatval($_POST['precio']);
$stock = intval($_POST['stock']);
$idioma = $conexion->real_escape_string($_POST['idioma']);
$categoria_id = intval($_POST['categoria_id']);

// Procesar imagen
$nombreImagen = basename($_FILES['imagen']['name']);
$carpetaDestino = "../img/sobres/$idioma/";
$rutaFinal = $carpetaDestino . $nombreImagen;

// Crear carpeta si no existe
if (!is_dir($carpetaDestino)) {
    mkdir($carpetaDestino, 0755, true);
}

if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaFinal)) {
    // Ruta relativa para la base de datos
    $rutaImagenBD = "$idioma/" . $nombreImagen;

    $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, idioma, imagen, categoria_id)
            VALUES ('$nombre', '$descripcion', $precio, $stock, '$idioma', '$rutaImagenBD', $categoria_id)";

    if ($conexion->query($sql)) {
        echo "✅ Producto añadido con éxito. <a href='admin_add_product.php'>Volver</a>";
    } else {
        echo "❌ Error al guardar en la base de datos: " . $conexion->error;
    }
} else {
    echo "❌ Error al subir la imagen.";
}

$conexion->close();
?>
