<?php

$productes = array(
    array(
        "nom" => "Pomes",
        "imatge" => "https://www.cuina.cat/uploads/s1/65/74/83/red-delicious_22_645x400.jpeg",
        "preu" => 10.99
    ),
    array(
        "nom" => "Taronges",
        "imatge" => "https://botiga.mercatfontetes.cat/598-large_default/taronges-1kg-aprox-.jpg",
        "preu" => 20.49
    ),
    array(
        "nom" => "Cireres",
        "imatge" => "https://etselquemenges.cat/wp-content/media/2012/05/cireres-600.gif",
        "preu" => 15.79
    ),
    array(
        "nom" => "Cireres II",
        "imatge" => "https://etselquemenges.cat/wp-content/media/2012/05/cireres-600.gif",
        "preu" => 25.79
    )

);

?>

<HTML>
    <BODY>

    <H1>Els productes de proximitat - KM0</H1>
    <BR>
    <BR>
    
    <TABLE border="1">
    <?php 
    foreach ($productes as $producte) {
        ?>
        <TR>
            <TD>**<?=$producte['nom']?>**</TD>
            <TD><img width="100px" src='<?=$producte['imatge']?>' alt=''></TD>
            <TD><?=$producte['preu']?>€</TD>
        </TR>
    <?php
    }
    ?>
    </BODY>

</HTML>