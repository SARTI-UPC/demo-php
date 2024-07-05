<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();

    if(isset($_SESSION["username"])) echo $_SESSION["username"]."<br>";
    ?>
   <form method="post" action="../includes/login-inc.php">
    <input type="text" name="username" placeholder="Introduce your name"><br>
    <input type="password" name="password" placeholder="Introduce your password"><br>
    <input type="submit" name="send" value="Login">
   </form> 
</body>
</html>