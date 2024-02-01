<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj autora i tytuł</title>
    <style>
        /* Lekki styl CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 8px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
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

        .message {
            text-align: center;
            margin-bottom: 10px;
        }

        a {
            display: block;
            text-align: center;
            color: #333;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dodaj książkę</h1>
        <!-- Komunikat po dodaniu autora lub tytułu -->
        <div class="message">
            <?php
            if (isset($_POST['id_autor'], $_POST['id_tytul'])) {
                $conn = new mysqli("localhost", "root", "", "biblioteka");
                $id_autor = $_POST['id_autor'];
                $id_tytul = $_POST['id_tytul'];

                $sql = "INSERT INTO bibl_book (id_autor, id_tytul) VALUES ('$id_autor','$id_tytul')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "Dodano książkę pomyślnie.";
                } else {
                    echo "Wystąpił błąd podczas dodawania książki: " . mysqli_error($conn);
                }
            }
            ?>
        </div>
        <!-- Formularz dodawania autora -->
        <form action="insertBOOK.php" method="POST">
            <input type="text" name="id_autor" placeholder="id_autor">
            <input type="text" name="id_tytul" placeholder="id_tytul">
            <input type="submit" value="Dodaj książkę">
        </form>
        <a href="index.php">WRÓĆ</a>
    </div>

    <!-- <div class="container"> -->

    <!-- <h2>Lista tytułów</h2>
        <table>
            <tr>
                <th>ID tytułu</th>
                <th>Tytuł</th>
                <th>ID autora</th>
                <th>Autor</th>
            </tr>
            <?php
            // $conn = new mysqli("localhost", "root", "", "biblioteka");
            // $sql ="SELECT bibl_book.id_book, bibl_autor.id_autor, bibl_autor.autor, bibl_tytul.id_tytul, bibl_tytul.tytul 
            // FROM bibl_book, bibl_autor, bibl_tytul 
            // WHERE bibl_book.id_autor = bibl_autor.id_autor AND bibl_book.id_tytul = bibl_tytul.id_tytul;";
            // $result = mysqli_query($conn, $sql);
            // while($row = mysqli_fetch_assoc($result)) {
            //     echo 
            //     "<tr>
            //         <td>{$row['id_autor']}</td>
            //         <td>{$row['autor']}</td>
            //         <td>{$row['id_tytul']}</td>
            //         <td>{$row['tytul']}</td>
            //         <td>{$row['id_book']}</td>
            //     </tr>";
            // }
            ?> -->

    <!-- <h2>Lista autorów i tytułów </h2>
        <table>
            <tr>
                <th>id_book</th>
                <th>id_tytul</th>
                <th>id_autor</th>
                <th>autor</th>

            </tr>
            <?php
            // $conn = new mysqli("localhost", "root", "", "biblioteka");
            // $sql = "SELECT bibl_book.*, bibl_autor.autor, bibl_tytul.tytul
            // FROM bibl_book
            // JOIN bibl_autor ON bibl_book.id_autor = bibl_autor.id_autor
            // JOIN bibl_tytul ON bibl_book.id_tytul = bibl_tytul.id_tytul;
            // ";
            // $result = mysqli_query($conn, $sql);
            // while ($row = mysqli_fetch_assoc($result)) {
            //      echo "
            //      <tr>
            //      <td>{$row['id_book']}</td>
            //      <td>{$row['id_autor']}</td>
            //      <td>{$row['id_tytul']}</td>
            //      <td>{$row['autor']}</td>
            //      </tr>";
            //  }
            ?> 
        </table> -->

    <!-- </div> -->

</body>
</html>