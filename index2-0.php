<?php
ini_set('display_errors', 1);
ini_set('log_errors', 'On');
error_reporting(E_ALL);

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
    )
);

echo("<!--\n");
print_r($productes);    
echo("-->");

echo("<HTML>");
echo("<BODY>");
echo("<H1>Els productes de proximitat - KM0</H1>");
echo("<BR>");
echo("<BR>");
echo("<TABLE border='1'>");


foreach ($productes as $producte) {
    echo("<TR>");
        echo("<TD>".$producte['nom']."</TD>");
        echo("<TD><img width=\"100px\" src='".$producte['imatge']."' alt=''></TD>");
        echo("<TD>".$producte['preu']."€</TD>");
        echo("<td>X</td>");
    echo("</TR>");
}

echo("</BODY>");
echo("</HTML>");
?>