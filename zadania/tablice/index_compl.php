<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // $tablica1=array("Maciej","maciej");
    // echo implode(", ", $tablica1);
    // echo "<br>"; echo "<br>";
    // $tablica2=[1,2];
    // echo implode(", ", $tablica2);
    // echo "<br>"; echo "<br>";
    // $tablica3[0]=-6;
    // $tablica3[1]=7;
    // echo implode(", ", $tablica3);
    // echo "<br>"; echo "<br>";
    
    // $napis=["programuję","w","języku","php"];
    // for($i=3 ; $i>=0; $i--){
    //     echo $napis[$i].'<br>';
    // }
    // echo "<br>"; echo "<br>";
    
    // echo getrandmax();
    // echo "<br>"; echo "<br>";
    // $tablica4=[];
    // for($k=0 ; $k<=10 ; $k++){
    //     $tablica4[$k] = rand(100, 999);
    // }
    // echo max($tablica4);
    // echo "<br>"; echo "<br>";
    // echo min($tablica4);
    // echo "<br>"; echo "<br>";
    // $srednia = array_sum($tablica4) / count($tablica4);
    // echo $srednia;
    // echo "<br>"; echo "<br>";
    
    // function czyPierwsza($v){
    // if ($v < 2) return false;
    // if ($v == 2 || $v == 3) return true;
    // if ($v % 2 == 0 || $v % 3 == 0) return false;

    // for ($l = 5; $l * $l <= $v; $l += 6) {
    //     if ($v % $l == 0 || $v % ($l + 2) == 0) return false;
    // }
    // return true;
    // }

    // $liczbyPierwsze = [];

    // for ($l = 0; $l < count($tablica4); $l++) {
    // if (czyPierwsza($tablica4[$l])) {
    //     $liczbyPierwsze[] = $tablica4[$l];
    // }
    // }
    //     echo "<h3>Wynik Zadania 5*:</h3>";
    // if (count($liczbyPierwsze) > 0) {
    //     echo "Znalezione liczby pierwsze: " . implode(", ", $liczbyPierwsze); [3, 4];
    // }
    // else
    //     echo "W tablicy nie ma liczb pierwszych.";
    
    // echo "<br>"; echo "<br>";
    // echo "<br>"; echo "<br>";
    // echo "<br>"; echo "<br>";
    // echo "<br>"; echo "<br>";

    // function obliczNWD($a, $b){
    // while ($b != 0) {
    //     $reszta = $a % $b;
    //     $a = $b;
    //     $b = $reszta;
    // }
    // return $a;
    // }

    // $min = 150; 
    // $max = 450;

    // if (isset($min) && isset($max)){
    // $nwd = obliczNWD($max, $min);
    //     echo "<h3> Wynik Zadania 6*: </h3>";
    //     echo "Dla znalezionych wartości min ". ($min) ." oraz max " .($max). ", ich NWD wynosi: <b>". $nwd ."</b>";
    // } 
    // else {
    //     echo "Nie znaleziono wartości min i max z poprzednich zadań.";
    // }
    
    // echo "<br>"; echo "<br>";
    // echo "<br>"; echo "<br>";
    // echo "<br>"; echo "<br>";
    
    $wiersze=5;
    $kolumny=5;
    for ($p=0; $p<$wiersze; $p++){
        for ($r =0; $r<$kolumny; $r++){
        $tab[$p][$r]= rand(100,999);
        echo '   '.$tab[$p][$r];
        }
    echo '<br>';
    }
    echo "<br>"; echo "<br>";
    echo "<br>"; echo "<br>";
    echo "<br>"; echo "<br>";
    
    $wiersze = 5;
    $kolumny = 5;
    $tablica = [];

    echo "<table style='border-collapse: collapse; border: 1px solid grey; color: grey;'>";

        echo "<tr><td></td>";
    for ($k = 1; $k <= $kolumny; $k++) {
    echo "<td style='border: 1px solid grey; padding: 10px; text-align: center;'><b>Kol $k</b></td>";
    }
    echo "</tr>";

    for ($i = 0; $i < $wiersze; $i++) {
        echo "<tr>";
    
        $numerWiersza = $i + 1;
        echo "<td style='border: 1px solid grey; padding: 10px;'><b>Wiersz $numerWiersza</b></td>";
    
    for ($j = 0; $j < $kolumny; $j++) {

        $liczba = rand(10, 99);
        $tablica[$i][$j] = $liczba;
        
        echo "<td style='border: 1px solid grey; padding: 10px; text-align: center;'>$liczba</td>";
    }
    echo "</tr>";
    }

    echo "</table>";

