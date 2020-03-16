<?php 

session_start();

require('../utils/jsonDatabaseUtil.php');
require('../utils/classes.php');

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}


$post_container = new PostContainer('../dataFiles/data.json');


$id = $_GET['id'];


if(!isset($id)){
	header('Location: edit.php');
}

if(!is_numeric($id) || $_GET['id']<0 || $_GET['id']>=count($post_container->getPosts())){
	
	header('Location: edit.php');
	
}



require('../rsrc/header.php');

?>


<body>
<?php require('../rsrc/nav_bar.php'); ?>
<form class="form-class" action="editHandler.php" method="post">
	Author User-Name: <?=$post_container->getPostAtId($id)->getAuthor()?><hr>
	Title:<br><input type="text" name="title" placeholder="Enter text here" size="30" value="<?=$post_container->getPostAtId($id)->getTitle()?>"></input><hr>
	Content:<br><textarea name="content" placeholder="Enter text here"  rows="10" cols="50"><?=$post_container->getPostAtId($id)->getContent()?></textarea><hr>
	<input type="hidden" name="id" value="<?=$id?>">
	<input type="submit" value="Submit">
	<input type="reset" value="Reset">
	
</form>
</body

<?php
require('../rsrc/footer.php');
?>