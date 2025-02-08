<?php

class Personaje {
    var $identificacion = "";
    var $nombre = "";
    var $apellido = "";
    var $fecha_nacimiento = "";
    var $foto = "";
    var $profesion_rol = ""; // Profesión o Rol en el Mundo Barbie

    function edad() {
        // Calculando la edad a partir de la fecha de nacimiento
        $fecha_n = strtotime($this->fecha_nacimiento);
        $fecha_actual = time();
        $edad = ($fecha_actual - $fecha_n) / (60 * 60 * 24 * 365.25);
        return floor($edad);
    }
}

class Profesion {
    public $nombre;
    public $categoria;
    public $nivel_experiencia;
    public $salario_mensual;

    public function __construct($nombre, $categoria, $nivel_experiencia, $salario_mensual) {
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->nivel_experiencia = $nivel_experiencia;
        $this->salario_mensual = $salario_mensual;
    }
}
?>

