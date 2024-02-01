<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka - Usuń wypożyczenie</title>
    <style>
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

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            display: block;
            text-align: center;
            color: #333;
            text-decoration: none;
            margin-top: 20px;
        }

        .back-button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Usuń wypożyczenie</h1>
        <div class="message">
            <?php
            $conn = new mysqli("localhost", "root", "", "biblioteka");

            $sql = "DELETE FROM bibl_wyp WHERE id_wyp =" . $_POST['id_delete'];
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "Wypożyczenie zostało usunięte.";
            } else {
                echo "Wystąpił błąd podczas usuwania wypożyczenia.";
            }
            ?>
        </div>
        <a href="index.php" class="back-button">WRÓĆ</a>
    </div>
</body>
</html>
