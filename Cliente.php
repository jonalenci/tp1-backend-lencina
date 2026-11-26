<?php
require_once __DIR__ . '/Persona.php';

class Cliente extends Persona {
    private int $cliente_id;
    private string $tipoCliente;
    private string $ciudad;

    public function __construct(int $cliente_id, string $nombre, string $apellido, string $email, string $tipoCliente, string $ciudad) {
        parent::__construct($nombre, $apellido, $email);
        if ($cliente_id <= 0) throw new Exception("El cliente_id debe ser mayor a 0.");
        $this->cliente_id = $cliente_id;
        $this->setTipoCliente($tipoCliente);
        $this->setCiudad($ciudad);
    }

    public function getClienteId(): int { return $this->cliente_id; }
    public function setClienteId(int $cliente_id): void {
        if ($cliente_id <= 0) throw new Exception("El cliente_id debe ser mayor a 0.");
        $this->cliente_id = $cliente_id;
    }

    public function getTipoCliente(): string { return $this->tipoCliente; }
    public function setTipoCliente(string $tipoCliente): void {
        $permitidos = ['minorista', 'mayorista', 'vip'];
        if (!in_array($tipoCliente, $permitidos, true)) throw new Exception("tipoCliente debe ser minorista, mayorista o vip.");
        $this->tipoCliente = $tipoCliente;
    }

    public function getCiudad(): string { return $this->ciudad; }
    public function setCiudad(string $ciudad): void {
        if (trim($ciudad) === '') throw new Exception("La ciudad no puede estar vacía.");
        $this->ciudad = trim($ciudad);
    }

    public function calcularPrecioFinal(float $precio): float {
        if ($precio <= 0) throw new Exception("El precio debe ser mayor a 0.");
        $descuentos = ['minorista' => 0, 'mayorista' => 0.10, 'vip' => 0.15];
        return round($precio * (1 - $descuentos[$this->tipoCliente]), 2);
    }

    public function describir(): string {
        return "Cliente #{$this->cliente_id}: " . parent::describir() . " - {$this->tipoCliente} - {$this->ciudad}";
    }
}
?>
