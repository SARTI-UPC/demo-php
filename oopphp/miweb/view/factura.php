<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../includes/generatePdf.php">Generar Factura en PDF</a>
    <form method="post" action="../includes/generatePdf.php">
        <?php 
        require "../includes/autoload.models.php";
        require "../includes/autoload.controlers.php";

        $comandaContr = new ComandaContr();
        $comandes = $comandaContr->getComandes();
        ?>
    <select name="comanda">
        <?php foreach ($comandes as $comanda) {?>
            <option value="<?= $comanda['numcomanda'];?>"><?= $comanda['numcomanda'];?></option>
        <?php }?>
    </select>
    <input type="submit" value="Generate PDF" name="generatePdf">
    </form>
</body>
</html>