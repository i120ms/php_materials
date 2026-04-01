<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia szkolna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hurtownia z najlepszymi cenami</h1>
    </header>
    <div class="lewy">
        <h2>Nasze ceny</h2>
        <table>
            <?php
            if ($connect=mysqli_connect ("localhost", "root", "", "sklep")){
                if($result=mysqli_query($connect,
                "SELECT nazwa, cena FROM towary LIMIT 4")){
                $ile = mysqli_num_rows($result);
                for ($i=0; $i<$ile; $i++){
                    $product = mysqli_fetch_row($result);
                    $td1 = $product[0];
                    $td2 = $product[1];
                    echo "<tr>";
                    echo "<td>$td1</td>";
                    echo "<td>$td2</td>";
                    echo "</tr>";
                }
                }
            }
            mysqli_close($connect);
            ?>
        </table>
    </div>
    <div class="srodek">
        <form method="POST">
        <h2>Koszt zakupów</h2>
        <label for="produkt">wybierz artykuł: </label>
        <select id="produkt" name="produkt">
            <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
            <option value="Zeszyt 32 kartek">Zeszyt 32 kartki</option>
            <option value="Cyrkiel">Cyrkiel</option>
            <option value="Linijka 30 cm">Linijka 30 cm</option>
        </select><br>
        <label for="liczba">liczba sztuk: </label>
        <input type="number" id="liczba" name="liczba"><br>
        <button type="submit">OBLICZ</button><br>
        </form>
        <?php
        if (isset($_POST["produkt"], $_POST["liczba"])){
        
            $produkt = $_POST["produkt"];
            switch ($produkt){
                case "Zeszyt 60 kartek":
                    $ileProdukt = 4.5;
                    break;
                case "Zeszyt 32 kartek":
                    $ileProdukt = 1.2;
                    break;
                case "Cyrkiel":
                    $ileProdukt = 12.4;
                    break;
                case "Linijka 30 cm":
                    $ileProdukt = 7.2;
                    break;
            }
   
            $ile = $_POST["liczba"];
            $wynik = $ileProdukt*$ile;
            echo "wartość zakupów: $wynik";
        }
        ?>

    </div>
    <div class="prawy">
        <h2>Kontakt</h2>
        <img src="zakupy.png" alt="hurtownia">
        <p>e-mail: <a href="">hurt@poczta2.pl</a></p>
    </div>
    <footer>
        <h4>Witrynę wykonała SIGMA</h4>
    </footer>
</body>
</html>