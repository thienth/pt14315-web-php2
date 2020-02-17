<?php
require_once './commons/utils.php';
require_once './controllers/HomeController.php';
require_once './controllers/ProductController.php';

$url = isset($_GET['url']) == true ? $_GET['url'] : '/';

switch ($url) {
	case '/':
		$ctr = new HomeController();
		$ctr->index();
		break;
	case 'gioi-thieu':
		$ctr = new HomeController();
		$ctr->about();
		break;
	case 'lien-he':
		$ctr = new HomeController();
		$ctr->contact();
		break;
	case 'san-pham':
		$ctr = new ProductController();
		$ctr->index();
		break;
	case 'remove-product':
		$ctr = new ProductController();
		$ctr->remove();
		break;
	case 'add-product':
		$ctr = new ProductController();
		$ctr->addForm();
		break;
	case 'edit-product':
		$ctr = new ProductController();
		$ctr->editForm();
		break;
	case 'save-product':
		$ctr = new ProductController();
		$ctr->saveProduct();
		break;
	case 'chi-tiet-san-pham':
		$ctr = new ProductController();
		$ctr->detail();
		break;
	case 'check-product-existed':
		$ctr = new ProductController();
		$ctr->checkName();
		break;
	default:
		# code...
		break;
}


 ?>