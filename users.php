<?php
	session_start();;
	$_SESSION["link"]='users';
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
                    <h1>Users</h1>
					
                  
					<hr>
					<div class="row" style="padding:20px">
						<div style="border:1px solid lightblue">
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
							include("connection.php");
							$n=1;
							$sql="select * from books";
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
