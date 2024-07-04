<?php

class Coche{

    use traitFuncionsText;
    private $modelo;
    private $matricula;
    private $puertas;
    private $color;

    public function __construct($modelo = "", $matricula = "", $puertas = "", $color = ""){

        $this-> modelo = $modelo;
        $this-> matricula = $matricula;
        $this-> puertas = $puertas;
        $this-> color = $color;

    }

    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getMatricula(){
        return $this->matricula;
    }
    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function getPuertas(){
        return $this->puertas;
    }
    public function setPuertas($puertas){
        $this->puertas = $puertas;
    }

    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }

    public function pararCoche(){
        echo "Coche ".$this->matricula." con color ".$this->color." esta parado<br>";
    }

    public function arrancarCoche(){
        echo "el coche ".$this->matricula." y color ".$this->color." esta arrancado<br>";
    }

}