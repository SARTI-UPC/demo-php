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
        $error = 0;
        $stmt = $this->connect()->prepare("SELECT username from users WHERE username = ? OR email = ?");

        if(!$stmt->execute(array($username, $email))){
            $error = 1;
        }

        if($stmt->rowCount()>0){
            $error = 2;
        }

        $stmt = null;
        return $error;
    }

    protected function verifyLoginUser($username, $password){
        $error = 0;
        $stmt = $this->connect()->prepare("SELECT password from users WHERE username = ?");

        if(!$stmt->execute(array($username))){
            $error = 1;
        }

        if($stmt->rowCount()>0){
            $res = $stmt->fetchAll();
            $hashedPwd = $res[0]['password'];

            $_SESSION["username"] = $username;
         
            if(password_verify($password, $hashedPwd)){
                $error = 2;
            }
        }else{
            $error = 2;
        }
        $stmt = null;
        return $error;

    }

    protected function setToken($token, $email){
        $error = false;
        $stmt = $this->connect()->prepare("UPDATE users set token= ? where email = ?");
        
        if(!$stmt->execute(array($token, $email))){
           $error = true;
            
        }
        $stmt = null;
        return $error;
    }

    protected function checkUserByEmail($email){
        $stmt = $this->connect()->prepare("SELECT username FROM users WHERE email = ?;");
        if(!$stmt->execute(array($email))){
            $stmt = null;
            header("Location: ../views/forgotpassword.php?error=stmtfailed");
            exit();
        }
        $resultCheck = false;
        if($stmt->rowCount()>0){
            $resultCheck = true;
        }

        return $resultCheck;
    }


}
