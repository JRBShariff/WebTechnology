<?php
include('connection.php');
header('Content-type: application/json');
if(isset($_POST['submit'])){
	include('student_records/index.php');
	$reg=($_POST['reg']);
	getData($reg);
	$url=file_get_contents('student_records/studRecords.json');
	$content=json_decode($url,TRUE);
	
	foreach($content as $data){
		if($data['regNo']==	$reg){
			$sql1="insert into login (username,password,role) values(:a,:b,:c)";
			$st=$conn->prepare($sql1);
			$st->execute(array(':a'=>$data['fname'],':b'=>"123",':c'=>"student"));
			$uID=$conn->lastInsertId();
			if($st){
				$sql="insert into students (fname,lname,gender,address,Phone,userID) values(:a,:b,:c,:d,:e,:f)";
			$st=$conn->prepare($sql);
			$st->execute(array(':a'=>$data['fname'],':b'=>$data['lname'],':c'=>$data['gender'],':d'=>$data['address'],':e'=>$data['phone'],':f'=>$uID));
			header('location:members.php');
			}
			
		}
	}
}
?>