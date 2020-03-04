<?php 

session_start();

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}

require('../utils/fileUtil.php');
require('../utils/editUtil.php');


$id = $_GET['id'];
$posts = readJson('../dataFiles/data.json');

if(!isset($_GET['id'])){
	header('Location: edit.php');
}

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id']>=count($posts)){
	
	header('Location: edit.php');
	
}

$data = $posts[$id];

require('../rsrc/header.php');

?>


<body>
<?php require('../rsrc/nav_bar.php'); ?>
<form class="form-class" action="editHandler.php" method="post">
	Author User-Name: <?=$data['author']?><hr>
	Title:<br><input type="text" name="title" placeholder="Enter text here" size="30" value="<?=$data['title']?>"></input><hr>
	Content:<br><textarea name="content" placeholder="Enter text here"  rows="10" cols="50"><?=$data['content']?></textarea><hr>
	<input type="hidden" name="id" value="<?=$id?>">
	<input type="submit" value="Submit">
	<input type="reset" value="Reset">
	
</form>
</body

<?php
require('../rsrc/footer.php');
?>