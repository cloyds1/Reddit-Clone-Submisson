<?php 
	session_start();
	if(isset($_SESSION['username'])){
		header('Location: ../index.php');
	}
	
	require('../rsrc/header.php');
	require('../rsrc/nav_bar.php');
	
	
	?>
	
<form class="form-class" action="signupHandler.php" method="post">
	
	<h3>Signup</h3><br>
	Note: You must be registered with us to modify existing posts on site!<br><br>
	Username: <input type="text" name="usrname" minlength="4" required><br><hr>
	Password: <input type="password" name="password" minlength="8" required><br><hr>
	<input type="submit" value="Submit">
	<input type="reset" value="Reset">
	
</form>

<?php
if(isset($_GET['message'])){
	if($_GET['message'] == 'name-conflict'){
		echo '<br><div class="alert alert-danger" style="width: 35%; margin-left: auto; margin-right: auto;" role="alert">There is a user with that name already: Try another user name.</div>';
	}
}
require('../rsrc/footer.php');

 ?>