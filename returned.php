<?php
	session_start();;
	$_SESSION["link"]='returned';
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
                    <h1>Returned Books</h1>
					
                  
					<hr>
					<div class="row" style="padding:20px">
						<div class="table-responsive" >
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
								<th>FINE</th>
								<th>STATUS</th>
								<th>ACTION</th>
							  </tr>
							</thead>
							<tbody>
							<?php
							//query
							include("connection.php");
							$n=1;
							$sql="select * from books b , stu_books sb, students st , returnbook rb where b.ISBN=sb.bookISBN and sb.stuID=st.sID and rb.stuBookID=sbID and Book_Status='pending'";
							$st=$conn->query($sql);
							while($row=$st->fetch(PDO::FETCH_ASSOC)){
								$id=$row['sbID'];
								$rid=$row['rID'];
							?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $row['ISBN']; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['fname']." ".$row['lname']; ?></td>
								<td><?php echo $row['Phone']; ?></td>
								<td><?php echo $row['issueDate']; ?></td>
								<td><?php echo $row['returnDate']; ?></td>
								<td><?php  if($row['fine']>0){echo $row['fine'];}else{ echo 0;}; ?></td>
								<td>
								<?php
									if($row['status']=='pending'){
									?>
								<span class="badge badge-danger"><?php echo $row['status']; ?></span>
									<?php
									}else{
										?>
									<span class="badge badge-primary"><?php echo $row['status']; ?></span>
									<?php
									}
								?>
								
								</td>
								<td><a class="btn btn-sm btn-primary" href="acceptReturn.php?bid=<?php echo $id; ?>&rid=<?php echo $rid ?>">Accept <i class="fa fa-share"></i></a></td>
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
