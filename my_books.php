<?php
session_start();
if(!isset($_SESSION['user'])){
	header("location:index.php");
}

$_SESSION["link"]='mybooks';	
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - My Books   </title>
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
                    <h1>Books </h1>
					
                  
					<hr>
					<div class="row" >
						<div class="clearfix" style="margin-bottom:10px">
						  <span class="float-left" style="font-size:26px">My Books </span>
						</div >
						<div class="table-responsive" >
							<table class="table table-striped table-hover table-condensed  table-bordered" >
							<thead>
							  <tr  >
								<th>SNO.</th>
								<th>ISBN</th>
								<th>TITLE</th>
								<th>DESCRIPTION</th>
								<th>ISSUE DATE</th>
								<th>RETURN DATE</th>
								<th>STATUS</th>
								<th>ACTION</th>
							  </tr>
							</thead>
							<tbody>
							<?php
							//query
							include("connection.php");
							$n=1;
							$sid=$_SESSION['userID'];
							$sql="select * from viewstubooks where userID='$sid' and Book_Status='borrowed'";
							$st=$conn->query($sql);
							while($row=$st->fetch(PDO::FETCH_ASSOC)){
								$qua=$row['quantity'];
								$issueID=$row['sbID'];
							?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $row['ISBN']; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['issueDate']; ?></td>
								<td><?php echo $row['returnDate'];?></td>
								<td><?php echo $row['Book_Status']; ?></td>
								<td> 
									<a class="btn btn-primary btn-sm" href="returnBook.php?id=<?php echo $issueID; ?>" >Return <i class="fa fa-paper-plane"></i></a>
								</td>
							</tr>	
							
							<?php include('modal.php');
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
v