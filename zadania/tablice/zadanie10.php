<?php

// tworzenie tablicy 10 losowych liczb dwucyfrowych
$tablica = [];

for ($i = 0; $i < 10; $i++) {
    $tablica[] = rand(10, 99);
}

// zmienne do obliczeń
$suma = 0;
$min = $tablica[0];
$max = $tablica[0];

// jedna pętla foreach
foreach ($tablica as $liczba) {

    $suma += $liczba;

    if ($liczba < $min) {
        $min = $liczba;
    }

    if ($liczba > $max) {
        $max = $liczba;
    }
}

$srednia = $suma / count($tablica);

// wyświetlanie wyników
echo "Tablica: ";
foreach ($tablica as $liczba) {
    echo $liczba . " ";
}

echo "<br>Suma: $suma";
echo "<br>Średnia: $srednia";
echo "<br>Min: $min";
echo "<br>Max: $max";

?>