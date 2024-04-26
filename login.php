<?php
//validar y sanear los datos introducidos por el usuario
function validate_input($input){
    $input = trim($input); 
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    return $input;
}

//verficamos que se ha enviado el forumulario
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send"])){
    $username = validate_input($_POST["username"]);
    $password = validate_input($_POST["pwd"]);

    $passwordCodificado = sha1(md5($password));
    //verificar credenciales (luego seria con con BBDD)
    if($username=="test" && $passwordCodificado=="50a8d4a4f487c7548daa40e6a9f8956f46d858f8"){
    session_start([
        'use_only_cookies'=>1,
        'cookie_lifetime' =>0,
        'cookie_secure' => 1,
        'cookie_httponly' =>1
    ]);

    // esto ayuda a mejorar los ataques de session fija
    session_regenerate_id();
    //Almacenar ID de usuario en la SESSION (esto en app real seria mas complejo)
    $_SESSION['user_id'] = 1;
    $_SESSION['username'] = $username;

    // verificar que el usuario ha clicado el remember me, creamos cookie
        if(isset($_POST["remember"])){
            //crear una cookie para recordar el usuario
            $cookie_name = "remember_me";
            $cookie_value = 1; // podria ser el token o el id del usuari
            $cookie_expiry_time = time() + (24*3600); //un dia
            setcookie($cookie_name, $cookie_value, $cookie_expiry_time, "/","",true,true);
        }
      header("Location:home.php");
    }else{ // creadenciales no correctas
        header("Location:rememberFormulario.php?err=1");
       // $error = array("err"=>1, "mgs"=>"Los credenciales no son correctos");
    }

}





?>