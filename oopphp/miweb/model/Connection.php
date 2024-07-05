<?php

class Connection {

    protected function connect(){
        try {
            //$con = mysqli_connect("localhost","root","","test");
            $con = new PDO('mysql:host=localhost;dbname=test', 'root','');
            return $con;
        } catch (PDOException $e) {
            return "Error!: ". $e->getMessage()."<br>";
        }
    }
}