<?php
include('connection.php');

if(isset($_POST['submit'])){
	$catname = $_POST['catname'];
	
	
	$sql="insert into book_cat (catName) values(:catname)";
	$st=$conn->prepare($sql);
	$st->execute(array(':catname'=>$catname));

	header("location:bookcat.php?re=success adding Category");
	}




?>

