<?php

class Connection {

    protected function connect(){
        try {
            $con = new PDO('mysql:host=localhost;dbname=test', 'root','');
            return $con;
        } catch (PDOException $e) {
            return "Error!: ". $e->getMessage()."<br>";
        }
    }
    
    protected function connectEmpresa(){
        try {
            $con = new PDO('mysql:host=localhost;dbname=empresa', 'root','');
            return $con;
        } catch (PDOException $e) {
            return "Error!: ". $e->getMessage()."<br>";
        }
    }
}