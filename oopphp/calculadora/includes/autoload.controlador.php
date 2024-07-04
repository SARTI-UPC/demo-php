<?php 
//la funcion de php que registra los autorecarga
spl_autoload_register("myAutoloadControler");

function myAutoloadControler($classname){
    $extension = ".php"; // la extension del archivo
    $path = "../controlador/"; // la carpeta donde estan las classes que queremos cargar
    $fullpath = $path.$classname.$extension; // la ruta completa

    require_once $fullpath;

}