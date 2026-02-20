 <?php
function massivKopaytma($massiv) {
    $kopaytma = 1;
    foreach ($massiv as $son) {
        $kopaytma *= $son;
    }
    return $kopaytma;
}

$sonlar = [2, 3, 4, 5];
$natija = massivKopaytma($sonlar);

echo "Massiv: " . implode(", ", $sonlar) . "<br>";
echo "Ko'paytma: " . $natija;
?>