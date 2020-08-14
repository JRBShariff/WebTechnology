<?php
session_start();
if(!isset($_SESSION['user'])){
	header("location:index.php");
}

$_SESSION["link"]='books';	
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
                    <h1>Books / Add book </h1>
					
					<hr>
					<div class="row" >
						
						<div style="padding:40px;">
							<form class="form-horizontal" action='addBook_handler.php' method="POST">
							  <fieldset>
								<div id="legend">
								  <legend class="">Add new Books</legend>
								</div>
								<div class="control-group col-md-6">
								  <!-- Username -->
								  <label class="control-label"  for="isbn">ISBN</label>
								  <div class="controls">
									<input type="text" id="isbn" name="isbn"  class="form-control ">
									<p class="help-block">ISBN of books Insert carefully, without spaces</p>
									
								  </div>
								</div>
								<div class="control-group col-md-6">
								  <!-- Username -->
								  <label class="control-label"  for="title">Title</label>
								  <div class="controls">
									<input type="text" id="title" name="title" required class="form-control">
									<p class="help-block">Provide the title of the books</p>
									
								  </div>
								</div>
								
								<div class="control-group col-md-6">
								  <!-- Username -->
								  <label class="control-label"  for="desc">Description</label>
								  <div class="controls">
									<input type="text" id="desc" name="desc" required class="form-control">
									<p class="help-block">Provide the description of the book</p>
									
								  </div>
								</div>
								<div class="control-group col-md-6">
								  <!-- Username -->
								  <label class="control-label"  for="author">Author</label>
								  <div class="controls">
									<input type="text" id="author" name="author" required class="form-control">
									<p class="help-block">Enter full name of author ,Separated by space</p>
									
								  </div>
								</div>
							 
								<div class="control-group col-md-6">
								  <!-- Username -->
								  <label class="control-label"  for="quantity">Quantity</label>
								  <div class="controls">
									<input type="text" id="quantity" name="quantity" required class="form-control">
									<p class="help-block">Provide a book Quantity in Number form</p>
									
								  </div>
								</div>
								<div class="control-group col-md-6">
								  <!-- Username -->
								  <label class="control-label"  for="bookcat">Book Category</label>
								  <div class="controls">
									<select class="form-control" required name="boookcat">
										<option value="">Select Book Category</option>
										<?php
											$sql="select * from viewbookcat";
											$stm=$conn->query($sql);
											while($row=$stm->fetch(PDO::FETCH_ASSOC)){
												?>
												<option value="<?php  echo $row['catID']; ?>"> <?php  echo $row['catName']; ?></option>
												<?php
											}
										?>
									</select>
									<p class="help-block">Choose among available category of this Book</p>
									
								  </div>
								</div>
								<div class="control-group  col-md-10">
								  <!-- Button -->
								  <div class="controls">
									<input onclick="return validate()" class="btn btn-success"  type="submit" name="submit"  value="Save book">
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
<script>
var isbn = document.getElementById('isbn');
var title = document.getElementById('title');
var desc = document.getElementById('desc');
var author = document.getElementById('author');
var quantity = document.getElementById('quantity');
function validate(){
	if((/^[a-zA-Z0-9]{1,}$/).test(isbn.value)==false){
		alert("Please Insert Book ISBN");
		isbn.focus();
		return false;
	}else if((/^[a-zA-Z0-9]{1,}$/).test(title.value)==false){
		alert("Please Insert title ");
		title.focus();
		return false;
	}else if((/^[a-zA-Z0-9]{1,}$/).test(desc.value)==false){
		alert("Please Insert Description of Book");
		desc.focus();
		return false;
	}else if((/^[a-zA-Z0-9]{1,}$/).test(author.value)==false){
		alert("Please Insert author of Book");
		author.focus();
		return false;
	}else if((/^[a-zA-Z0-9]{1,}$/).test(quantity.value)==false){
		alert("Please Insert quantity of Book");
		quantity.focus();
		return false;
	}
}

</script>
    
    

</body>
</html>
