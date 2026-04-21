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

    <div style="display: flex;">
        <aside>
            <img src="ma.jpg" alt="matura"><br>
            <img src="tu.jpg" alt="matura"><br>
            <img src="ra.jpg" alt="matura">
        </aside>

        <div style="width: 80%;">
            <section>
                <h3>Wybierz ucznia z listy:</h3>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "matura");

                // zapytanie 1
                $zapytanie1 = "SELECT id, imie, nazwisko FROM maturzysta WHERE szkola = 'T3' ORDER BY nazwisko ASC;";
                $wynik1 = mysqli_query($conn, $zapytanie1);
                while($wiersz = mysqli_fetch_array($wynik1)){
                    $id = $wiersz['id'];
                    $imie = $wiersz['imie'];
                    $nazwisko = $wiersz['nazwisko'];
                    echo "<a href=\"wynik.php?id=$id&imie=$imie&nazwisko=$nazwisko\">$id. $imie $nazwisko</a><br>";
                }
                mysqli_close($conn);
                ?>
            </section>

            <section>
                <div style="display: flex; flex-diraction: row;">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "matura");
                    
                    // PRZEDMIOTY - zapytanie 2
                    echo '<div class="blok">';
                    echo '<h4>Przedmioty</h4>';
                    $zapytanie2 = "SELECT DISTINCT przedmiot FROM arkusz";
                    $wynik2 = mysqli_query($conn, $zapytanie2);
                    while($wiersz = mysqli_fetch_array($wynik2)){
                        echo $wiersz['przedmiot'] . ' ';
                    }
                    echo '</div>';

                    // LATA - zapytanie 3
                    echo '<div class="blok">';
                    echo '<h4>Lata</h4>';
                    $zapytanie3 = "SELECT MIN(rok), MAX(rok) FROM arkusz";
                    $wynik3 = mysqli_query($conn, $zapytanie3);
                    $wiersz3 = mysqli_fetch_row($wynik3);
                    echo $wiersz3[0] . ' - ' . $wiersz3[1];
                    echo '</div>';

                    // NAJLEPSZY WYNIK - zapytanie 4
                    echo '<div class="blok">';
                    echo '<h4>Najlepszy wynik</h4>';
                    $zapytanie4 = "SELECT maturzysta_id, AVG(punkty) AS Wynik FROM wynik GROUP BY maturzysta_id ORDER BY Wynik DESC LIMIT 1";
                    $wynik4 = mysqli_query($conn, $zapytanie4);
                    $wiersz4 = mysqli_fetch_array($wynik4);
                    echo $wiersz4['Wynik'] . '%';
                    echo '</div>';

                    // NAJGORSZY WYNIK - zapytanie 5
                    echo '<div class="blok">';
                    echo '<h4>Najgorszy wynik</h4>';
                    $zapytanie5 = "SELECT maturzysta_id, AVG(punkty) AS Wynik FROM wynik GROUP BY maturzysta_id ORDER BY Wynik ASC LIMIT 1";
                    $wynik5 = mysqli_query($conn, $zapytanie5);
                    $wiersz5 = mysqli_fetch_array($wynik5);
                    echo $wiersz5['Wynik'] . '%';
                    echo '</div>';

                    mysqli_close($conn);
                    ?>
            </section>
        </div>
    </div> 
</body>
</html>
