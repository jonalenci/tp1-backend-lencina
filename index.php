<?php
require_once __DIR__ . '/clases/Persona.php';
require_once __DIR__ . '/clases/Proveedor.php';
require_once __DIR__ . '/clases/Cliente.php';
require_once __DIR__ . '/clases/Producto.php';

$proveedores = [
    new Proveedor(1, 'Juan', 'Pérez', 'juan@ejemplo.com', 'Distribuidora Norte', 'Alimentos'),
    new Proveedor(2, 'María', 'Gómez', 'maria@ejemplo.com', 'Tecno Hogar', 'Electrónica'),
    new Proveedor(3, 'Pedro', 'López', 'pedro@ejemplo.com', 'Textil Sur', 'Indumentaria')
];

$clientes = [
    new Cliente(1, 'Ana', 'Díaz', 'ana@ejemplo.com', 'minorista', 'Paraná'),
    new Cliente(2, 'Luis', 'Ruiz', 'luis@ejemplo.com', 'mayorista', 'Santa Fe'),
    new Cliente(3, 'Sofía', 'Torres', 'sofia@ejemplo.com', 'vip', 'Rosario')
];

$productos = [
    new Producto(1, 'Arroz', 'Alimentos', 1200, 40, 1),
    new Producto(2, 'Fideos', 'Alimentos', 950, 60, 1),
    new Producto(3, 'Auriculares', 'Electrónica', 15000, 15, 2),
    new Producto(4, 'Teclado', 'Electrónica', 22000, 10, 2)
];

$personas = [
    new Persona('Carla', 'Méndez', 'carla@ejemplo.com'),
    new Persona('Diego', 'Sosa', 'diego@ejemplo.com'),
    new Persona('Elena', 'Vera', 'elena@ejemplo.com'),
    new Persona('Marcos', 'Gil', 'marcos@ejemplo.com')
];

function e(string $valor): string { return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TP1 - Tienda | Backend PHP</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<header class="encabezado"><h1>TP1 - Tienda</h1><p>Programación orientada a objetos en PHP</p></header>
<main class="contenedor">
<section class="panel">
<h2>Personas</h2>
<ul><?php foreach ($personas as $persona): ?><li><?= e($persona->describir()) ?></li><?php endforeach; ?></ul>
</section>

<section class="panel">
<h2>Proveedores</h2>
<ul><?php foreach ($proveedores as $proveedor): ?><li><?= e($proveedor->describir()) ?></li><?php endforeach; ?></ul>
</section>

<section class="panel">
<h2>Clientes</h2>
<ul><?php foreach ($clientes as $cliente): ?><li><?= e($cliente->describir()) ?></li><?php endforeach; ?></ul>
</section>

<section class="panel">
<h2>Productos</h2>
<div class="tabla-scroll"><table>
<thead><tr><th>ID</th><th>Producto</th><th>Categoría</th><th>Precio</th><th>Stock</th><th>Proveedor</th></tr></thead>
<tbody>
<?php foreach ($productos as $producto):
    $nombreProveedor = 'No encontrado';
    foreach ($proveedores as $proveedor) {
        if ($proveedor->getProveedorId() === $producto->getProveedorId()) {
            $nombreProveedor = $proveedor->getEmpresa();
            break;
        }
    }
?>
<tr>
<td><?= $producto->getProductoId() ?></td><td><?= e($producto->getNombre()) ?></td>
<td><?= e($producto->getCategoria()) ?></td>
<td>$<?= number_format($producto->getPrecio(), 2, ',', '.') ?></td>
<td><?= $producto->getStock() ?></td><td><?= e($nombreProveedor) ?></td>
</tr>
<?php endforeach; ?>
</tbody></table></div>
</section>

<section class="panel">
<h2>Regla de negocio: descuentos</h2>
<p>Precio original: <strong>$10.000</strong></p>
<ul>
<?php foreach ($clientes as $cliente): ?>
<li><?= e($cliente->getTipoCliente()) ?>: <strong>$<?= number_format($cliente->calcularPrecioFinal(10000), 2, ',', '.') ?></strong></li>
<?php endforeach; ?>
</ul>
<p class="nota">Minorista: 0 % · Mayorista: 10 % · VIP: 15 %.</p>
</section>
<p><a class="boton" href="../tp1-frontend-lencina/frontend.html">Abrir frontend con buscadores y formulario</a></p>
</main>
</body></html>
