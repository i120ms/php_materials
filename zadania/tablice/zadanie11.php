<?php

// tablica imion
$imiona = ["Anna", "Kamil", "Ola", "Piotr", "Magda"];

echo "<h3>Imiona:</h3>";

foreach ($imiona as $imie) {
    echo $imie . "<br>";
}

// wielkie litery
echo "<h3>Imiona wielkimi literami:</h3>";

foreach ($imiona as $imie) {
    echo strtoupper($imie) . "<br>";
}

// małe litery
echo "<h3>Imiona małymi literami:</h3>";

foreach ($imiona as $imie) {
    echo strtolower($imie) . "<br>";
}

?>