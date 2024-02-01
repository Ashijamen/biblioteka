<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj nowego czytelnika</title>
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
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="submit"] {
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
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
        <h1>Dodaj nową osobę</h1>
        <!-- Komunikat po dodaniu autora lub tytułu -->
        <div class="message">
            <?php
            if (isset($_POST['addUser'])) {
                $conn = new mysqli("localhost", "root", "", "biblioteka");
                $imie= $_POST['imie'];
                $nazwisko= $_POST['nazwisko'];
                $sql =" INSERT INTO bibl_user VALUE(null, '$imie','$nazwisko')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "Dodano czytelnika: $imie $nazwisko";
                } else {
                    echo "Wystąpił błąd podczas dodawania czytelnika: " . mysqli_error($conn);
                }
            }
            ?>
        </div>
        <!-- Formularz dodawania autora -->
        </form>
            <!-- Formularz dodawania nowej osoby -->
            <form action="insertUser.php" method="POST">
            <input type="text" name="imie" placeholder="Podaj imię">
            <input type="text" name="nazwisko" placeholder="Podaj nazwisko">
            <input type="submit" name="addUser" value="Dodaj czytelnika">
        </form>
        <a href="index.php">WRÓĆ</a>
    </div>

    <div class="container">
        <h2>Lista czytelników</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Naziwsko</th>
                <th>Usuń</th>

            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "biblioteka");
            $sql = "SELECT * FROM bibl_user";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                <td>{$row['id_user']}</td>
                <td>{$row['imie']}</td>
                <td>{$row['nazwisko']}</td>
                <td>
                    <form action='deleteUser.php' method='POST'>
                        <input type='hidden' name='id_delete' value='{$row['id_user']}'>
                        <input type='submit' class='delete-button' value='Usuń'>
                    </form>
                </td>
            </tr>
        ";
    }
            ?>
        </table>




    </div>

</body>
</html>
