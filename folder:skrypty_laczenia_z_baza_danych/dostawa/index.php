<?php
$idPolaczenia = mysqli_connect("localhost","root","","sklep");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Produkt</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; display: flex; flex-direction: column; align-items: center; padding: 20px; }
        .form-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px; margin-bottom: 20px;}
        h2 { color: #333; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>

<!-- ================= DODAWANIE DOSTAWCY ================= -->
<div class="form-container">
    <h2>Nowy Dostawca</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nazwa dostawcy:</label>
            <input type="text" name="nazwaD" required>
        </div>

        <div class="form-group">
            <label>Adres:</label>
            <input type="text" name="adres" required>
        </div>

        <button type="submit" name="dodajDostawce">Dodaj dostawcę</button>
    </form>
</div>

<!-- ================= DODAWANIE PRODUKTU ================= -->
<div class="form-container">
    <h2>Nowy Produkt</h2>
    <form method="POST">
        
        <div class="form-group">
            <label>Nazwa przedmiotu:</label>
            <input type="text" name="nazwa" required>
        </div>

        <div class="form-group">
            <label>Cena (zł):</label>
            <input type="number" name="cena" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label>Promocja:</label>
            <select name="promocja">
                <option value="0">Brak (0)</option>
                <option value="1">Aktywna (1)</option>
            </select>
        </div>

        <div class="form-group">
            <label>Dostawca:</label>
            <select name="idDostawcy" required>
                <?php
                if ($idPolaczenia) {
                    $zapytanieDostawcy = "SELECT id, nazwa FROM dostawcy";
                    $wynikDostawcy = mysqli_query($idPolaczenia, $zapytanieDostawcy);

                    while ($wiersz = mysqli_fetch_assoc($wynikDostawcy)) {
                        echo "<option value='{$wiersz['id']}'>{$wiersz['nazwa']}</option>";
                    }
                }
                ?>
            </select>
        </div>

        <button type="submit" name="dodajProdukt">Zapisz produkt</button>
    </form>
</div>

<?php
// ================= DODAWANIE DOSTAWCY =================
if ($idPolaczenia && isset($_POST['dodajDostawce'])) {
    $nazwaD = $_POST['nazwaD'];
    $adres = $_POST['adres'];

    $zapytanieD = "INSERT INTO dostawcy (nazwa, adres)
                   VALUES ('$nazwaD', '$adres')";

    if (mysqli_query($idPolaczenia, $zapytanieD)) {
        echo "Dodano dostawcę!<br>";
    } else {
        echo "Błąd dodawania dostawcy<br>";
    }
}

// ================= DODAWANIE PRODUKTU =================
if ($idPolaczenia && isset($_POST['dodajProdukt'])) {
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $promocja = $_POST['promocja'];
    $idDostawcy = $_POST['idDostawcy'];

    $zapytanie = "INSERT INTO towary (nazwa, cena, promocja, idDostawcy) 
                  VALUES ('$nazwa','$cena','$promocja','$idDostawcy')";

    if (mysqli_query($idPolaczenia, $zapytanie)) {
        echo "Dodano produkt!";
    } else {
        echo "Błąd dodawania produktu";
    }
}

if ($idPolaczenia) {
    mysqli_close($idPolaczenia);
}
?>

</body>
</html>
