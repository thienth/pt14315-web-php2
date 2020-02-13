<?php 
require_once './models/Product.php';
class ProductController
{
	
	public function index()
	{
		$products = Product::getAll();

		include_once './views/home/list-product.php';
	}

	public function detail(){
		echo "day la trang chi tiet san pham";
	}
}


 ?>