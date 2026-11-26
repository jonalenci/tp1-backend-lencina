<?php
class Producto {
    private int $producto_id;
    private string $nombre;
    private string $categoria;
    private float $precio;
    private int $stock;
    private int $proveedor_id;

    public function __construct(int $producto_id, string $nombre, string $categoria, float $precio, int $stock, int $proveedor_id) {
        if ($producto_id <= 0) throw new Exception("El producto_id debe ser mayor a 0.");
        $this->producto_id = $producto_id;
        $this->setNombre($nombre);
        $this->setCategoria($categoria);
        $this->setPrecio($precio);
        $this->setStock($stock);
        $this->setProveedorId($proveedor_id);
    }

    public function getProductoId(): int { return $this->producto_id; }
    public function setProductoId(int $producto_id): void {
        if ($producto_id <= 0) throw new Exception("El producto_id debe ser mayor a 0.");
        $this->producto_id = $producto_id;
    }

    public function getNombre(): string { return $this->nombre; }
    public function setNombre(string $nombre): void {
        if (trim($nombre) === '') throw new Exception("El nombre del producto no puede estar vacío.");
        $this->nombre = trim($nombre);
    }

    public function getCategoria(): string { return $this->categoria; }
    public function setCategoria(string $categoria): void {
        if (trim($categoria) === '') throw new Exception("La categoría no puede estar vacía.");
        $this->categoria = trim($categoria);
    }

    public function getPrecio(): float { return $this->precio; }
    public function setPrecio(float $precio): void {
        if ($precio <= 0) throw new Exception("El precio debe ser mayor a 0.");
        $this->precio = $precio;
    }

    public function getStock(): int { return $this->stock; }
    public function setStock(int $stock): void {
        if ($stock < 0) throw new Exception("El stock debe ser mayor o igual a 0.");
        $this->stock = $stock;
    }

    public function getProveedorId(): int { return $this->proveedor_id; }
    public function setProveedorId(int $proveedor_id): void {
        if ($proveedor_id <= 0) throw new Exception("El proveedor_id debe ser mayor a 0.");
        $this->proveedor_id = $proveedor_id;
    }

    public function describir(): string {
        return "{$this->nombre} ({$this->categoria}) - $" . number_format($this->precio, 2, ',', '.') . " - Stock: {$this->stock} - Proveedor ID: {$this->proveedor_id}";
    }
}
?>
