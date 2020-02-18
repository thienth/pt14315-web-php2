<?php
namespace Controllers;
use Models\User;
class HomeController{

	public function index(){
		$users = User::getAll();
		
		include_once './views/home/index.php';
	}

	public function about(){
		echo "day la trang gioi thieu";
	}

	public function contact(){
		echo "day la trang lien he";
	}
}


 ?>