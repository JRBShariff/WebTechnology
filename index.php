<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - LOGIN</title>
	<link rel="stylesheet"  href="style.css">
		<?php include('include/link_header.php') ?>
	<script src="lib/myScript.js"></script>
  </head>
  <body>
	<div>
		<div class="loginBox" >
			<img src="img/login.png" height="70px" class="iconLogin" />
			<h4 style="color:white;text-align:center">LMS Users Please,<br> <i style="font-size:17px">Sign In Here!</i></h4>
			<form action="loginHandler.php" method="POST">
				<p>Username</p>
				<input type="text" id="user" name="user" required placeholder="Enter Username" />
				<p>Password</p>
				<input type="password" id="pass" name="pass" required placeholder="Enter Password" />
				<input type="submit" name="submit"  id="submit" value="Sign In" />
									
			</form>
		</div>
	</div>

  </body>
</html>
