<?php 



require('functions.php');
require('header.php');

$id = $_GET['id'];
$posts = readJson('data.json');

if(!isset($_GET['id'])){
	die('No id: go back to the <a href="index.php">
Home page</a>');
}

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id']>=count($posts)){
	die('Invalid: go back to the <a href="index.php">Home page</a>');
	
}

$data = $posts[$id];

?>


<body>
<?php require('nav_bar.php'); ?>
<form class="form-class" action="editHandler.php" method="get">
	Author Name:<br><input type="text" name="author" placeholder="Enter text here" size="30" value="<?=$data[0]?>"><hr>
	Title:<br><input type="text" name="title" placeholder="Enter text here" size="30" value="<?=$data[2]?>"></input><hr>
	Content:<br><textarea name="content" placeholder="Enter text here"  rows="10" cols="50"><?=$data[3]?></textarea><hr>
	<input type="hidden" name="id" value="<?=$id?>">
	<input type="submit" value="Submit">
	<input type="reset" value="Reset">
	
</form>
</body

<?php
require('footer.php');
?>