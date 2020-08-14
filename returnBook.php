<?php
session_start();
if(!isset($_SESSION['user'])){
	header("location:index.php");
}
if(isset($_GET['id'])){
	$id=$_GET['id'];
 include('connection.php');
 $sql="	select DATEDIFF(CURRENT_DATE(),returnDate) as days from stu_books where sbID='$id'";
 $st=$conn->query($sql);
 $rw=$st->fetch(PDO::FETCH_ASSOC);
 $days=$rw['days'];

	$fine=$days*100;
	$sql="insert into returnBook (stuBookID,fine,status) values(:a,:b,:c)";
	$st=$conn->prepare($sql);
	$st->execute(array(':a'=>$id,':b'=>$fine,':c'=>'pending'));
	
	if($st){
		$sql="update stu_books set Book_status='pending' where sbID='$id'";
		$st=$conn->query("$sql");
		header('location:my_books.php');
	}
	

 
}

?>