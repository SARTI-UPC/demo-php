<?php 
spl_autoload_register("myAutoload");

function myAutoload($classname){
    $extension = ".php";
    $fullpath = $classname.$extension;

    if(!file_exists($fullpath)){
    
    }

    require_once $fullpath;

}