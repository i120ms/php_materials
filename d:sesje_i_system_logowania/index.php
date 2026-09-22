<?php
session_start();
$polaczenie = mysqli_connect("localhost", "root", "", "skorex");

if(isset($_POST['zaloguj'])){
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $zapytanie = "SELECT id FROM logowanie WHERE login='$login' AND haslo='$haslo'";
    $wynik = mysqli_query($polaczenie, $zapytanie);

    if(mysqli_num_rows($wynik) > 0){
        $wiersz = mysqli_fetch_assoc($wynik);
        $_SESSION['zalogowany'] = true;
        $_SESSION['id_logowania'] = $wiersz['id'];
        $_SESSION['login'] = $login;
    }else{
        $komunikat = "Błędny login / hasło";
    }
}


if(isset($_GET['wyloguj'])){
    $_SESSION = [];
    session_destroy();
    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Skorex</h1>
        <nav>
            <a href="index.php">Strona Główna</a>
            <?php
            if(isset($_SESSION['zalogowany'])){
                echo '<a href="index.php?wyloguj=1">Wylogowanie</a>';
            }else{
                echo '<a href="index.php?logowanie=1">Logowanie</a>';
            }
            ?>
        </nav>
    </header>

    <main>
        <?php
        if(isset($_SESSION['zalogowany'])){
            $id_logowania = $_SESSION['id_logowania'];

            $zapytanie = "SELECT imie, nazwisko FROM klient WHERE id_logowania='$id_logowania'";
            $wynik = mysqli_query($polaczenie, $zapytanie);

            if(mysqli_num_rows($wynik) > 0){
                $klient = mysqli_fetch_assoc($wynik);

                echo "<section>";
                echo "<h2>Witaj, " . $klient['imie'] . " " . $klient['nazwisko'] . "</h2>";
                echo "<p>Jesteś zalogowany jako: " . $_SESSION['login'] . "</p>";
                echo "</section>";
            }
        }
        ?>
    </main>
</body>
</html>