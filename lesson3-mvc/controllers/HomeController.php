<?php
namespace Controllers;
use Models\User;
class HomeController extends BaseController {

	public function index(){

	    $this->render('home.list');
//		$users = User::getAll();
//
////		include_once './views/home/index.php';
//        $this->render('home.index', ['users' => $users]);
	}

	public function about(){
		echo "day la trang gioi thieu";
	}

	public function contact(){
		echo "day la trang lien he";
	}
}


 ?>