<?php



function editEntry($id, $data, $file_name){
	
	$file_data = readJson($file_name);
	print_r($file_data);
	echo'<br>';
	print_r($data);
	echo'<br>'.$id;

	if(isset($file_data[$id])){
		
		 $file_data[$id] = $data;
	
	}
	
	else{
		echo 'index doesn\'t exist';
		return false;
		
	}
	
	writeJson($file_name, $file_data);
	
}

?>