<?php 

// require_once './Product.php';
// require_once './User.php';
// $allProduct = Product::all();
// echo "<pre>";
// var_dump($allProduct);

class A {
	public $name = "Minh";
	private $gender = "female";

	public function getGender(){
		return $this->gender;
	}
}

class B extends A{
	
}




$a = new A();
// echo $a->name;
// $a->name = "Long";
// echo $a->name;
var_dump($a->getGender());die;








 ?>