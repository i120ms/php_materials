<?php
// Połączenie z bazą
$conn = mysqli_connect("localhost", "root", "", "galeria");

// Sprawdzenie połączenia
if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

// Usuwanie
if (isset($_GET['usun'])) {
    $id = (int)$_GET['usun'];
    mysqli_query($conn, "DELETE FROM obrazy WHERE id=$id");
    header("Location: index.php");
    exit();
}

// Pobieranie danych
$sql = "SELECT * FROM obrazy";
$wynik = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Galeria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Galeria obrazów</h2>

<table>
    <tr>
        <th>Miniaturka</th>
        <th>Tytuł</th>
        <th>Autor</th>
        <th>Cena</th>
        <th>Akcja</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($wynik)) { ?>
    <tr>
        <td>
            <img src="img/<?php echo $row['miniaturka']; ?>" width="80">
        </td>
        <td><?php echo $row['tytul']; ?></td>
        <td><?php echo $row['autor']; ?></td>
        <td><?php echo $row['cena']; ?> zł</td>
        <td>
            <a href="?usun=<?php echo $row['id']; ?>" onclick="return confirm('Na pewno usunąć?')">
                Usuń
            </a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>