// $uczen1 = [
//     "imie" => "Jan",
//     "nazwisko" => "Kowalski",
//     "klasa" => "3A"
// ];

// $uczen2 = [
//     "imie" => "Anna",
//     "nazwisko" => "Nowak",
//     "klasa" => "2B"
// ];

// $uczen3 = [
//     "imie" => "Piotr",
//     "nazwisko" => "Wiśniewski",
//     "klasa" => "4C"
// ];

// $uczen4 = [
//     "imie" => "Maria",
//     "nazwisko" => "Wójcik",
//     "klasa" => "1A"
// ];

// $uczen5 = [
//     "imie" => "Krzysztof",
//     "nazwisko" => "Kamiński",
//     "klasa" => "3B"
// ];

// $uczen6 = [
//     "imie" => "Zofia",
//     "nazwisko" => "Lewandowska",
//     "klasa" => "2A"
// ];


// echo implode(" ",$uczen1).'<br>';
// echo implode(" ",$uczen2).'<br>';
// echo implode(" ",$uczen3).'<br>';
// echo implode(" ",$uczen4).'<br>';
// echo implode(" ",$uczen5).'<br>';
// echo implode(" ",$uczen6).'<br>';


// $uczen1 = ["imie" => "Jan", "nazwisko" => "Kowalski", "klasa" => "1a"];
// $uczen2 = ["imie" => "Anna", "nazwisko" => "Nowak", "klasa" => "1b"];
// $uczen3 = ["imie" => "Piotr", "nazwisko" => "Wiśniewski", "klasa" => "1a"];
// $uczen4 = ["imie" => "Maria", "nazwisko" => "Wójcik", "klasa" => "1b"];
// $uczen5 = ["imie" => "Krzysztof", "nazwisko" => "Kamiński", "klasa" => "1a"];
// $uczen6 = ["imie" => "Zofia", "nazwisko" => "Lewandowska", "klasa" => "2a"];

// $uczniowie = [$uczen1, $uczen2, $uczen3, $uczen4, $uczen5, $uczen6];

// echo "<h2>Uczniowie klasy 1a</h2>";
// echo "<ul>";
// foreach ($uczniowie as $osoba) {
//     if ($osoba['klasa'] == "1a") {
//         echo "<li>" . $osoba['imie'] . " " . $osoba['nazwisko'] . "</li>";
//     }
// }
// echo "</ul>";

// echo "<h2>Uczniowie klasy 1b</h2>";
// echo "<ul>";
// foreach ($uczniowie as $osoba) {
//     if ($osoba['klasa'] == "1b") {
//         echo "<li>" . $osoba['imie'] . " " . $osoba['nazwisko'] . "</li>";
//     }
// }
// echo "</ul>";

$uczen1 = ["imie" => "Jan", "nazwisko" => "Kowalski", "klasa" => "1a"];
$uczen2 = ["imie" => "Anna", "nazwisko" => "Nowak", "klasa" => "1b"];
$uczen3 = ["imie" => "Piotr", "nazwisko" => "Wiśniewski", "klasa" => "1a"];
$uczen4 = ["imie" => "Maria", "nazwisko" => "Wójcik", "klasa" => "1b"];
$uczen5 = ["imie" => "Krzysztof", "nazwisko" => "Kamiński", "klasa" => "1a"];
$uczen6 = ["imie" => "Zofia", "nazwisko" => "Lewandowska", "klasa" => "2a"];

$uczniowie = [$uczen1, $uczen2, $uczen3, $uczen4, $uczen5, $uczen6];

$uczniowie[] = ["imie" => "Marek", "nazwisko" => "Zieliński", "klasa" => "1c"];
$uczniowie[] = ["imie" => "Olga", "nazwisko" => "Woźniak", "klasa" => "1c"];
$uczniowie[] = ["imie" => "Adam", "nazwisko" => "Kaczmarek", "klasa" => "1c"];

echo "<style>
    body { line-height: 150%; }
    h3 { margin-bottom: 5px; }
    ul { margin-top: 0; }
</style>";

function wyswietlKlase($lista, $klasaT) {
    echo "<h3>Uczniowie klasy $klasaT</h3>";
    echo "<ul>";
    foreach ($lista as $osoba) {
        if ($osoba['klasa'] == $klasaT) {
            echo "<li>" . $osoba['imie'] . " " . $osoba['nazwisko'] . "</li>";
        }
    }
    echo "</ul>";
}

wyswietlKlase($uczniowie, "1a");
wyswietlKlase($uczniowie, "1b");
wyswietlKlase($uczniowie, "1c");
?>
</body>
</html>
