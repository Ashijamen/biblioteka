<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <style>
        /* Styl CSS dla nowoczesnego wyglądu */
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
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 3px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="submit"] {
            padding: 8px;
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .centered {
            text-align: center;
        }
        .delete-button {
            font-size: 10px; /* Zmniejszenie rozmiaru czcionki */
            padding: 2px 4px; /* Dopasowanie paddingu */
            text-align: center; /* Wyśrodkowanie tekstu */
            width: auto; /* Dopasowanie szerokości */
            margin: 5% auto; /* Wyśrodkowanie przycisku w kolumnie */
            display: block; /* Ustawienie jako blokowy element */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>System biblioteczny</h1>

        <div class="centered">
            <!-- Formularz dodawania autora i tytułu -->
            <form action="insert.php" method="POST">
                <!-- <input type="text" name="autor" placeholder="Nowy autor">
                <input type="text" name="tytul" placeholder="Nowy tytuł"> -->
                <input type="submit" value="Dodaj autora i tytuł">
            </form>

            <!-- Formularz dodawania książki -->
            <form action="insertBOOK.php" method="POST">
                <!-- <input type="text" name="id_autor" placeholder="id_autor">
                <input type="text" name="id_tytul" placeholder="id_tytul"> -->
                <input type="submit" value="Dodaj książkę">
            </form>

            <!-- Formularz dodawania nowej osoby -->
            <form action="insertUser.php" method="POST">
                <!-- <input type="text" name="imie" placeholder="Podaj imię">
                <input type="text" name="nazwisko" placeholder="Podaj nazwisko"> -->
                <input type="submit" value="Dodaj czytelnika">
            </form>

            <!-- Formularz dodawania wypożyczenia -->
            <form action="insertWyp.php" method="POST">
                <!-- <input type="text" name="id_book" placeholder="ID książki">
                <input type="text" name="id_user" placeholder="ID użytkownika">
                <input type="text" name="date_wyp" placeholder="Data wypożyczenia">
                <input type="text" name="date_odd" placeholder="Data oddania"> -->
                <input type="submit" value="Dodaj wypożyczenie">
            </form>
        </div>

        <!-- Sekcja wyświetlania danych -->
        <h2>Lista autorów i tytułów</h2>
        <table>
            <tr>
                <th>ID autora</th>
                <th>Autor</th>
                <th>ID tytułu</th>
                <th>Tytuł</th>
                <!-- <th>id_book</th> -->
                <th>Usuń</th>
            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "biblioteka");
            $sql = "SELECT bibl_autor.id_autor, bibl_autor.autor, bibl_tytul.id_tytul, bibl_tytul.tytul, bibl_book.id_book 
                    FROM bibl_book 
                    JOIN bibl_autor ON bibl_book.id_autor = bibl_autor.id_autor 
                    JOIN bibl_tytul ON bibl_book.id_tytul = bibl_tytul.id_tytul";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id_autor']}</td>
                        <td>{$row['autor']}</td>
                        <td>{$row['id_tytul']}</td>
                        <td>{$row['tytul']}</td>
                        <!-- <td>{$row['id_book']}</td> -->
                        <td>
                            <form action='deleteBOOK.php' method='POST'>
                                <input type='hidden' name='id_delete' value='{$row['id_book']}'>
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
