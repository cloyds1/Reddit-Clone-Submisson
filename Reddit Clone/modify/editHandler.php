<?php 

session_start();

require('../utils/jsonDatabaseUtil.php');
require('../utils/classes.php');

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}

$post_container = new PostContainer('../dataFiles/data.json');
$id = $_POST['id'];

$title = strip_tags($_POST['title']);
$content = strip_tags($_POST['content']);

$post_container->editPost($id, $title, $content);
$post_container->flushToFile('../dataFiles/data.json');

header('Location: ../index.php');

?>
