<?php 
require "autoload.models.php";
require "autoload.controlers.php";


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generatePdf"])){
    $numComanda = $_POST['comanda'];
    $comandaContr = new ComandaContr();
    $comandaContr->generateInvoice($numComanda);
}

?>