<?php 



require('functions.php');
require('header.php');

$id = $_GET['id'];

$data = [$_GET['author'], date('M d, Y'), $_GET['title'], $_GET['content']];
editEntry($id, $data);

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
