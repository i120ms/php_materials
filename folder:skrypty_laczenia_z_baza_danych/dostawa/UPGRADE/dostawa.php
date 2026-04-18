<?php
$idPolaczenia = mysqli_connect("localhost","root","","sklep");

// usuwanie
if ($idPolaczenia && isset($_GET['usun'])) {
    $id = (int)$_GET['usun'];
    mysqli_query($idPolaczenia, "DELETE FROM towary WHERE id=$id");
}
?>

<?php
$ileProduktow = 0;
$ileDostawcow = 0;

if ($idPolaczenia) {
    $r1 = mysqli_query($idPolaczenia, "SELECT COUNT(*) AS ile FROM towary");
    $ileProduktow = mysqli_fetch_assoc($r1)['ile'];

    $r2 = mysqli_query($idPolaczenia, "SELECT COUNT(*) AS ile FROM dostawcy");
    $ileDostawcow = mysqli_fetch_assoc($r2)['ile'];
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Dodaj Produkt</title>

<style>
body{font-family:Arial,sans-serif;background:#f4f4f9;display:flex;justify-content:center;padding:20px}
.form-container{background:#fff;padding:20px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,.1);width:100%;max-width:400px}
h2{color:#333;text-align:center}
.form-group{margin-bottom:15px}
label{display:block;margin-bottom:5px;font-weight:700;color:#555}
input[type=text],input[type=number],select{width:100%;padding:10px;border:1px solid #ddd;border-radius:4px;box-sizing:border-box}
.checkbox-group{display:flex;align-items:center;gap:10px}
.checkbox-group input{width:auto}
button{width:100%;padding:12px;background:#28a745;color:#fff;border:0;border-radius:4px;cursor:pointer;font-size:16px}
button:hover{background:#218838}
.wrapper{display:flex;gap:40px;align-items:flex-start}
.left{display:flex;flex-direction:column;gap:20px}
.right{background:#fff;padding:40px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,.1)}
table{border-collapse:collapse;width:100%}
td,th{border:1px solid #ddd;padding:8px}
a.btn{background:red;color:#fff;padding:4px 8px;text-decoration:none}
.counter{position:fixed;top:10px;right:20px;background:#fff;padding:10px 15px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,.1);font-weight:700}
</style>

</head>
<body>

<div class="wrapper">

<!-- LEWA STRONA -->
<div class="left">

<div class="form-container">
<h2>Nowy Dostawca</h2>
<form method="POST">
<div class="form-group">
<input type="text" name="nazwaD" placeholder="Nazwa" required>
</div>
<div class="form-group">
<input type="text" name="adres" placeholder="Adres" required>
</div>
<button name="dodajDostawce">Dodaj</button>
</form>
</div>

<div class="form-container">
<h2>Nowy Produkt</h2>
<form method="POST">

<div class="form-group">
<input type="text" name="nazwa" placeholder="Nazwa" required>
</div>

<div class="form-group">
<input type="number" name="cena" step="0.01" required>
</div>

<div class="form-group">
<select name="promocja">
<option value="0">Brak</option>
<option value="1">Tak</option>
</select>
</div>

<div class="form-group">
<select name="idDostawcy">
<?php
$r = mysqli_query($idPolaczenia,"SELECT id,nazwa FROM dostawcy");
while($w = mysqli_fetch_assoc($r)) {
    echo "<option value='{$w['id']}'>{$w['nazwa']}</option>";
}
?>
</select>
</div>

<button name="dodajProdukt">Dodaj produkt</button>
</form>
</div>

</div>

<!-- PRAWA STRONA -->
<div class="right">

<h2>Produkty</h2>
<br>
<table>
<tr>
<th>ID</th>
<th>Nazwa</th>
<th>Cena</th>
<th>Promo</th>
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

<div class="counter">
    Produkty: <?php echo $ileProduktow; ?> |
    Dostawcy: <?php echo $ileDostawcow; ?>
</div>

<?php
// dodawanie
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
