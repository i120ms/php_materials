<?php
// Połączenie z bazą
$conn = mysqli_connect("localhost", "root", "", "przewozy");

// Obsługa formularza POST
if(isset($_POST['zarejestruj'])){
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $email = $_POST['email']; // Opcjonalne, jeśli masz takie pole

    // Prosta walidacja (czy pola nie są puste)
    if(!empty($login) && !empty($haslo)){
        
        // Zapytanie INSERT z bezpośrednim wstawieniem zmiennych (NIEBEZPIECZNE!)
        // Zakładam, że tabela nazywa się 'uzytkownicy' i ma kolumny: login, haslo, email
        // Pole 'id' pomijamy, jeśli jest AUTO_INCREMENT
        $q_dodaj = "INSERT INTO uzytkownicy (login, haslo, email) VALUES ('$login', '$haslo', '$email')";
        
        // Wykonanie zapytania
        $result = mysqli_query($conn, $q_dodaj);

        // Sprawdzenie czy zapytanie się powiodło
        if($result){
            // Sukces - przekierowanie do logowania
            header("Location: login.php");
            exit();
        } else {
            // Błąd SQL (np. taki sam login już istnieje)
            // mysqli_error($conn) zwraca opis błędu
            $error = "Błąd podczas tworzenia konta: " . mysqli_error($conn);
        }
    } else {
        $error = "Podaj login i hasło!";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f2f5; }
        .reg-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 300px; }
        h2 { text-align: center; color: #333; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #218838; }
        .error { color: red; text-align: center; margin-bottom: 15px; }
        .link { text-align: center; margin-top: 15px; font-size: 14px; }
        .link a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>

<div class="reg-box">
    <h2>Utwórz konto</h2>
    
    <?php if(isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="haslo" placeholder="Hasło" required>
        <input type="email" name="email" placeholder="Email (opcjonalnie)">
        <button type="submit" name="zarejestruj">Zarejestruj się</button>
    </form>

    <div class="link">
        Masz już konto? <a href="login.php">Zaloguj się</a>
    </div>
</div>

</body>
</html>