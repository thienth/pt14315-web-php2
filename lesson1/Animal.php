<?php 
// tạo là lớp động vật 
class Animal{

	// tên
	var $name;
	// tuổi
	var $age;
	// màu lông
	
	// cân nặng
	var $weight;

	const MAX_AGE = 30;
	static $hairColor = "red";

	static function testStatic($name){
		$model = new static();
		$model->name = $name;
		return $model;
	}

	function getInfo(){
		echo "Hello " . $this->name;
	}
}

 ?>