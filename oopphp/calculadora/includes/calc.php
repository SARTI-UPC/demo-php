<?php

//verficamos que se ha enviado el forumulario
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enviar"])){

    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

    //require "../controlador/CalculadoraContr.php";   
    require "autoload.controlador.php"; // esto hace que se van a cargar cualquier clase que invocamos en este archivo y que esta dentro de la carpeta controlador
    
    $calcul = new CalculadoraContr($num1,$num2,$operator);
    echo $calcul->calcular();

}
