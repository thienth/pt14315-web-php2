<?php 
require_once './models/Product.php';
require_once './models/Category.php';
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
	public function remove(){
	    // nhận tham số id trên đường dẫn
        $proId = isset($_GET['id']) == true ? $_GET['id'] : -1;
        if($proId < 0){
            header('location: ' . BASE_URL . "san-pham");
            die;
        }
        // sử dụng model để thực hiện xóa dựa vào id với bảng products
        $msg = Product::destroy($proId) == true ? "Xóa thành công!" : "Xóa không thành công!";
        // điều hướng website về danh sách sản phẩm
        header("location: " . BASE_URL . "san-pham?msg=$msg");
    }

    public function addForm(){
	    $cates = Category::getAll();
	    include_once './views/home/add-product.php';
    }

    public function editForm(){
	    $id = $_GET['id'];
	    $model = Product::findOne($id);
	    $cates = Category::getAll();

	    include_once './views/home/edit-product.php';
    }

    public function saveProduct(){
	    $data = $_POST;
	    $model = new Product();
        $model->fill($data);
        $model->insert();
        header("location: " . BASE_URL . "san-pham?msg=Thêm sản phẩm thành công");
        die;
    }

    public function checkName(){
	    $name = $_GET['name'];
        $sql = "select * from products where name = '$name'";
        $result = Product::customQuery($sql, false);
        if($result == null){
            echo json_encode("true");
        }else{
            echo "false";
        }
    }
}


 ?>