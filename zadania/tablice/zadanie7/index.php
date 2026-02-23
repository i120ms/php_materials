<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tablice dwuwymiarowe - Zadanie</h1>
    <h3>Wylosowane liczby</h3>

    <table>
        <tr>
            <th></th>
            <th>Kol1</th>
            <th>Kol2</th>
            <th>Kol3</th>
            <th>Kol4</th>
            <th>Kol5</th>
        </tr>

        <?php
        $iloscW = 5;
            for($i=0; $i<$iloscW; $i++){
                echo "<tr>";
                    echo "<th>";
                    echo "Wiersz";
                    echo $i+1;
                    echo "</th>";

            for($j=0; $j<5;$j++){
                    $tab[$i][$j] = rand(10,99);
                    echo "<td>";
                        echo $tab[$i][$j];
                    echo "</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
