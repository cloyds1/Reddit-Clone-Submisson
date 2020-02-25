<?php 
 
require('functions.php');
require('header.php');
$data = ['author' => $_GET['author'], 'date' => date('M d, Y'), 'title' => $_GET['title'], 'content' => $_GET['content']];
createEntry($data, 'data.json');

?>


<body>
<?php require('nav_bar.php'); ?>

<div class="form-class">
	
	<h1>Post sucessfully created!</h1>
	
</div>
</body

<?php
require('footer.php');
?>



