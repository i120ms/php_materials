<?php
// Połączenie z bazą
$conn = mysqli_connect("localhost", "root", "", "przewozy");

// Obsługa formularza POST
if(isset($_POST['login'])){
    $login_input = $_POST['login'];
    $haslo_input = $_POST['haslo'];

    // Zapytanie pobierające wszystkich użytkowników (lub filtrujemy po loginie w SQL, 
    // ale dla przykładu "sprawdzania w while" pobierzmy dane i porównajmy w PHP)
    // Wersja 1: Pobieramy tylko tego, którego login pasuje (szybciej)
    $q_log = "SELECT id, login, haslo FROM uzytkownicy WHERE login='$login_input'";
    
    $result = mysqli_query($conn, $q_log);

    // Flagi do kontrolowania wyniku
    $zalogowano = false;

    // Pobieranie danych w pętli WHILE
    // mysqli_fetch_row zwraca tablicę indeksowaną: [0]=id, [1]=login, [2]=haslo
    while($row = mysqli_fetch_row($result)){
        $db_login = $row[1];
        $db_haslo = $row[2];

        // JAWNE SPRAWDZANIE wewnątrz pętli
        if($db_login == $login_input && $db_haslo == $haslo_input){
            $zalogowano = true;
            
            // Jeśli się zgadza, przekierowujemy i przerywamy
            header("Location: index.php");
            exit();
        }
    }

    // Jeśli pętla się skończyła i flaga nie została ustawiona
    if(!$zalogowano){
        $error = "Błędny login lub hasło!";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f2f5; }
        .login-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 300px; }
        h2 { text-align: center; color: #333; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .error { color: red; text-align: center; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Zaloguj się</h2>
    
    <?php if(isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="haslo" placeholder="Hasło" required>
        <button type="submit" name="login">Zaloguj</button>
    </form>
</div>

</body>
</html>