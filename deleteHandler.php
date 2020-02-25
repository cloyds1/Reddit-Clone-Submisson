<?php 
 
session_start();
if(!isset($_SESSION['username'])){
	header('Location: login.php');
}

require('functions.php');
require('header.php');

$id = $_GET['id'];

deleteEntry($id, 'data.json');
	

?>


<body>
<?php require('nav_bar.php'); ?>

<div class="form-class">
	
	<h1>Posts deleted!</h1>
	
</div>
</body

<?php
require('footer.php');
?>