<?php
require_once __DIR__ . '/Persona.php';

class Proveedor extends Persona {
    private int $proveedor_id;
    private string $empresa;
    private string $rubro;

    public function __construct(int $proveedor_id, string $nombre, string $apellido, string $email, string $empresa, string $rubro) {
        parent::__construct($nombre, $apellido, $email);
        if ($proveedor_id <= 0) throw new Exception("El proveedor_id debe ser mayor a 0.");
        $this->proveedor_id = $proveedor_id;
        $this->setEmpresa($empresa);
        $this->setRubro($rubro);
    }

    public function getProveedorId(): int { return $this->proveedor_id; }
    public function setProveedorId(int $proveedor_id): void {
        if ($proveedor_id <= 0) throw new Exception("El proveedor_id debe ser mayor a 0.");
        $this->proveedor_id = $proveedor_id;
    }

    public function getEmpresa(): string { return $this->empresa; }
    public function setEmpresa(string $empresa): void {
        if (trim($empresa) === '') throw new Exception("La empresa no puede estar vacía.");
        $this->empresa = trim($empresa);
    }

    public function getRubro(): string { return $this->rubro; }
    public function setRubro(string $rubro): void {
        if (trim($rubro) === '') throw new Exception("El rubro no puede estar vacío.");
        $this->rubro = trim($rubro);
    }

    public function describir(): string {
        return "Proveedor #{$this->proveedor_id}: {$this->empresa} - {$this->rubro}. Contacto: " . parent::describir();
    }
}
?>
