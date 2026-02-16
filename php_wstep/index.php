<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Zwierzęta:</h1>
    Ala ma kota
    <br>
<?php
    echo "Hello World";
    echo "<br>";
    echo '<h1>Do widzenia</h1>';
    
    $c=7;
    function f2(){
        $d=5;
    }
    f2();
    echo $c;
    echo $d;

?>

Skrypt 1:
<?php
    $a=7;
    echo $a;
?>
<br> Skrypt 2:
<?php
    $b = 5;
    echo $b;
    echo $a;

    echo "<br>";
    echo "<br>";


    $g = 7;
    echo 'Wartośc a przed funkcją: '.$g."<br>";
    function f3(){
        global $g;
        $g++;
    }
    f3();
    echo 'Wartośc a po funkcji: '.$g."<br>";

    define("PI3", 3.14);
    function f4(){
        echo PI3;
        define ("PI2", 6.28);
    }
    f4();
    echo "<br>";
    echo PI2;

    
    

    define("PI", 3.14);
    echo "<br>";
    $r = 10;
    $x;
    $y;
    echo "<br>";
    echo "Pole:";
    function pole(){
        global $x;
        global $r;
        $x = $r * $r;
    }
    pole();
    echo $x;
    echo "<br>";
    echo "Obwód:";
    function obwod(){
        global $y;
        global $r; 
        $y = $r * 4;
    }
    obwod();
    echo $y;
?>
</body>
</html>
