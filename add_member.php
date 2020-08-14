<?php
session_start();
if(!isset($_SESSION['user'])){
	header("location:index.php");
}

$_SESSION["link"]='members';	
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - HOME   </title>
  	<link rel="stylesheet" href="style3.css">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<script>
		$(document).ready(function(){
		   $('[data-toggle="offcanvas"]').click(function(){
			   $("#navigation").toggleClass("hidden-xs");
		   });
		});
	</script>
	
  </head>
  <body class="home">
    <div class="container-fluid-lg display-table">
        <div class="row display-table-row">
            <?php include('include/sidebar.php'); ?>
			
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
               <?php include('include/header.php'); ?>

                <div class="user-dashboard">
                    <h1>Members /   </h1>
					
					<hr>
					<div class="row" >
						
						<div style="padding:40px;">
							<form class="form-horizontal" action='retriveData.php' method="POST">
							  <fieldset>
								<div id="legend">
								  <legend class="">Add Students</legend>
								</div>
								<div class="control-group col-md-6">
								  <!-- Username -->
								  <label class="control-label"  for="reg">Reg Number</label>
								  <div class="controls">
									<input type="text" id="reg" name="reg" required class="form-control ">
									<p class="help-block">Fill up with a Registration Number of Student!</p>
									
								  </div>
								</div>
								
								<div class="control-group  col-md-10">
								  <!-- Button -->
								  <div class="controls">
									<input class="btn btn-success"  type="submit" name="submit"  value="Add Student">
								  </div>
								</div>
							  </fieldset>
							</form>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

    
    

</body>
</html>
