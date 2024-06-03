<?php

// Clase abstracta FiguraGeometrica
abstract class FiguraGeometrica {
    // Método abstracto para calcular el área
    abstract public function calcularArea();
}

// Clase Rectangulo que extiende de FiguraGeometrica
class Rectangulo extends FiguraGeometrica {
    protected $ancho;
    protected $alto;

    public function __construct($ancho, $alto) {
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    public function calcularArea() {
        return $this->ancho * $this->alto;
    }
}

// Clase Cuadrado que extiende de Rectangulo
class Cuadrado extends Rectangulo {
    public function __construct($lado) {
        parent::__construct($lado, $lado); // El ancho y el alto son iguales en un cuadrado
    }
}

// Clase Circulo que extiende de FiguraGeometrica
class Circulo extends FiguraGeometrica {
    private $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function calcularArea() {
        return pi() * pow($this->radio, 2);
    }
}

// Crear un array de instancias de figuras geométricas
$figuras = [
    new Rectangulo(10, 20),
    new Cuadrado(15),
    new Circulo(7)
];

// Iterar sobre el array y mostrar las áreas
foreach ($figuras as $figura) {
    echo "Área de la figura: " . $figura->calcularArea() . "<br>";
}

?>