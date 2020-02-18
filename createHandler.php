<?php 
 
require('functions.php');
require('header.php');
$data = [$_GET['author'], date('M d, Y'), $_GET['title'], $_GET['content']];
createEntry($data);

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



