<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send"])){

    // recoger datos del formulario
    $email = $_POST["email"];

    //instanciar las classes
    require "../model/connection.php";
    require "../model/user.php";
    require "../controler/userContr.php";

    $forgotPass = new UserContr();
    
    $forgotPass->setEmail($email);
    //ejecutar gestor de errores y registrar usuario
    $forgotPass->forgotPassword();

}