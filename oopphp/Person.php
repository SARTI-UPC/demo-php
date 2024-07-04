<?php

class Person{

   use traitFuncionsText, traitFuncionsNumber;

   public $nom;
   private $edat;
   protected $dni;
   private $direccio;

   public static $drinkingAge = 18;

   public function __construct($nom, $edat, $dni, $direccio=""){
    $this->nom = $nom;
    $this->edat = $edat;
    $this->dni = $dni;
    $this->direccio = $direccio;
   }

   public static function setDrinkingAge($newAge){
      self::$drinkingAge = $newAge;
   }

   /****Setter and Getters */
   public function getNom(){
    return $this->nom;
   }
   public function setNom($nom){
    $this->nom = $this->sanearCampo($nom);
   }

   public function getEdat(){
    return $this->edat;
   }
   public function setEdat($edat){
    $this->edat = $this->descuento($edat);
   }

   /*public function __destruct(){
    echo "<br>Adios". $this->nom;
   }*/

}
/*
$persona1 = new Person();
$persona1->nom = "Ikram";
// $persona1->edat = 37; error 
$persona1->genere = "Femini";*/


?>