<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="liczba1">
        <input type="number" name="liczba2">
        <input type="submit" value="policz">
    </form>

    <?php
    if(isset($_POST['liczba1'], $_POST['liczba2'])){
        $liczba1 = $_POST['liczba1'];
        $liczba2 = $_POST['liczba2'];

        echo 'Wyniki dzialan na liczbach '.$liczba1.' i '.$liczba2.' :<br>';
        echo 'Suma: '.($liczba1+$liczba2).'<br>';
        echo 'Różnica: '.($liczba1-$liczba2).'<br>';
    }
    ?>
</body>
</html>
