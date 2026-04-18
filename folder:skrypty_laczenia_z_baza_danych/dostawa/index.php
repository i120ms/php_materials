<!-- D:\XAMPP\htdocs - TUTAJ PRZEKOPIUJ FOLDER Z PLIKAMI -->

<?php
// Połączenie z bazą danych
$idPolaczenia = mysqli_connect("localhost", "root", "", "sklep");

if (!$idPolaczenia) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

// Obsługa usuwania dostawcy
if (isset($_GET['usun_dostawce'])) {
    $id = intval($_GET['usun_dostawce']);
    // Najpierw usuń powiązane produkty (klucz obcy), aby uniknąć błędów
    $sql_usun_produkty = "DELETE FROM towary WHERE idDostawcy = $id";
    mysqli_query($idPolaczenia, $sql_usun_produkty);
    
    $sql_usun_dostawce = "DELETE FROM dostawcy WHERE id = $id";
    if (mysqli_query($idPolaczenia, $sql_usun_dostawce)) {
        echo "<p style='color:green;'>Usunięto dostawcę i powiązane produkty.</p>";
    } else {
        echo "<p style='color:red;'>Błąd usuwania dostawcy: " . mysqli_error($idPolaczenia) . "</p>";
    }
}

// Obsługa usuwania produktu
if (isset($_GET['usun_produkt'])) {
    $id = intval($_GET['usun_produkt']);
    $sql_usun = "DELETE FROM towary WHERE id = $id";
    if (mysqli_query($idPolaczenia, $sql_usun)) {
        echo "<p style='color:green;'>Usunięto produkt.</p>";
    } else {
        echo "<p style='color:red;'>Błąd usuwania produktu: " . mysqli_error($idPolaczenia) . "</p>";
    }
}

// Obsługa dodawania dostawcy
if (isset($_POST['dodajDostawce'])) {
    $nazwaD = mysqli_real_escape_string($idPolaczenia, $_POST['nazwaD']);
    $adres = mysqli_real_escape_string($idPolaczenia, $_POST['adres']);

    $zapytanieD = "INSERT INTO dostawcy (nazwa, adres) VALUES ('$nazwaD', '$adres')";
    if (mysqli_query($idPolaczenia, $zapytanieD)) {
        echo "<p style='color:green;'>Dodano dostawcę!</p>";
    } else {
        echo "<p style='color:red;'>Błąd dodawania dostawcy: " . mysqli_error($idPolaczenia) . "</p>";
    }
}

// Obsługa dodawania produktu
if (isset($_POST['dodajProdukt'])) {
    $nazwa = mysqli_real_escape_string($idPolaczenia, $_POST['nazwa']);
    $cena = floatval($_POST['cena']);
    $promocja = intval($_POST['promocja']);
    $idDostawcy = intval($_POST['idDostawcy']);

    $zapytanie = "INSERT INTO towary (nazwa, cena, promocja, idDostawcy) 
                  VALUES ('$nazwa', '$cena', '$promocja', '$idDostawcy')";
    if (mysqli_query($idPolaczenia, $zapytanie)) {
        echo "<p style='color:green;'>Dodano produkt!</p>";
    } else {
        echo "<p style='color:red;'>Błąd dodawania produktu: " . mysqli_error($idPolaczenia) . "</p>";
    }
}
?>

<?php require 'actions.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Sklep</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <!-- FORMULARZE -->
    <div class="forms-section">
        <?php if(isset($_GET['msg'])) echo "<div class='msg'>".$_GET['msg']."</div>"; ?>
        
        <h2>Dostawca</h2>
        <form method="post"><div class="form-group"><label>Nazwa</label><input name="nazwaD" required></div>
        <div class="form-group"><label>Adres</label><input name="adres" required></div>
        <button name="add_d">Dodaj</button></form>

        <h2>Produkt</h2>
        <form method="post"><div class="form-group"><label>Nazwa</label><input name="nazwa" required></div>
        <div class="form-group"><label>Cena</label><input type="number" name="cena" step="0.01" required></div>
        <div class="form-group"><label>Promocja</label><select name="promocja"><option value="0">Nie</option><option value="1">Tak</option></select></div>
        <div class="form-group"><label>Dostawca</label><select name="idDostawcy" required>
            <?php $r=mysqli_query($conn,"SELECT id,nazwa FROM dostawcy"); while($w=mysqli_fetch_assoc($r)) echo "<option value='{$w['id']}'>{$w['nazwa']}</option>"; ?>
        </select></div>
        <button name="add_p">Dodaj</button></form>
    </div>

    <!-- TABELE -->
    <div class="tables-section">
        <h2>Dostawcy</h2>
        <table><tr><th>ID</th><th>Nazwa</th><th>Adres</th><th>Akcja</th></tr>
        <?php $r=mysqli_query($conn,"SELECT * FROM dostawcy"); while($w=mysqli_fetch_assoc($r)) echo "<tr><td>{$w['id']}</td><td>{$w['nazwa']}</td><td>{$w['adres']}</td><td><a href='?del_d={$w['id']}' class='btn-del' onclick='return confirm(\"Usunąć?\")'>Usuń</a></td></tr>"; ?>
        </table>

        <h2>Produkty</h2>
        <table><tr><th>ID</th><th>Nazwa</th><th>Cena</th><th>Promo</th><th>Dostawca</th><th>Akcja</th></tr>
        <?php $r=mysqli_query($conn,"SELECT t.*,d.nazwa dn FROM towary t LEFT JOIN dostawcy d ON t.idDostawcy=d.id"); while($w=mysqli_fetch_assoc($r)) echo "<tr><td>{$w['id']}</td><td>{$w['nazwa']}</td><td>{$w['cena']}</td><td>".($w['promocja']?'Tak':'Nie')."</td><td>{$w['dn']}</td><td><a href='?del_p={$w['id']}' class='btn-del' onclick='return confirm(\"Usunąć?\")'>Usuń</a></td></tr>"; ?>
        </table>
    </div>
</div>
</body>
</html>
