<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<div class="form-container">
    <h2>Nowy Produkt</h2>
    <form action="" method="POST">
        
        <div class="form-group">
            <label for="nazwa">Nazwa przedmiotu:</label>
            <input type="text" id="nazwa" name="nazwa" placeholder="np. Cyrkiel" required>
        </div>

        <div class="form-group">
            <label for="cena">Cena (zł):</label>
            <input type="number" id="cena" name="cena" step="0.01" min="0" placeholder="0.00" required>
        </div>

        <div class="form-group">
            <label for="promocja">Promocja:</label>
            <select id="promocja" name="promocja">
                <option value="0">Brak (0)</option>
                <option value="1">Aktywna (1)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="idDostawcy">ID Dostawcy:</label>
            <input type="number" id="idDostawcy" name="idDostawcy" min="1" required>
        </div>

        <button type="submit">Zapisz produkt w bazie</button>
    </form>
<?php
$polaczenie = mysqli_connect('localhost', 'root','', 'sklep');

if($polaczenie && isset($_POST['nazwa'],$_POST['cena'],$_POST['promocja'],$_POST['idDostawcy'])){
    $zapytanie = "INSERT INTO towary(nazwa, cena, promocja, idDostawcy) VALUES ('{$_POST['nazwa']}', '{$_POST['cena']}', '{$_POST['promocja']}', '{$_POST['idDostawcy']}')";
    $wynik = mysqli_query($polaczenie, $zapytanie);
    header("location:zadanie.php");
    exit;
    if($wynik){
    echo "Dodano produkt!";
    } 
    else{
        echo "Coś poszło nie tak...";
    }
}

if ($polaczenie){
        $wynikzapytania = mysqli_query($polaczenie, "SELECT COUNT(*) FROM towary");
        $ile = mysqli_fetch_row($wynikzapytania);
        echo $ile[0];
} 
mysqli_close($polaczenie);
?>
</div>
</body>
</html>
