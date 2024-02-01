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
            margin-top: 20px;
            
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 4px; /* Zmniejszono padding */
            text-align: left;
            word-wrap: break-word; /* Włączono zawijanie wierszy */
        }
        th {
            background-color: #f2f2f2;
        }
        /* Zaktualizowany styl przycisku usuwania */
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
        <h1>Dodaj autora i tytuł</h1>
        <!-- Komunikat po dodaniu autora lub tytułu -->
        <div class="message">
            <?php
            if (isset($_POST['autor'])) {
                $conn = new mysqli("localhost", "root", "", "biblioteka");
                $autor = $_POST['autor'];
                $sql = "INSERT INTO bibl_autor VALUE(null, '$autor')";
                $result = mysqli_query($conn, $sql);
                echo "Dodano autora: $autor";
            }
            if (isset($_POST['tytul'])) {
                $conn = new mysqli("localhost", "root", "", "biblioteka");
                $tytul = $_POST['tytul'];
                $sql = "INSERT INTO bibl_tytul VALUE(null, '$tytul')";
                $result = mysqli_query($conn, $sql);
                echo "Dodano tytuł: $tytul";
            }
            ?>
        </div>
        <!-- Formularz dodawania autora -->
        <form action="" method="POST">
            <input type="text" name="autor" placeholder="Nowy autor">
            <input type="submit" value="Dodaj autora">
        </form>
        <!-- Formularz dodawania tytułu -->
        <form action="" method="POST">
            <input type="text" name="tytul" placeholder="Nowy tytuł">
            <input type="submit" value="Dodaj tytuł">
        </form>
        <a href="index.php">WRÓĆ</a>
    </div>

    <div class="container">
        <h2>Lista autorów</h2>
        <table>
            <tr>
                <th>ID autora</th>
                <th>Autor</th>
                <th>Usuń</th>
                
            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "biblioteka");
            $sql = "SELECT * FROM bibl_autor";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>{$row['id_autor']}</td>
                    <td>{$row['autor']}</td>
                    <td>
                        <form action='delete.php' method='POST'>
                            <input type='hidden' name='id_delete' value='{$row['id_autor']}'>
                            <input type='submit' class='delete-button' value='Usuń'>
                        </form>
                    </td>
                </tr>
            ";
        }
            ?>
        </table>

        <h2>Lista tytułów</h2>
        <table> 
            <tr>
                <th>ID tytułu</th>
                <th>Tytuł</th>
                <th>Usuń</th>
            </tr>
            <?php
             $conn = new mysqli("localhost", "root", "", "biblioteka");
             $sql = "SELECT * FROM bibl_tytul";
             $result = mysqli_query($conn, $sql);
             while ($row = mysqli_fetch_assoc($result)) {
                 echo "
                 <tr>
                     <td>{$row['id_tytul']}</td>
                     <td>{$row['tytul']}</td>
                     <td>
                        <form action='delete1.php' method='POST'>
                            <input type='hidden' name='id_delete' value='{$row['id_tytul']}'>
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
