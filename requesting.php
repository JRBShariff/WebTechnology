<?php
session_start();
if(!isset($_SESSION['user'])){
	header("location:index.php");
}
include('connection.php');
$sql="select sID from students s, login l where l.ID = s.userID";
$st=$conn->query($sql);
$rw=$st->fetch(PDO::FETCH_ASSOC);
$id=$rw['sID'];

if(isset($_GET['isbn'])){
	$isbn= $_GET['isbn'];
	$id=$rw['sID'];
	$dt= date("Y-m-d");
	$rt= date('Y-m-d', strtotime(' + 5 days'));
	$stat='borrowed';
	$sql="insert into stu_books (stuID,bookISBN,issuedate,returnDate,Book_status) values(:stuID,:isbn,:idate,:rdate,:bstatus)";
	$st=$conn->prepare($sql);
	$st->execute(array(
		':stuID'=>$id,
		':isbn'=>$isbn,
		':idate'=>$dt,
		':rdate'=>$rt,
		':bstatus'=>$stat
	));
	header("location:my_books.php");
}
?>