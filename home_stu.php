<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}

	$_SESSION["link"]='home';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - Home </title>
  	<?php include('include/link_header.php') ?>
  </head>
  <body class="home">
    <div class="container-fluid-lg display-table">
        <div class="row display-table-row">
            <?php include('include/sidebar.php'); ?>
			
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
               <?php include('include/header.php'); ?>

                <div class="user-dashboard">
				
                  
					<hr>
					<div class="row" style="padding:20px">
						<div style="padding:40px" align="center">
							<h1>Hello, <?php echo $_SESSION['user']; ?> </h1>
							<hr>
							<h2>WELCOME TO THE LIBRARY SYSTEM</h2>
							<a href=""class="btn btn-lg btn-success" >My books</a>
						</div>	
						
						
					</div>
                </div>
            </div>
        </div>
		
		

    </div>



    
    

</body>
</html>
