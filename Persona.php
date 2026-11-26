<?php
class Persona {
    protected string $nombre;
    protected string $apellido;
    protected string $email;

    public function __construct(string $nombre, string $apellido, string $email) {
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setEmail($email);
    }

    public function getNombre(): string { return $this->nombre; }
    public function setNombre(string $nombre): void {
        if (trim($nombre) === '') throw new Exception("El nombre no puede estar vacío.");
        $this->nombre = trim($nombre);
    }

    public function getApellido(): string { return $this->apellido; }
    public function setApellido(string $apellido): void {
        if (trim($apellido) === '') throw new Exception("El apellido no puede estar vacío.");
        $this->apellido = trim($apellido);
    }

    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("El email no tiene un formato válido.");
        $this->email = trim($email);
    }

    public function describir(): string {
        return "{$this->nombre} {$this->apellido} ({$this->email})";
    }
}
?>
