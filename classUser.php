<?php

class User {
    public $id;
    public $nombre_completo;
    public $fecha_nacimiento;
    public $telefono;
    public $direccion;
    public $nickname;
    public $password;

    public function __construct(
        $id = null, $nombre_completo = null, $fecha_nacimiento = null, 
        $telefono = null, $direccion = null, $nickname = null, $password = null
    ) {
        $this->id = $id;
        $this->nombre_completo = $nombre_completo;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->nickname = $nickname;
        $this->password = $password;
    }
}
?>