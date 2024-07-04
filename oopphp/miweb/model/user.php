<?php
class User extends Connection{

    protected function setUser($username, $password, $email){
        $error = false;
        $stmt = $this->connect()->prepare("INSERT INTO users (username, password, email) VALUES (?,?,?)");

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $hashedPwd, $email))){
            $error = true;
        }
        $stmt = null;
        return $error;

    }

    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare("SELECT users_username FROM users WHERE username = ? OR email = ?;");
        if(!$stmt->execute(array($username, $email))){
            $stmt = null;
            header("Location: .../view/signup.html?error=stmtfailed");
            exit();
        }
        $resultCheck = false;
        if($stmt->rowCount()>0){
            $resultCheck = true;
        }

        return $resultCheck;
    }
}
