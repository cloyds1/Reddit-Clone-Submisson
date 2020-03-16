<?php
	
	require_once('jsonDatabaseUtil.php');
	
	class User {
		
		private $username;
		private $password;
		private $bio;
		
		//public $followers;
		//public $likes;
		
		public function __construct($username, $password, $bio /*, $followers, $likes*/){
			
			$this->username = $username;
			$this->password = $password;
			
			$this->bio = $bio;
			//$this->followers = $followers;
			//$this->likes = $likes;
			
		}
		
		public function displayBio(){
			
			echo '
			
			<div class="full-post-style" style="text-align: center">
			
			<h1>'.$this->username.'</h1><br><div class="bio">'.$this->bio.'
			
			<form action="bio.php" method="post">
				
				<textarea name="bio">'.$this->bio.'</textarea>
				<br>
				<input type="submit" value="submit">
				<input type="reset" value="Reset">
				
			</form>
			
			</div>
			
			';
			
		}
		
		
		
		public function getUsername(){
			return $this->username;
		}
		
		public function getPass(){
			return $this->password;
		}
		
		public function getBio(){
			return $this->bio;
		}
		
		public function getData(){
			$data = ['username' => $this->username, 'password' => $this->password, 'bio' => $this->bio];
			return $data;
			
		}
	}
	
	class UserContainer {
		
		private $users;
		
		public function __construct($file_name){ //creates empty Usercontainer if no valid filename is given
			
			if(file_exists($file_name)){
				
				$this->users = [];
				foreach(DatabaseUtil::readJson($file_name) as $user){
					array_push($this->users, new User($user['username'], $user['password'], $user['bio']));
				}
				
			}
			
			else{
				$this->users = [];
			}
				
		}
		
		public function addUser($user /*user object*/){
			
			array_push($this->users, $user);
			
		}
		
		public function removeUser($id){
			
			unset($this->users[$id]);
			array_values($this->users);
			
		}
		
		
		public function findUser($username, $password){
	
			
			$password = hash('sha256', $password);
	
			$message = 0;
			foreach($this->users as $user){
				
				if(($user->getUsername() == $username) and ($user->getPass() == $password)){
					return 1;
				}
			
				if($user->getUsername() == $username){
					$message = 2;
				}
			}
	
			return $message;
	
		}
		
		public function flushToFile($file_name){
			
			$user_data = [];
			foreach($this->users as $user){
				
				array_push($user_data, $user->getData());
				
			}
			
			DatabaseUtil::writeJson($file_name, $user_data);
		
		}
		
	}
	
	class Post{
		
		public $author;
		public $date_created;
		public $title;
		public $content;
		
		//public $replies;
		//public $likes;
		
		public function __construct($author, $date_created, $title, $content){
			
			$this->author = $author;
			$this->date_created = $date_created;
			$this->title = $title;
			$this->content = $content;
			
			//$this->replies = $replies;
			//$this->likes = $likes;
		}
		
		public function echoPostFull(){
			
			echo '<div class="full-post-style"><p class="post-header-style">Posted by '.$this->author.' on: '
			.$this->date_created.'</p><hr><h2>'.$this->title.'</h2><br><p>'.$this->content.'</p></div>'; 
		
		}
		
		public function echoPostList($id){
			
			echo '<a href="rsrc/detail.php?id='.$id.'"><div class="post-style box"><p class="post-header-style">Posted by '.$this->author.' on: '
			.$this->date_created.'</p><hr><h2>'.$this->title.'</h2><br><p>'.$this->content.'</p></div></a>'; 
		
		}
		
		public function getData(){
			
			return ['author' => $this->author, 'date' => $this->date_created, 'title' => $this->title, 'content' => $this->content];
			
		}
		
		public function getAuthor(){
			return $this->author;
		}
		
		public function getDateCreated(){
			return $this->date_created;
		}
		
		public function getTitle(){
			return $this->title;
		}
		
		public function getContent(){
			return $this->content;
		}
		
		public function setTitle($title){
			$this->title = $title;
		}
		
		public function setContent($content){
			$this->content = $content;
		}
		
	}
	
	
	
	class PostContainer{
		
		private $posts;
		public function __construct($file_name){ //creates empty PostContainer if no valid filename is given
			
			if(file_exists($file_name)){
				
				$this->posts = [];
				foreach(DatabaseUtil::readJson($file_name) as $post){
					array_push($this->posts, new Post($post['author'], $post['date'], $post['title'], $post['content']));
				}
				
			}
			
			else{
				$this->posts = [];
			}
				
		}
		
		public function addPost($post){
			array_push($this->posts, $post);
		}
		
		public function removePost($i){
			
			unset($this->posts[$i]);
			array_values($this->posts);
			
		}
		
		public function editPost($id, $title, $content){
			
			$this->posts[$id]->setTitle($title);
			$this->posts[$id]->setContent($content);
			
		}
		
		public function getPosts(){
			return $this->posts;
		}
		
		public function getPostAtId($id){
			return $this->posts[$id];
		}
		
		
		
		public function echoPostsDelete($session_data){
			
			if(count($this->posts) > 0){
				
				echo '<div><form action="deleteHandler.php" method="post">';
				
				for($count = 0; $count < count($this->posts); $count++){
					if($this->posts[$count]->getAuthor() != $session_data['username']){continue;}
					
						echo '<div class="full-post-style"><p class="post-header-style">Posted by '
						.$this->posts[$count]->getAuthor().' on: ' .$this->posts[$count]->getDateCreated().
						'</p><hr><h2>'.$this->posts[$count]->getTitle().'</h2><br> Delete? <input type="checkbox" 
						name="id[]" value="'.$count.'"></div>';
					
					}
					
				echo '<span style="margin-left: 25%;"><input type="submit" value="Submit"><input type="reset" value="Reset"></span></form></div>';
				
			}
			
			else{
				
				echo "<h2 class='full-post-style'>We're sorry, but there doesn't seem to be anything to delete right now.</h2>";
				
			}
		}
		
		public function echoPostsEdit($session_data){
			
			if(count($this->posts) > 0){
		
				for($count = 0; $count < count($this->posts); $count++){
					if($this->posts[$count]->getAuthor() != $session_data['username']){continue;}
					echo '<a href="editForm.php?id='.$count.'"><div class="full-post-style box">
					<p class="post-header-style">Posted by '.$this->posts[$count]->getAuthor().' on: '
					.$this->posts[$count]->getDateCreated().'</p><hr><h2>'.$this->posts[$count]->getTitle().'</h2><br>
					</div></a>';
							
				}
				
				
			}
					
			else{
				echo "<h2 class='full-post-style'>We're sorry, but there doesn't seem to be anything to edit right now.</h2>";
			}
		}
		
		public function flushToFile($file_name){
			
			$post_data = [];
			foreach($this->posts as $post){
				array_push($post_data, $post->getData());
			}
			
			DatabaseUtil::writeJson($file_name, $post_data);
	
		}
	}
		
		
		

	
	
		


?>