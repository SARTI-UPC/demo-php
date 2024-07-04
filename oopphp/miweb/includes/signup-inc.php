<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send"])){

    // recoger datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];
    $email = $_POST["email"];

    //instanciar las classes
    require "../model/connection.php";
    require "../model/user.php";
    require "../controler/userContr.php";

    $signup = new UserContr($username, $password, $repeatPassword, $email);
    $signup->signupUser();

    //Volver a la pagina inicial
    header("Location: ../view/signup.html?error=none");

}