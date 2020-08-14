<?php
session_start();
if(!isset($_SESSION['user'])){
	header("location:index.php");
}

$_SESSION["link"]='books';	
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
                    <h1>Books </h1>
					
                  
					<hr>
					<div class="row" >
						<div class="clearfix" style="margin-bottom:10px">
						  <span class="float-left" style="font-size:26px">All Books</span>
						  <a href="add_book.php" style="float:right" class=" btn  btn-success btn-sm float-right">Add new</a>
						</div >
						<div class="table-responsive" >
							<table class="table table-striped table-hover table-condensed  table-bordered" >
							<thead>
							  <tr  >
								<th>SNO.</th>
								<th>TITLE</th>
								<th>DESCRIPTION</th>
								<th>AUTHOR</th>
								<th>QUANTITY</th>
								<th>CATEGORY</th>
								<th>ACTION</th>
							  </tr>
							</thead>
							<tbody>
							<?php
							//query
							include("connection.php");
							$n=1;
							$sql="select * from books b,book_cat bc where b.category=bc.catID";
							$st=$conn->query($sql);
							while($row=$st->fetch(PDO::FETCH_ASSOC)){
							?>
							<tr>
								<td><?php echo $row['ISBN']; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['author']; ?></td>
								<td><?php echo $row['quantity']; ?></td>
								<td><?php echo $row['catName']; ?></td>
								<td> 
								<a class="btn btn-primary btn-sm" href="edit_book.php?isbn=<?php echo $row['ISBN'];  ?>">Edit <i class="fa fa-edit"></i></a>
								<a class="btn btn-danger btn-sm"onclick="return confirm('Are you sure')" href="deleteBook.php?id=<?php echo $row['ISBN'];  ?>">Delete <i class="fa fa-trash"></i></a>
								
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
