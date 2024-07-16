<?php 
require "autoload.models.php";
require "autoload.controlers.php";

$comandaContr = new ComandaContr();
$comandaContr->generateInvoice(110036);

?>