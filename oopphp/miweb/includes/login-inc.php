<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send"])){

    // recoger datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    //$rememberme = $_POST["rememberme"];

    //instanciar las classes
    /*require "../model/connection.php";
    require "../model/user.php";
    require "../controler/userContr.php";*/

    require "autoload.models.php";
    require "autoload.controlers.php";

    $login = new UserContr($username, $password);
    //$login->setRememberme($rememberme);
    $login->loginUser();

    //Volver a la pagina inicial
   // header("Location: ../view/login.html?error=none");

}