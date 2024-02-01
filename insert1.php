<?php
$conn = new mysqli("localhost", "root", "", "biblioteka");



$tytul= $_POST['tytul'];



$sql =" INSERT INTO bibl_tytul VALUE(null, '$tytul')";

$result = mysqli_query($conn, $sql);

echo $sql;
echo('<li>'.$sql);
echo('<br>');



echo("<a href='index.php'> WRÓC < --- </a>");

?>



