<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma Przewozowa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header><h1>Firma przewozowa Półdarmo</h1></header>

    <nav>
        <a href="#">kwerenda1</a>
        <a href="#">kwerenda2</a>
        <a href="#">kwerenda3</a>
        <a href="#">kwerenda4</a>
    </nav>

    <main>
        <section id="lewy">
            <h2>Zadania do wykonania</h2>
            <table>
                <tr>
                    <th>Zadania do wykonania</th>
                    <th>Data realizacji</th>
                    <th>Akcja</th>
                </tr>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "przewozy");

                if(isset($_GET['usun'])){
                    $id_usun = $_GET['usun'];
                    $kw3_usun = "DELETE FROM zadania WHERE id_zadania = $id_usun;";
                    mysqli_query($conn, $kw3_usun);
                }

                if(isset($_POST['dodaj'])){
                    $zadanie = $_POST['zadanie'];
                    $data = $_POST['data'];
                    $kw2_dodaj = "INSERT INTO zadania (zadanie, data, osoba_id) VALUES ('$zadanie', '$data', 1);";
                    mysqli_query($conn, $kw2_dodaj);
                }

                $kw1 = "SELECT id_zadania, zadanie, data FROM zadania;";
                $result = mysqli_query($conn, $kw1);
                while($row = mysqli_fetch_row($result)){
                    echo "<tr>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td><a href='przewozy.php?usun=$row[0]'>Usuń</a></td>
                    </tr>";
                }
                ?>

            </table>
            <form action="przewozy.php" method="POST">
                <label>Zadanie do wykonania <input type="text" name="zadanie"></label><br>
                <label>Data realizacji <input type="date" name="data"></label>
                <button type="submit" name="dodaj">Dodaj</button>
            </form>
        </section>

        <section id="prawy">

        <!-- auto1.jpg w gimpie zamienić na auto1.png bo przeźroczystość nie działa na jpg -->

            <img src="auto1.png" alt="auto firmowe">
            <h3>Nasza specjalność</h3>
            <ul>
                <li>Przeprowadzki</li>
                <li>Przewóz mebli</li>
                <li>Przesyłki gabarytowe</li>
                <li>Wynajem pojazdów</li>
                <li>Zakupy towarów</li>
            </ul>
        </section>
        <footer><a>Stronę wykonał: MI BOMBO</a></footer>
    </main>

    <?php
    mysqli_close($conn);
    ?>

</body>
</html>
