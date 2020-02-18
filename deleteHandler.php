<?php 
 
require('functions.php');
require('header.php');

$file_data = readJson('data.json');

$data1 = $_GET['delete0'];
$data2 = $_GET['delete1'];

echo $data1;
echo $data2;

if($data1 == '1'){
	
	deleteEntry(0);
}

if($data2 == '1'){
	
	deleteEntry(1);
}

?>


<body>
<?php require('nav_bar.php'); ?>

<div class="form-class">
	
	<h1>Post deleted!</h1>
	
</div>
</body

<?php
require('footer.php');
?>