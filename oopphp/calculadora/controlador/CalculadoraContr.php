<?php 

class CalculadoraContr{
    private $num1;
    private $num2;
    private $operator;

    public function __construct($num1, $num2, $operator){
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operator = $operator;
    }

    public function calcular(){
        if($this->emptyInput($this->num1) || $this->emptyInput($this->num2)){
            header("Location: ../vista/index.html?err=emptyField");
            exit;
        }else{
            switch ($this->operator) {
                case 'suma':
                    return $this->num1 + $this->num2;
                    break;
                case 'resta':
                    return $this->num1 - $this->num2;
                    break;
                case 'mult':
                    return $this->num1 * $this->num2;
                    break;
                case 'div':
                    return $this->num1 / $this->num2;
                    break;
                
                default:
                    return "Error";
                    break;
            }
        }
    }

    private function emptyInput($input){
        if(empty($input)){
            return true;
        }else{
            return false;
        }
    }
}