<?php
$conn = new mysqli("localhost", "root", "", "biblioteka");

$id_book = $_POST['id_book'];

$sql = "SELECT * from bibl_autor, bibl_book, bibl_tytul where bibl_book.id_autor=bibl_autor.id_autor and bibl_book.id_tytul=bibl_tytul.id_tytul and bibl_book.id_book='$id_book' ";

echo $sql;
$result = mysqli_query($conn, $sql);
echo '<table border>';
echo '<tr>';
echo '<td> autor </td>';
echo '<td> tytul </td>';

echo '</tr>';

while($row=mysqli_fetch_assoc($result)){
    echo '<tr>';
    echo '<td>' .$row['autor']. '</td>';
    echo '<td>' .$row['tytul']. '</td>';
    echo '<tr>';
    }





    

    echo("<a href='index.php'> WRÓC < --- </a>");
?>