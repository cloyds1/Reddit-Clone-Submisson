<?php 
	
	session_start();

	require('../rsrc/header.php');
	require('../rsrc/nav_bar.php');
	
	
	if(isset($_SESSION['username'])){
		
		echo "<h2 class=\"post-style\">You're already logged in as: ".$_SESSION['username']."!</h2>";
	
	}
	
	else {
		echo '<form class="form-class" action="loginHandler.php" method="post">
	
				<h3>Login</h3><br>
				Note: You must be registered with us to modify existing posts on site!<br><br>
				Username: <input type="text" name="usrname" minlength="4" required><br><hr>
				Password: <input type="password" name="password" minlength="8" required><br><hr>
				<input type="submit" value="Submit">
				<input type="reset" value="Reset">
	
				</form>';
				
		if(isset($_GET['message'])){
			
			if($_GET['message'] == 'fail-noaccnt'){
				echo '<br><div class="alert alert-danger" style="width: 35%; margin-left: auto; margin-right: auto;" role="alert">No account by that name</div>';
			}
		
			if($_GET['message'] == 'fail-wrongpass'){
				echo '<br><div class="alert alert-danger" style="width: 35%;  margin-left: auto; margin-right: auto;" role="alert">Wrong password</div>';
			}
			
		}
		
	}
	
	
?>
	


<?php

require('../rsrc/footer.php');


 ?>