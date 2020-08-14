<?php


header('Content-type: application/json');

function getData($reg){
	include('connection.php');
		$sql="SELECT * FROM students where regNo='$reg'";
		$st=$conn->query($sql);
		$list = array();
		while($row=$st->fetch(PDO::FETCH_ASSOC)){
			$list[] = $row;
		}
		$fp = fopen('student_records/studRecords.json', 'w');
		if(!fwrite($fp, json_encode($list)))
		{ die('Error : File Not Opened. ' . mysql_error());
		
		} else{ echo "Data Retrieved Successully!!!"; 
		} 
		fclose($fp);
}
?>