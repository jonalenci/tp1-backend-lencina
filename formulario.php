<?php
require_once __DIR__ . '/clases/Producto.php';

$errores = [];
$producto = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = filter_input(INPUT_POST, 'producto_id', FILTER_VALIDATE_INT);
    $nombre = trim($_POST['nombre'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT);
    $stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_INT);
    $proveedor_id = filter_input(INPUT_POST, 'proveedor_id', FILTER_VALIDATE_INT);

    if (!$producto_id || $producto_id <= 0) $errores[] = 'El ID debe ser un entero mayor a 0.';
    if ($nombre === '') $errores[] = 'El nombre del producto no puede estar vacío.';
    if ($categoria === '') $errores[] = 'La categoría no puede estar vacía.';
    if ($precio === false || $precio === null || $precio <= 0) $errores[] = 'El precio debe ser mayor a 0.';
    if ($stock === false || $stock === null || $stock < 0) $errores[] = 'El stock debe ser un entero mayor o igual a 0.';
    if (!$proveedor_id || $proveedor_id <= 0) $errores[] = 'El proveedor_id debe ser mayor a 0.';

    if (!$errores) {
        try {
            $producto = new Producto($producto_id, $nombre, $categoria, (float)$precio, $stock, $proveedor_id);
        } catch (Exception $ex) {
            $errores[] = $ex->getMessage();
        }
    }
}
function e(string $valor): string { return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Alta de producto</title><link rel="stylesheet" href="estilos.css"></head><body>
<main class="contenedor">
<section class="panel">
<h1>Alta de producto - Backend PHP</h1>
<?php if ($errores): ?>
<div class="error"><h2>No se pudo registrar el producto</h2><ul><?php foreach ($errores as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div>
<?php elseif ($producto): ?>
<div class="exito"><h2>Producto recibido correctamente</h2><p><?= e($producto->describir()) ?></p></div>
<?php else: ?>
<p>No se recibieron datos. Volvé al formulario.</p>
<?php endif; ?>
<a class="boton" href="../tp1-frontend-lencina/frontend.html">Volver al formulario</a> <a class="boton secundario" href="index.php">Inicio</a>
</section></main></body></html>
