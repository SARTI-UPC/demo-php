<?php
class User extends Connection{

    protected function setUser($username, $password, $email, $token){
        $error = false;
        $stmt = $this->connect()->prepare("INSERT INTO users (username, password, email, token) VALUES (?,?,?,?)");

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $hashedPwd, $email,$token))){
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
        $stmt = $this->connect()->prepare("SELECT password from users WHERE username = ? and status=?");
        $status = 1;
        if(!$stmt->execute(array($username, $status))){
            $error = 1;
        }

        if($stmt->rowCount()>0){
            $res = $stmt->fetchAll();
            $hashedPwd = $res[0]['password'];
            if(password_verify($password, $hashedPwd)==false){
                $error = 2;
            }else{
                $_SESSION["username"] = $username;
            }  
        }else{
            $error = 2;
        }
        $stmt = null;
        return $error;

    }

    protected function setTokenUser($token, $email){
        $error = false;
        $stmt = $this->connect()->prepare("UPDATE users set token= ? where email = ?");
        
        if(!$stmt->execute(array($token, $email))){
           $error = true;
            
        }
        $stmt = null;
        return $error;
    }

    protected function setNewPassword($token, $password){
        $error = false;
        $stmt = $this->connect()->prepare("UPDATE users set password= ?, token=null, created_at=null where token = ?");
        
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        if(!$stmt->execute(array($hashedPwd, $token))){
           $error = true;   
        }

        $stmt = null;
        return $error;
    }

    protected function setStatus($token){
        $error = false;
        $stmt = $this->connect()->prepare("UPDATE users set status= ?, token=null, created_at=null where token = ?");
        $status = 1;
        if(!$stmt->execute(array($status, $token))){
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

    protected function checkToken($token){
        $stmt = $this->connect()->prepare("SELECT username FROM users WHERE token = ?;");
        if(!$stmt->execute(array($token))){
            $stmt = null;
            header("Location: ../view/newpassword.php?error=stmtfailed");
            exit();
        }
        $resultCheck = false;
        if($stmt->rowCount()>0){
            $resultCheck = true;
        }

        return $resultCheck;
    }

    protected function checkTokenExpired($token){
        $stmt = $this->connect()->prepare("SELECT timestampdiff(MINUTE, created_at, now())as diff FROM users WHERE token = ?;");
        if(!$stmt->execute(array($token))){
            $stmt = null;
            header("Location: ../view/newpassword.php?error=stmtfailed");
            exit();
        }
        $diff = -1;
        if($stmt->rowCount()>0){
            $res = $stmt->fetchAll();
            $diff = $res[0]['diff'];
        }

        return $diff;
    }

}
