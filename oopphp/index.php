<?php
require "calculadora/includes/myAutoload.php";

//require "FuncionsTrait.php";
/*require "Person.php";
require "Client.php";
require "Empleat.php";*/

$client1 = new Clients("ikram", 37, "12345678A");
//$client1->saludar();
$client1->asignarAgente();


$empleat1 = new Empleat("Pepito", 42, "98765432B", "Rambla Exposicio nº 24");
//$empleat1->saludar();
$empleat1->setOficina("Cubelles");

echo Person::$drinkingAge ."<br>";

Person::setDrinkingAge(21);

echo Person::$drinkingAge ."<br>";

$persona1 = new Person("Pepito", 42, "98765432B");
echo $persona1->nom ."<br>";

echo $persona1->saludar($persona1->nom);
$persona1->setEdat(38);
echo "<br>nova edat:". $persona1->getEdat();
// $persona1->genere = "Femini"; error porque atributo es protected


$coche1 = new Coche("Peugot", "1234ABC", 5, "gris");
$coche1->arrancarCoche();
$coche1->setColor("Amarillo");
$coche1->pararCoche();

/*/*
$coche2 = new Coche();
$coche2->arrancarCoche();
$coche2->setColor("Rojo");
$coche2->pararCoche();*/