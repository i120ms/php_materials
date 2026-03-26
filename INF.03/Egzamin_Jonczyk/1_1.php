<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header><h3>Kup dziś samochód!</h3></header>
<section id="lewy">
   
    <img src="samochod.png" alt="samochod">
    <p><h4>Witamy w naszym komisie. Mamy szeroki wybór aut</h4></p>
</section>

<section id="srodek">
    <p><h2><br>Lista dostępnych samochodów</h2></p><br>
<?php
    $conn = mysqli_connect("localhost", "root", "", "auta");
    $query = "SELECT * FROM Samochody where marka = 'Toyota'";
    $result = mysqli_query($conn, $query);
    echo "<ul>";
    while($row = mysqli_fetch_array($result))
    echo "<li>".$row['marka']." ".$row[3].'</li>';
    echo "</ul>";
    mysqli_close($conn);
?>
</section>

<section id="prawy">
    <p><h2><br>Dziś polecamy Toyotę</h2></p><br>
<?php
    $conn = mysqli_connect("localhost", "root", "", "auta");
    $query = "SELECT * FROM Samochody where marka = 'Toyota'";
    $result = mysqli_query($conn, $query);
    echo "<ul>";
    while($row = mysqli_fetch_array($result))
    echo "<li>".$row['id']."&nbsp;/&nbsp;".$row['marka']." ".$row[3].'</li>';
    echo "</ul>";
    mysqli_close($conn);
?>
</section>

<footer><a href="kwerend.txt">zapytania</a> Autor: Igor Górski</footer>
</body>
</html>
