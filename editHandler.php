<?php 

session_start();
if(!isset($_SESSION['username'])){
	header('Location: login.php');
}

require('functions.php');
require('header.php');

$id = $_GET['id'];

$data = ['author' => $_GET['author'], 'date' => date('M d, Y'), 'title' => $_GET['title'], 'content' => $_GET['content']];
editEntry($id, $data, 'data.json');

?>


<body>
<?php require('nav_bar.php'); ?>

<div class="form-class">
	
	<h1>Post sucessfully edited!</h1>
	
</div>

</body

<?php
require('footer.php');
?>
