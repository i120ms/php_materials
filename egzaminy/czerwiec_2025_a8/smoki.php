<?php
    $conn = new mysqli("localhost", "root", "", "smoki");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Smoki</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h2>Poznaj smoki!</h2>
        </header>

        <nav>
            <section id="nav-baza" onclick="funkcjabaza()">Baza</section>
            <section id="nav-opisy" onclick="funkcjaopisy()">Opisy</section>
            <section id="nav-galeria" onclick="funkcjagaleria()">Galeria</section>
        </nav>

        <main>
            <section id="baza">
                <h3>Baza Smoków</h3>
                <form action="smoki.php" method="post">
                    <select name="baza" id="baza">
                        <?php
                            // Skrypt #1
                            $sql = "SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie";
                            if ($result = $conn->query($sql)) {
                                while ($row = $result->fetch_assoc()) {
                                    $pochodzenie = htmlspecialchars($row['pochodzenie']);
                                    echo "<option value=\"{$pochodzenie}\">{$pochodzenie}</option>";
                                }
                                $result->free();
                            }
                        ?>
                    </select>
                    <button type="submit">Szukaj</button>
                </form>
                <table>
                    <tr>
                        <th>Nazwa</th>
                        <th>Długość</th>
                        <th>Szerokość</th>
                    </tr>
                    <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['baza'])) {
                            $pochodzenie = $_POST['baza'];
                            if ($stmt = $conn->prepare("SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie = ?")) {
                                $stmt->bind_param("s", $pochodzenie);
                                if ($stmt->execute() && ($result = $stmt->get_result())) {
                                    while ($row = $result->fetch_assoc()) {
                                        $nazwa = htmlspecialchars($row['nazwa']);
                                        $dlugosc = htmlspecialchars($row['dlugosc']);
                                        $szerokosc = htmlspecialchars($row['szerokosc']);
                                        echo "<tr>";
                                            echo "<td>{$nazwa}</td>";
                                            echo "<td>{$dlugosc}</td>";
                                            echo "<td>{$szerokosc}</td>";
                                        echo "</tr>";
                                    }
                                    $result->free();
                                }
                                $stmt->close();
                            }
                        }
                    ?>
                </table>
            </section>

            <section id="opisy">
                <h3>Opisy smoków</h3>
                <dl>
                    <dt>Smok czerwony</dt>
                    <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>

                    <dt>Smok zielony</dt>
                    <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>

                    <dt>Smok niebieski</dt>
                    <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>
                </dl>
            </section>

            <section id="galeria">
                <h3>Galeria</h3>
                <img src="smok1.JPG" alt="Smok czerwony">
                <img src="smok2.JPG" alt="Smok wielki">
                <img src="smok3.JPG" alt="Skrzydlaty łaciaty">
            </section>
        </main>

        <footer>
            <p>MIBOMBO</p>
        </footer>
        <script src="main.js"></script>
    </body>
</html>

<?php
    $conn->close();
?>
