<?php 
 
session_start();

require('../utils/fileUtil.php');
require('../utils/deleteUtil.php');

if(!isset($_SESSION['username'])){
	header('Location: ../login/login.php');
}

$id = $_POST['id'];

deleteEntry($id, '../dataFiles/data.json');
	
require('../rsrc/header.php');
?>


<body>
<?php require('../rsrc/nav_bar.php'); ?>

<div class="form-class">
	
	<h1>Posts deleted!</h1>
	
</div>
</body

<?php
require('../rsrc/footer.php');
?>