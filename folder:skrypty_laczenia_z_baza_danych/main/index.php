<?php
// $idPolaczenia = mysqli_connect("localhost","root","","sklep2");

// if (!$idPolaczenia) {
//     die("Błąd połączenia z bazą: " . mysqli_connect_error());
// }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj Produkt</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; padding: 20px; }
        .form-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { color: #333; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="text"], input[type="number"], select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .checkbox-group { display: flex; align-items: center; gap: 10px; }
        .checkbox-group input { width: auto; }
        button { width: 100%; padding: 12px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>
<h2>Nowy Produkt</h2>

<form method="POST">
    Nazwa: <input type="text" name="nazwa" required><br><br>
    Cena: <input type="number" name="cena" step="0.01" required><br><br>

    Promocja:
    <select name="promocja">
        <option value="0">Nie</option>
        <option value="1">Tak</option>
    </select><br><br>

    Dostawca:
    <select name="idDostawcy">
        <?php
        $sql = "SELECT id, nazwa FROM dostawcy";
        $wynik = mysqli_query($idPolaczenia, $sql);

        while($row = mysqli_fetch_assoc($wynik)) {
            echo "<option value='{$row['id']}'>{$row['nazwa']}</option>";
        }
        ?>
    </select><br><br>

    <button type="submit">Dodaj</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $promocja = $_POST['promocja'];
    $idDostawcy = $_POST['idDostawcy'];

    // prepared statement (bezpieczne zapytanie)
    $stmt = mysqli_prepare($idPolaczenia,
        "INSERT INTO towary (nazwa, cena, promocja, idDostawcy) VALUES (?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param($stmt, "sdii", $nazwa, $cena, $promocja, $idDostawcy);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color:green;'>Produkt dodany poprawnie!</p>";
    } else {
        echo "<p style='color:red;'>Błąd: " . mysqli_error($idPolaczenia) . "</p>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($idPolaczenia);
?>

</body>
</html>
