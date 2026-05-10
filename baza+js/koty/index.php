<?php
$conn = mysqli_connect('localhost', 'root', '', 'koty');
$sql = "SELECT * FROM kandydaci";
$wynik = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Nasze słodziaki</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="baner">
    <h1>Nasze słodziaki</h1>
</div>

<div id="container">

    <div id="lewy">
        <h3>Pupil roku</h3>

        <p>
            W naszym konkursie koty będą walczyć o tytuł 
            najpiękniejszego i najsłodszego. Zagłosuj na 
            swojego faworyta i wybierz "Pupila roku" 
            w naszym plebiscycie!
        </p>

        <img id="glowneZdjecie" src="koty.png" alt="">
        
        <div id="wynik"></div>
    </div>

    <div id="prawy">
        <h3>Kandydaci</h3>
        <p>Kliknij w zdjęcie aby zagłosować</p>

        <?php
        while($row = mysqli_fetch_array($wynik)){
            echo '
            <div class="box">

            <img 
            src="'.$row["zdjecie"].'"
            onclick="glosuj(
            \''.$row["imie"].'\',
            \''.$row["zdjecie"].'\'
            )">

            <h4>'.$row["imie"].'</h4>
            <p>Wiek: '.$row["wiek"].'</p>
            <button onclick="glosuj(
            \''.$row["imie"].'\',
            \''.$row["zdjecie"].'\'
            )">Głosuję</button>

            </div>
            ';
        }

        mysqli_close($conn);
        ?>
    </div>

</div>

<script src="script.js"></script>

</body>
</html>
