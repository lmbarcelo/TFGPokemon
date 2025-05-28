<?php
session_start();

// Asegurar carrito
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Recibir datos POST
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];
$idioma = $_POST['idioma'];

// Si el producto ya existe en el carrito (por ID), aumenta la cantidad
if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]['cantidad']++;
} else {
    // Si no existe, lo agrega con cantidad 1
    $_SESSION['carrito'][$id] = [
        'id' => $id,
        'nombre' => $nombre,
        'precio' => $precio,
        'imagen' => $imagen,
        'idioma' => $idioma,
        'cantidad' => 1
    ];
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
