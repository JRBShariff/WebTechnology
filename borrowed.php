<?php
	session_start();;
	$_SESSION["link"]='borrowed';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - Borrowed books   </title>
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
                    <h1>Borrowed Books</h1>
					
                  
					<hr>
					<div class="row" style="padding:20px">
						<div style="" class="table-responsive">
							<table class="table table-bordered">
							<thead>
							  <tr>
								<th>SNO</th>
								<th>BOOK ISBN</th>
								<th>BOOK TITLE</th>
								<th>STUDENT NAME</th>
								<th>STUDENT PHONE</th>
								<th>ISSUE DATE</th>
								<th>RETURN DATE</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody>
							<?php
							//query
							include("connection.php");
							$n=1;
							$sql="select * from viewstubooks where Book_Status='borrowed'";
							
							$st=$conn->query($sql);
							while($row=$st->fetch(PDO::FETCH_ASSOC)){
							?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $row['ISBN']; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['fname']." ".$row['lname']; ?></td>
								<td><?php echo $row['Phone']; ?></td>
								<td><?php echo $row['issueDate']; ?></td>
								<td><?php echo $row['returnDate']; ?></td>
								<td><a class="btn btn-sm btn-success" href="#">RETURN <i class="fa fa-send"></i></a></td>
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
