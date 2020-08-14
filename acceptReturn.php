 <?php
 session_start();
 
if(!isset($_SESSION['user'])){
	header("location:index.php");
}
include('connection.php');
if(isset($_GET['bid']) && isset($_GET['rid'])){
	$bid=$_GET['bid'];
	$rid=$_GET['rid'];
	$sql="UPDATE stu_books set Book_status='returned' where sbID='$bid'";
	$st=$conn->query($sql);
	if($st){
		$sql="UPDATE returnbook set status='returned' where rID='$rid'";
		$st=$conn->query($sql);
		header("location:returned.php");
	}
	
}
 
 ?>