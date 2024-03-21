
<?php

    function getProductes() {
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

        return $productes;
    }
?>