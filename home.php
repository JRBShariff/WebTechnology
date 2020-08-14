<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}

	$_SESSION["link"]='home';
include("connection.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - HOME   </title>
	<?php include('include/link_header.php') ?>
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
						<div style="">
						<h1>Hello, <?php echo $_SESSION['user']; ?> </h1>
						<p>WELCOME TO THE LIBRARY SYSTEM</p>
					</div>	
					
                    <?php include('include/info.php'); ?>
					<hr>
					<div class="row" style="padding:20px">
						<div class="clearfix" style="margin-bottom:10px">
						  <span class="float-left" style="font-size:26px">Today Transaction</span>
						  <a href="" style="float:right" class=" btn  btn-success btn-sm float-right">Add new</a>
						</div >
						
						<div class="table-responsive" style="border:1px solid lightblue">
							<table class="table">
							<thead>
							  <tr>
								<th>Sno</th>
								<th>Book Title</th>
								<th>Book Desc</th>
								<th>Author</th>
								<th>Quantity</th>
								<th>Category</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody>
							<?php
							//query
							$n=1;
							$sql="select * from viewstubooks";
							$st=$conn->query($sql);
							while($row=$st->fetch(PDO::FETCH_ASSOC)){
							?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['author']; ?></td>
								<td><?php echo $row['quantity']; ?></td>
								<td><?php echo $row['category']; ?></td>
								<td><i class="fa fa-eye"></i></td>
							</tr>							
							<?php
							
							$n++;
							}
							
							?>
							  
							</tbody>
						  </table>
						</div>
						
					</div>
                </div>
            </div>
        </div>
		
		

    </div>



    
    

</body>
</html>
