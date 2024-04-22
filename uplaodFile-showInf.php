<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
    if(isset($_POST["send"])){
        if($_FILES["cv"]["size"]>0){
        
            $is_carpeta = false;
            if(is_uploaded_file($_FILES["cv"]["tmp_name"])){
                //mover el archivo del carpeta temporal al destino definitivo indicado por nosotros
                if(!file_exists("documents/")){
                    if(mkdir("documents/",0777)) $is_carpeta = true;
                }else{
                    $is_carpeta = true;
                }
                if($is_carpeta){
                    $path = "documents/".$_FILES["cv"]["name"];
                    if(move_uploaded_file($_FILES["cv"]["tmp_name"],$path)){
                       // echo "<br>OK";
                    }else{
                        echo "Ha habido un error no se ha podido subir el archivo al servidor";
                    }
                }else{
                    echo "no se ha podido subir el archivo porque no se ha podido crear la carpeta";
                }
                
                
            }else{
                echo "Ha habido un error no se ha podido subir el archivo a la carpeta temporal ".$_FILES["cv"]["error"];
            }
        }
    }
    ?>

    <h1>Hola <?= $_POST['nombre']?></h1>
    <p><a href="<?= $path?>" target="_blank">CV</a></p>
    <p><a href="download.php?file=<?= $path?>">CV</a></p>
</body>
</html>