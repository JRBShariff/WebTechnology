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
	
	$sql="insert into books (isbn,title,description,author,quantity,category) values(:isbn,:title,:desc,:author,:quantity,:cat)";
	$st=$conn->prepare($sql);
	$st->execute(array(':isbn'=>$isbn,':title'=>$title,':desc'=>$desc,':author'=>$author,':quantity'=>$quantity,':cat'=>$cat));

	header("location:books.php?re=success adding book");
	}




?>

