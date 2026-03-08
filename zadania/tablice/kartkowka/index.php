<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $tablica = [];
    
    for($i=0; $i<10; $i++){
        $tablica[$i] = rand(100, 999);
    }

    echo "<table>";
    $index = 0;
    for($i=0; $i<2; $i++){
        echo "<tr>";
        for($j=0; $j<5; $j++){
            echo "<td>".$tablica[$index]."</td>";
            $index++;
        }
        echo "</tr>";
    }
    echo "</table>";



    $min = $tablica[0];
    $max = $tablica[0];
    
    foreach($tablica as $liczba){
        if($liczba<$min){
            $min=$liczba;
        }
        if($liczba>$max){
            $max=$liczba;
        }
    }

    echo "<p>Najm: $min</p>";
    echo "<p>Najw: $max</p>";



    $slowa = [
        "jeden", "dwa", "trzy",
        "cztery", "pięć", "sześć",
        "siedem", "osiem", "dziewięć", "dziesięć"
    ];
    $tablica_asoc = [];

    for($i=0; $i<10; $i++){
        $tablica_asoc[$slowa[$i]]=$tablica[$i];
    }

    echo "<pre>";
    print_r($tablica_asoc);
    echo "</pre>";
    ?>
</body>
</html>
