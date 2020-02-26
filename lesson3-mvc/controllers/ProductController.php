<?php 
namespace Controllers;
use Models\Category;
use Models\Product;

class ProductController extends BaseController
{
	
	public function index()
	{
		$products = Product::all();

        $this->render('product.index', compact('products'));
	}
	public function remove(){
	    // nhận tham số id trên đường dẫn
        $proId = isset($_GET['id']) == true ? $_GET['id'] : -1;
        if($proId < 0){
            header('location: ' . BASE_URL . "products");
            die;
        }
        // sử dụng model để thực hiện xóa dựa vào id với bảng products
        $msg = Product::destroy($proId) == true ? "Xóa thành công!" : "Xóa không thành công!";
        // điều hướng website về danh sách sản phẩm
        header("location: " . BASE_URL . "products?msg=$msg");
    }

    public function addForm(){
	    $cates = Category::all();
	    $this->render('product.add-product', compact('cates'));
    }

    public function editForm(){
	    $id = $_GET['id'];
	    $model = Product::find($id);
	    $cates = Category::all();
        $this->render('product.edit-product', compact('model', 'cates'));
    }

    public function saveProduct(){
	    $data = $_POST;
	    $model = new Product();
        $model->fill($data);
        // nhận ảnh upload lên từ trình duyệt
        $model->image  = customUploadFile($_FILES['image']);
        $model->save();
        header("location: " . BASE_URL . "products?msg=Thêm sản phẩm thành công");
        die;
    }

    public function saveEditProduct(){
	    $data = $_POST;
	    $model = Product::find($data['id']);
        $model->fill($data);
        // nhận ảnh upload lên từ trình duyệt
        $filename = customUploadFile($_FILES['image']);
        $model->image  = $filename == null ? $model->image : $filename;
        $model->save();
        header("location: " . BASE_URL . "products?msg=Thêm sản phẩm thành công");
        die;
    }

    public function checkName(){
	    $name = $_POST['name'];

        // phục vụ cho màn hình update, kiểm tra tên với những sản phẩm khác id gửi lên
        $id = isset($_POST['id']) ? $_POST['id'] : false;

        $checkQuery = Product::where('name', $name);
        if($id != false){
            $checkQuery->where('id', '!=', $id);
        }
        $result = $checkQuery->count();
        if($result == 0){
            echo "true";
        }else{
            echo "false";
        }
    }
}


 ?>