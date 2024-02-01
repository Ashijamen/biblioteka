<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuwanie użytkownika</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .delete-button {
            font-size: 10px;
            padding: 2px 4px;
            text-align: center;
            width: auto;
            margin: 5% auto;
            display: block;
            
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .delete-button:hover {
            background-color: #45a049; /* Ciemniejszy czerwony po najechaniu */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Usuwanie użytkownika</h1>
        <div class="message">
            <?php
            $conn = new mysqli("localhost", "root", "", "biblioteka");

            if(isset($_POST['id_delete'])) {
                $id_delete = $_POST['id_delete'];
                $sql = "DELETE FROM bibl_user WHERE id_user = $id_delete";
                $result = mysqli_query($conn, $sql);
                
                if ($result) {
                    echo "<p class='success-message'>Usunięto użytkownika: $id_delete</p>";
                } else {
                    echo "<p class='error-message'>Błąd podczas usuwania użytkownika: " . mysqli_error($conn) . "</p>";
                }
                echo "<br><a href='insertUser.php'> WRÓC </a>";
            }
            ?>
        </div>
    </div>

    <div class="container">
        <h2>Lista czytelników</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <!-- <th>Usuń</th> -->
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

                </tr>
                ";
            }
            ?>
        </table>
    </div>
</body>
</html>
