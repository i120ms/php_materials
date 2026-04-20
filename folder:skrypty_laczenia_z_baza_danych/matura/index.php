<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matura</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header><h1>System informacji dla maturzystów</h1></header>
    <aside>
        <img src="ma.jpg" alt="matura"><br>
        <img src="tu.jpg" alt="matura"><br>
        <img src="ra.jpg" alt="matura">
    </aside>
    <section>
        <h3>Wybierz ucznia z listy:</h3>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'matura');
        $zapytanie = "SELECT id, imie, nazwisko FROM maturzysta WHERE szkola='T3' ORDER BY nazwisko ASC;";
        $wynik = mysqli_query($conn, $zapytanie);

        while($row = mysqli_fetch_array($wynik)){
            echo "<a href='wynik.php?id=$row[id]&imie=$row[imie]&nazwisko=$row[nazwisko]'>";
            echo "$row[id]. $row[imie] $row[nazwisko]</a><br>";
        }
        mysqli_close($conn);
        ?>
    </section>
</body>
</html>
