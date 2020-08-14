<?php
session_start();
if(!isset($_SESSION['user'])){
	header("location:index.php");
}
include('connection.php');

if(isset($_POST['submit'])){
	$isbn = $_POST['isbn'];
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$author = $_POST['author'];
	$quantity = $_POST['quantity'];
	$cat = $_POST['boookcat'];
	
	$sql="UPDATE  books set isbn=:isbn,title=:title,description=:desc,author=:author,quantity=:quantity,category=:cat where ISBN=:isbn";
	$st=$conn->prepare($sql);
	$st->execute(array(':title'=>$title,':desc'=>$desc,':author'=>$author,':quantity'=>$quantity,':cat'=>$cat,':isbn'=>$isbn));

	header("location:books.php?re=success update book");
}
?>