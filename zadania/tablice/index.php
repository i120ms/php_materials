<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "zad1: <br>";

        $tab1 = array("pon", "wt");
        echo "Tablica 1: ".implode(", ",$tab1)."<br>";
        $tab2 = [10, 25];
        echo "Tablica 2: ".implode(", ",$tab2)."<br>";

        $tab3[0] = 3.14;
        $tab3[1] = 2.71;
        echo "Tablica 3: ".implode(", ",$tab3)."<br>";
    ?><br><br>


    <?php
    echo "zad2: <br>";

        $napis = "Programuje w języku PHP";
        $tab4 = explode(" ",$napis);

    // na odwrót
        for($i = count($tab4) - 1; $i>=0; $i--){
            echo $tab4[$i]." ";
        }
    ?><br><br>


    <?php
    echo "zad3: <br>";

        echo "mi bombo: ".getrandmax();
    ?><br><br>


    <?php
    echo "zad4: <br>";

        $liczby = [];
        $suma = 0;

        for($i = 0; $i < 10; $i++){
            $liczby[$i] = rand(100,999);
            $suma += $liczby[$i];
    }

        $min = min($liczby);
        $max = max($liczby);
        $srednia = $suma / count($liczby);

        echo "tablica: ".implode(", ",$liczby)."<br>";
        echo "najmniejsza: $min <br>";
        echo "największa: $max <br>";
        echo "srednia: $srednia";
    ?>
    
</body>
</html>
