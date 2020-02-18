<?php

require('functions.php');

$posts = readJson('data.json');

$id = $_GET['id'];

if(!isset($_GET['id'])){
	die('No id: go back to the <a href="index.php">Home page</a>');
}

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id']>=count($posts)){
	die('Invalid: go back to the <a href="index.php">Home page</a>');
	
}

require("header.php");

?>


<body>
	
<?php require_once('nav_bar.php'); ?>
	
	

<?= '<div class="full-post-style"><p class="post-header-style">Posted by '.$posts[$id][0].' on: ' .$posts[$id][1].'</p><hr><h2>'.$posts[$id][2].'</h2><br><p>'.$posts[$id][3].'</p></div></a>'; ?>


  
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>