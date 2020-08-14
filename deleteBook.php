


<?php 
include("connection.php");
$crt=$_GET['id'];
$sql="delete from books where isbn='$crt'";
$stmt=$conn->query($sql);
header("location:books.php");


?>