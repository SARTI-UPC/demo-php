<?php
$elems = array(2,11,9,8,-1,33,2,45,1,2);
//print_r($elems);

$max = 0;
$min = 999;
$sumatori = 0;
$elem = 0;
foreach ($elems as $elem) {
    echo($elem."<br>");
    if ($max < $elem) {
        $max = $elem;
    }
    if ($min > $elem) {
        $min = $elem;
    }
    $sumatori+=$elem;

}

echo "Elements del vector: " . implode(", ", $elems) . "<br>";
echo "Suma: " . $sumatori . "<br>";
echo "Màxim: " . $max . "<br>";
echo "Mínim: " . $min . "<br>";
?>