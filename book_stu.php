<?php
session_start();
if(!isset($_SESSION['user'])){
	header("location:index.php");
}

$_SESSION["link"]='stu_books';	
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - Books   </title>
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
						  <span class="float-left" style="font-size:26px">All Books</span>
						</div >
						<div class="table-responsive" >
							<table class="table table-striped table-hover table-condensed  table-bordered" >
							<thead>
							  <tr  >
								<th>SNO.</th>
								<th>ISBN</th>
								<th>TITLE</th>
								<th>DESCRIPTION</th>
								<th>AUTHOR</th>
								<th>AVAILABLE</th>
								<th>CATEGORY</th>
								<th>ACTION</th>
							  </tr>
							</thead>
							<tbody>
							<?php
							//query
							include("connection.php");
							$n=1;
							$sid=$_SESSION['userID'];
							$sql="select * from books b, book_cat bc where b.category=bc.catID  and  isbn not in(select bookISBN from stu_books where Book_Status='borrowed') ";
							//$sql="select * from books b, book_cat bc where b.category=bc.catID and 
							//(quantity-(select count(*) from stu_books))>0 and isbn not in
							//(select bookISBN from stu_books where stuID=
							//(select sID from students s, login u where s.userID=u.ID))";
							
							//$sql="select * from books ";
							$st=$conn->query($sql);
							while($row=$st->fetch(PDO::FETCH_ASSOC)){
								$qua=$row['quantity'];$isbn=$row['ISBN'];
								// determine borrowed quanity
								$sq2="select count(*) from stu_books where bookISBN='$isbn' and Book_Status='borrowed' ";
								$result = $conn->query($sq2); 
								 echo $bqua = $result->fetchColumn(); 
								
								
								
							?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $isbn; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['author']; ?></td>
								<td><?php echo $qua-$bqua; ?></td>
								<td><?php echo $row['catName']; ?></td>
								<td> 
									<a <?php if(($qua-$bqua)>0){ ?> class="btn btn-success btn-sm"   href="requesting.php?isbn=<?php echo $row['ISBN']; ?> <?php } ?>" class="btn btn-danger btn-sm" >Request <i class="fa fa-edit"></i></a>
								</td>
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
