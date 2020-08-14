
<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html">
						<img src="img/login.png" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="img/login.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
					<?php
						if($_SESSION['role']=='admin'){
							?>
						<li <?php if(($_SESSION["link"])=='home'){ echo " "; ?> class='active' <?php }?>>
							<a href="home.php"><i class="fa fa-home" ></i><span class="hidden-xs hidden-sm">Home</span></a>
						</li>
                        <li  <?php if(($_SESSION["link"])=='books'){ echo " "; ?> class='active' <?php }?>>
							<a href="books.php"><i class="fa fa-tasks" ></i><span class="hidden-xs hidden-sm">Books</span></a>
						</li>
						<li <?php if(($_SESSION["link"])=='bookcat'){ echo " "; ?> class='active' <?php }?>>
							<a href="bookcat.php"><i class="fa fa-book" ></i><span class="hidden-xs hidden-sm">Book Category</span></a>
						</li>
                        <li <?php if(($_SESSION["link"])=='borrowed'){ echo " "; ?> class='active' <?php }?>>
							<a href="borrowed.php"><i class="fa fa-upload" ></i><span class="hidden-xs hidden-sm">Borrowed</span></a>
						</li>
                        <li <?php if(($_SESSION["link"])=='returned'){ echo " "; ?> class='active' <?php }?>>
							<a href="returned.php"><i class="fa fa-download" ></i><span class="hidden-xs hidden-sm">Returned</span></a>
						</li>
                        <li <?php if(($_SESSION["link"])=='members'){ echo " "; ?> class='active' <?php }?>>
							<a href="members.php"><i class="fa fa-users" ></i><span class="hidden-xs hidden-sm">Members</span></a>
						</li>
						<?php
						}else{
							?>
						<li <?php if(($_SESSION["link"])=='home'){ echo " "; ?> class='active' <?php }?>>
							<a href="home_stu.php"><i class="fa fa-home" ></i><span class="hidden-xs hidden-sm">Home</span></a>
						</li>
						<li <?php if(($_SESSION["link"])=='stu_books'){ echo " "; ?> class='active' <?php }?>>
							<a href="book_stu.php"><i class="fa fa-home" ></i><span class="hidden-xs hidden-sm">Books</span></a>
						</li>
						<li <?php if(($_SESSION["link"])=='mybooks'){ echo " "; ?> class='active' <?php }?>>
							<a href="my_books.php"><i class="fa fa-home" ></i><span class="hidden-xs hidden-sm">My Books</span></a>
						</li>
							<?php
						}
						?>
						
                        <li><a href="logout.php" onclick="return confirm('Are you sure you want to Logout?')"><i class="fa fa-sign-out" ></i><span class="hidden-xs hidden-sm">Logout</span></a></li>	
						
                       
                    </ul>
                </div>
            </div>