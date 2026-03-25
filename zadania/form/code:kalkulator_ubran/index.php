<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Kalkulator ubrań</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="card">

<h2>Kalkulator zamówienia ubrań</h2>

<form method="POST">

<h3>Rodzaj ubrania</h3>

<label>
<input type="radio" name="ubranie" value="koszulka" required>
Koszulka (50 zł)
</label>

<label>
<input type="radio" name="ubranie" value="bluza">
Bluza (120 zł)
</label>

<label>
<input type="radio" name="ubranie" value="kurtka">
Kurtka (250 zł)
</label>

<h3>Rozmiar</h3>

<select name="rozmiar">
<option value="S">S</option>
<option value="M">M</option>
<option value="L">L (+10 zł)</option>
</select>

<h3>Liczba sztuk</h3>

<input type="number" name="ilosc" min="1" required>

<br><br>

<label>
<input type="checkbox" name="nadruk">
Personalizowany nadruk (+20 zł za sztukę)
</label>

<br><br>

<input type="submit" name="oblicz" value="Oblicz koszt">

</form>

<div class="wynik">

<?php

if(isset($_POST['oblicz'])){

    if(!isset($_POST['ubranie']) || $_POST['ilosc'] <= 0){
        echo "Podaj poprawne dane!";
        exit();
    }

    $ubranie = $_POST['ubranie'];
    $rozmiar = $_POST['rozmiar'];
    $ilosc = $_POST['ilosc'];

    if($ubranie == "koszulka"){
        $cena = 50;
        $nazwa = "Koszulka";
    }
    elseif($ubranie == "bluza"){
        $cena = 120;
        $nazwa = "Bluza";
    }
    else{
        $cena = 250;
        $nazwa = "Kurtka";
    }

    $dopRozmiar = 0;
    if($rozmiar == "L"){
        $dopRozmiar = 10;
    }

    $cenaZaSztuke = $cena + $dopRozmiar;

    $suma = $cenaZaSztuke * $ilosc;

    $dopNadruk = 0;
    if(isset($_POST['nadruk'])){
        $dopNadruk = 20 * $ilosc;
    }

    $suma = $suma + $dopNadruk;

    $rabat = 0;
    if($ilosc > 5){
        $rabat = $suma * 0.15;
    }

    $sumaKoncowa = $suma - $rabat;

    echo "<h3>Podsumowanie</h3>";

    echo "Ubranie: <b>$nazwa</b><br>";
    echo "Rozmiar: <b>$rozmiar</b><br>";
    echo "Liczba sztuk: <b>$ilosc</b><br>";
    echo "Cena za sztukę: $cena zł<br>";

    if($dopRozmiar > 0){
        echo "Dopłata za rozmiar L: +$dopRozmiar zł<br>";
    }

    if($dopNadruk > 0){
        echo "Dopłata za nadruk: +$dopNadruk zł<br>";
    }

    if($rabat > 0){
        echo "Rabat ilościowy: -$rabat zł<br>";
    }

    echo "<hr>";
    echo "<b>Suma do zapłaty: ".number_format($sumaKoncowa,2)." zł</b>";

}

?>

</div>

</div>

</body>
</html>
