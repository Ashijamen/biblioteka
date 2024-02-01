<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <style>
        /* Nowoczesny styl CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="date"],
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 10px;
            width: calc(100% - 22px); /* Szerokość minus padding */
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            display: block;
            text-align: center;
            color: #333;
            text-decoration: none;
            margin-top: 20px;
        }


        .select-wrapper {
            text-align: center;
            margin-bottom: 20px;
        }

        .select-wrapper select {
            margin: 0 auto; /* Dodane tutaj */
            display: block; /* Dodane tutaj */
        }

        .delete-button {
            font-size: 12px; /* Zmniejszenie rozmiaru czcionki */
            padding: 6px 12px; /* Dopasowanie paddingu przycisku */
            text-align: center; /* Wyśrodkowanie tekstu */
            width: 100px; /* Ustalenie szerokości przycisku */
            margin: 0 auto; /* Wyśrodkowanie przycisku w kolumnie */
            display: block; /* Ustawienie jako blokowy element */
            margin-top: 3px; /* Przesunięcie o 3 piksele w dół */
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Dodaj wypożyczenie</h1>
        <div class="message">
            <?php
            if (isset($_POST['wypoz'])) {
                $id_book = $_POST['id_book'];
                $id_user = $_POST['id_user'];
                $date_wyp = $_POST['date_wyp'];
                $date_odd = $_POST['date_odd'];
                $conn = new mysqli("localhost", "root", "", "biblioteka");
                $sql = "INSERT INTO bibl_wyp (id_wyp, id_book, id_user, date_wyp, date_odd) VALUES (NULL, '$id_book', '$id_user', '$date_wyp', '$date_odd')";
                $result = mysqli_query($conn, $sql);
                echo "Dodano Wypożyczenie";
            }
            ?>
        </div>
        <form action="insertWyp.php" method="POST">
            <div class="select-wrapper">
                <select name="id_book">
                    <option value="" selected disabled>Wybierz książkę</option>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "biblioteka");
                    $sql = "SELECT * FROM bibl_autor, bibl_book, bibl_tytul WHERE bibl_book.id_autor=bibl_autor.id_autor AND bibl_book.id_tytul=bibl_tytul.id_tytul ";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id_book'] . '">' . $row['id_book'] . ' ' . $row['tytul'] . ' ' . $row['autor'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <input type="text" name="id_user" placeholder="ID użytkownika">
            <input type="date" name="date_wyp" id="date_wyp" placeholder="Data wypożyczenia">
            <input type="date" name="date_odd" id="date_odd" placeholder="Data oddania">
            <input type="hidden" name="wypoz" value="true">
            <input type="submit" value="Dodaj wypożyczenie">
        </form>
        <a href="index.php">WRÓĆ</a>
    </div>

    <div class="container">
        <h2>Wypożyczenia</h2>
        <table>
            <tr>
                <th>id_wyp</th>
                <th>data wypoż</th>
                <th>data odd</th>
                
                <th>nazwisko</th>
                <th>tytuł</th>
                <th>autor</th>
                <th>wypoż</th>
                <th>Usuń</th>
            </tr>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'biblioteka');
            $sql = "SELECT bibl_wyp.id_wyp AS id_wyp,
                        bibl_wyp.date_wyp AS data_wypoz,
                        bibl_wyp.date_odd AS data_odd,
                        bibl_user.imie AS imie,
                        bibl_user.nazwisko AS nazwisko,
                        bibl_tytul.tytul AS tytul,
                        bibl_autor.autor AS autor,
                        bibl_book.wypoz AS wypoz
                    FROM bibl_wyp
                    JOIN bibl_book ON bibl_wyp.id_book = bibl_book.id_book
                    JOIN bibl_user ON bibl_wyp.id_user = bibl_user.id_user
                    JOIN bibl_tytul ON bibl_book.id_tytul = bibl_tytul.id_tytul
                    JOIN bibl_autor ON bibl_book.id_autor = bibl_autor.id_autor";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id_wyp']}</td>
                        <td>{$row['data_wypoz']}</td>
                        <td>{$row['data_odd']}</td>
                        
                        <td>{$row['nazwisko']}</td>
                        <td>{$row['tytul']}</td>
                        <td>{$row['autor']}</td>
                        <td>{$row['wypoz']}</td>
                        <td>
                        <form action='deleteWyp.php' method='POST'>
                        <input type='hidden' name='id_delete' value='{$row['id_wyp']}'>
                            <input type='submit' class='delete-button' value='Usuń'>
                        </form>
                    </td>
                    </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>


