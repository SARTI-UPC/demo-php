<?php

class Empleat extends Person{
    private $oficina;

    public function setOficina($oficina){
        $this->oficina = $oficina;
    }
    public function getOficina(){
        return $this->oficina;
    }
}