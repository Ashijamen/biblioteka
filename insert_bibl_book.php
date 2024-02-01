<?php



$autor= $_POST['autor'];
$tytul= $_POST['tytul'];


$conn = new mysqli("localhost", "root", "", "biblioteka");



$sql1 =" SELECT id_autor from bibl_autor order by id_autor DESC limit 1";
$result1 = mysqli_query($conn,$sql1);


$row = mysqli_fetch_assoc($result1);
$id_autor= $row['id_autor'];
$sql2=" SELECT id_tytul from bibl_tytul order by id_tytul DESC limit 1";
$result2 = mysqli_query($conn,$sql2);


$row = mysqli_fetch_assoc($result2);
$id_tytul= $row['id_tytul'];
 $sql =" INSERT INTO bibl_book (id_book, id_tytul, id_autor) VALUE(null,'$id_tytul', '$id_autor')";
 $result = mysqli_query($conn,$sql);
 echo'</br>' .$sql;




echo("<a href='index.php'> WRÓC < --- </a>");
?>