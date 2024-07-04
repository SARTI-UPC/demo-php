<?php
trait traitFuncionsText{
    public function sanearCampo($text){
        $text = trim($text);
        $text = stripslashes($text);
        return $text;
    }

    public function saludar($text){
        return "Hola ". $text;
    }
}

trait traitFuncionsNumber{
    public function descuento($number){
        return $number - ($number*0.25);
    }
}