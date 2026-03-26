<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // połowa punktów na egzaminie za samo $conn echo mysqli_close i echo "";
    // 3/4 za dodatkowo $query i $result
    $conn = mysqli_connect("localhost", "root", "", "auto");
    $query = "SELECT * FROM Samochody where marka = 'Toyota'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    echo $row[marka]." ".$row[3];

    mysql_close($conn);

    ?>
</body>
</html>
