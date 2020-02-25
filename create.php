<?php 
session_start();
if(!isset($_SESSION['username'])){
	header('Location: login.php');
}

require('header.php');


?>


<body>
<?php require('nav_bar.php'); ?>
<form class="form-class" action="createHandler.php" method="get">
	Author Name:<br><input type="text" name="author" placeholder="Enter text here" size="30" value="<?php echo $_SESSION['username'];?>"><hr>
	Title:<br><input type="text" name="title" placeholder="Enter text here" size="30"><hr>
	Content:<br><textarea name="content" placeholder="Enter text here"  rows="10" cols="50"></textarea><hr>
	<input type="submit" value="Submit">
	<input type="reset" value="Reset">
</form>
</body

<?php
require('footer.php');
?>
