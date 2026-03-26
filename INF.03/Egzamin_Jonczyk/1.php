<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Kup dziś samochód!</h3>
    <img src="samochod.png">
    <?php
    // połowa punktów na egzaminie za samo $conn echo mysqli_close i echo "";
    // 3/4 za dodatkowo $query i $result
    $conn = mysqli_connect("localhost", "root", "", "auto");
    $query = "SELECT * FROM Samochody where marka = 'Toyota'";
    $result = mysqli_query($conn, $query);

    echo "<ul>";
    while($row = mysqli_fetch_array($result))
    echo "<li>".$row['marka']." ".$row[3].'</li>';
    echo "</ul>";
/*
    $row = mysqli_fetch_array($result);
    echo $row['marka']." ".$row[3].'<br>';

    $row = mysqli_fetch_array($result);
    echo $row['marka']." ".$row[3].'<br>';
*/

    mysql_close($conn);

    ?>
</body>
</html>
