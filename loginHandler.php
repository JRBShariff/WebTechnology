 <?php
 session_start();
 include('connection.php');
if(isset($_POST['submit'])){
	
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$sql="select * from login where username=:u and password=:p";
	$st=$conn->prepare($sql);
	$st->execute(array('u'=>$user,'p'=>$pass));
	$row=$st->fetch(PDO::FETCH_ASSOC);
	if(!empty($row['username']) && !empty($row['password']) ){
		$_SESSION['user']=$row['username'];
		$_SESSION['userID']=$row['ID'];
		$_SESSION['role']=$row['role'];
		if($_SESSION['role']=='admin'){
			header('location:home.php');
		}else{
			header('location:home_stu.php');
		}
		
	}else{
		header('location:index.php?re=Login Failed!');
	}
	
}
 
 ?>