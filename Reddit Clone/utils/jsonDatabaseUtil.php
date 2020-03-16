<?php
	
	class DatabaseUtil{
		
		static function createEntry($data, $file_name){
	
			//!open & read file
			$file_data = self::readJson($file_name);
	
			if($file_data == NULL){
				$file_data = [$data];
			}
	
			else{
				array_push($file_data, $data);
			}
			
			//!append entry
			self::writeJson($file_name, $file_data);
	
	
		}
		
		static function deleteEntry($id=[], $file_name){
	
	
			if(count($id) < 1){
				return True;
			}
			
			$file_data = self::readJson($file_name);
			
			
			$temp_data = [];
			for($count=0; $count < count($file_data); $count++){
				
				if(!in_array($count, $id)){
					
					array_push($temp_data, $file_data[$count]);
					
				}
			}
			
			self::writeJson($file_name, $temp_data);
			
			return True;
	
	
		}
		
		static function editEntry($id, $data, $file_name){
	
			$file_data = self::readJson($file_name);

			if(isset($file_data[$id])){
				
				 $file_data[$id] = $data;
			
			}
			
			else{
				echo 'index doesn\'t exist';
				return false;
				
			}
			
			self::writeJson($file_name, $file_data);
	
		}
		
		static function readJson($file_name){
	
			if(file_exists($file_name)){
				$array = json_decode(file_get_contents($file_name), true);
				
				if(is_array($array)){
					return $array;
				}
				else {
					return [];
				}
				
			}
			
			else{
				return array();
			}
		}

		static function writeJson($file_name, $data=[]){
	
			//!encode all data
			$new_data = json_encode($data, JSON_PRETTY_PRINT);
			
			
			
			//!write to file
			$handle = fopen($file_name, 'w');
			fwrite($handle, $new_data);
			
			
			
			//!close file
			fclose($handle);
	
	
		}
		
		
	}
?>