<?php
include("library/productes.php");
?>
<HTML>
    <BODY>

    <H1>Els productes de proximitat - KM0 - V4</H1>
    <BR>
    <BR>
    
    <TABLE border="1">
    <?php 

    $productes = getProductes();

    foreach ($productes as $producte) {
        ?>
        <TR>
            <TD><?=$producte['nom']?></TD>
            <TD><img width="100px" src='<?=$producte['imatge']?>' alt=''></TD>
            <TD><?=$producte['preu']?>€</TD>
        </TR>
    <?php
    }
    ?>
    </BODY>

</HTML>