<?php 

class UserContr extends User{
    private $username;
    private $password;
    private $repeatPwd;
    private $email;
    private $rememberme;

    public function __construct($username, $password, $repeatPwd="", $email=""){
        $this->username = $username;
        $this->password = $password;
        $this->repeatPwd = $repeatPwd;
        $this->email = $email;
    }

    /**Setters and getters */
    public function setUsername($username){
         $this->username = $username;
    }
    public function getUsername(){
        return $this->username;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
   
    public function setRepeatPwd($repeatPwd){
        $this->repeatPwd = $repeatPwd;
    }
    public function getRepeatPwd(){
        return $this->repeatPwd;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
       return $this->email;
    }
    
    public function setRememberme($rememberme){
        $this->rememberme = $rememberme;
    }
    public function getRememberme(){
       return $this->rememberme;
    }
    /*** */

    public function signupUser(){

        //validation
        if($this->emptyInput($this->username) == false|| $this->emptyInput($this->password)== false || $this->emptyInput($this->repeatPwd)== false || $this->emptyInput($this->email)== false ){
            header("Location: ../view/signup.html?error=emptyInput");
            exit();
        }
        if($this->usernameTakenCheck() == 2){
            header("Location: ../view/signup.html?error=UsernameTaken");
            exit();
        }
        if($this->usernameTakenCheck() == 1){
            header("Location: ../view/signup.html?error=FailedStmt");
            exit();
        }

        //setUser to DB
        if($this->setUser($this->username, $this->password, $this->email)){
            header("Location: ../view/signup.html?error=FailedStmt");
        }
    }

    public function loginUser(){

        //validation
        if($this->emptyInput($this->username) == false|| $this->emptyInput($this->password) == false){
            header("Location: ../view/login.php?error=emptyInput");
            exit();
        }

        //verifyUser in DB
        $res = $this->verifyLoginUser($this->username, $this->password);
        if($res==1){
            header("Location: ../view/login.php?error=FailedStmt");
        }
        if($res==2){
            header("Location: ../view/login.php?error=invalidPassUser");
        }
    }

    private function emptyInput($input){
        $result = true;

        if(empty($input)){
            $result = false;
        }
        return $result;
    }

    private function usernameTakenCheck(){
        $result = $this->checkUser($this->username, $this->email);
    
        return $result;
    }
}