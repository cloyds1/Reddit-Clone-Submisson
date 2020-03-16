<?php 

session_start();

require_once('../utils/jsonDatabaseUtil.php');
require_once('../utils/classes.php');

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}

$author = $_SESSION['username'];
$date = date('M d, Y');
$title = strip_tags($_POST['title']);
$content = strip_tags($_POST['content']);

$post_container = new PostContainer('../dataFiles/data.json');
$post_container->addPost(new Post($author, $date, $title, $content));
$post_container->flushToFile('../dataFiles/data.json');

header('Location: ../index.php');

?>



