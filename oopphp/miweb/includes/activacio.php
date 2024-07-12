<?php
    $token = $_GET["token"];

    //instanciar las classes
    require "../model/connection.php";
    require "../model/user.php";
    require "../controler/userContr.php";

    $newPass = new UserContr();
    $newPass->setToken($token);

    
    //ejecutar gestor de errores i crear nuevo password
    $newPass->activateAccount();

    //rederigir a la pagina de login
    header("Location: ../view/login.php");

