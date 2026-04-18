<?php
$idPolaczenia = mysqli_connect("localhost","root","","sklep");

// 🔴 USUWANIE PRODUKTU
if ($idPolaczenia && isset($_GET['usun'])) {
    $id = (int)$_GET['usun'];
    mysqli_query($idPolaczenia, "DELETE FROM towary WHERE id=$id");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Dodaj Produkt</title>

<style>
body { font-family: Arial; background:#f4f4f9; }

.main {
    display:flex; /* 🔴 układ lewo/prawo */
    gap:40px;
    align-items:flex-start;
}

.left { width:400px; }
.right { flex:1; }

.form-container {
    background:white;
    padding:20px;
    border-radius:8px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
    margin-bottom:20px;
}

table {
    width:100%;
    border-collapse:collapse;
    background:white;
}

td, th {
    border:1px solid #ccc;
    padding:8px;
    text-align:left;
}

a.btn {
    color:white;
    background:red;
    padding:4px 8px;
    text-decoration:none;
}
</style>

</head>
<body>

<div class="main">

<!-- ================= LEWA STRONA ================= -->
<div class="left">

<div class="form-container">
<h2>Nowy Dostawca</h2>
<form method="POST">
<input name="nazwaD" placeholder="Nazwa" required>
<input name="adres" placeholder="Adres" required>
<button name="dodajDostawce">Dodaj</button>
</form>
</div>

<div class="form-container">
<h2>Nowy Produkt</h2>
<form method="POST">

<input name="nazwa" placeholder="Nazwa" required>
<input type="number" name="cena" step="0.01" required>

<select name="promocja">
<option value="0">Brak</option>
<option value="1">Tak</option>
</select>

<select name="idDostawcy">
<?php
$r = mysqli_query($idPolaczenia,"SELECT id,nazwa FROM dostawcy");
while($w = mysqli_fetch_assoc($r)) {
    echo "<option value='{$w['id']}'>{$w['nazwa']}</option>";
}
?>
</select>

<button name="dodajProdukt">Dodaj produkt</button>
</form>
</div>

</div>

<!-- ================= PRAWA STRONA (TABELA) ================= -->
<div class="right">

<h2>Produkty</h2>

<table>
<tr>
<th>ID</th>
<th>Nazwa</th>
<th>Cena</th>
<th>Promocja</th>
<th>Dostawca</th>
<th>Akcja</th>
</tr>

<?php
$r = mysqli_query($idPolaczenia,"
    SELECT t.*, d.nazwa AS dostawca
    FROM towary t
    LEFT JOIN dostawcy d ON t.idDostawcy = d.id
");

while($w = mysqli_fetch_assoc($r)) {
    echo "<tr>
        <td>{$w['id']}</td>
        <td>{$w['nazwa']}</td>
        <td>{$w['cena']}</td>
        <td>".($w['promocja'] ? 'Tak' : 'Nie')."</td>
        <td>{$w['dostawca']}</td>
        <td><a class='btn' href='?usun={$w['id']}'>Usuń</a></td>
    </tr>";
}
?>

</table>

</div>

</div>

<?php
// ================= DODAWANIE =================
if ($idPolaczenia && isset($_POST['dodajDostawce'])) {
    mysqli_query($idPolaczenia,"INSERT INTO dostawcy (nazwa,adres)
    VALUES ('{$_POST['nazwaD']}','{$_POST['adres']}')");
}

if ($idPolaczenia && isset($_POST['dodajProdukt'])) {
    mysqli_query($idPolaczenia,"INSERT INTO towary (nazwa,cena,promocja,idDostawcy)
    VALUES ('{$_POST['nazwa']}','{$_POST['cena']}','{$_POST['promocja']}','{$_POST['idDostawcy']}')");
}

mysqli_close($idPolaczenia);
?>

</body>
</html>
