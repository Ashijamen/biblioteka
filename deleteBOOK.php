<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuwanie książek</title>
    <style>
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
        .success-message {
            color: green;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Usuwanie książki</h1>
        <div class="message">
            <?php
            $conn = new mysqli("localhost", "root", "", "biblioteka");

            if(isset($_POST['id_delete'])) {
                $id_delete = $_POST['id_delete'];
                $sql = "DELETE FROM bibl_book WHERE id_book =".$_POST['id_delete'];
                $result = mysqli_query($conn, $sql);
                
                if ($result) {
                    echo "<p class='success-message'>Usunięto książkę o ID: $id_delete</p>";
                } else {
                    echo "<p class='error-message'>Błąd podczas usuwania książki: " . mysqli_error($conn) . "</p>";
                }
                echo "<br><a href='index.php'> WRÓC </a>";
            }
            ?>
        </div>

    </div>
</body>
</html>