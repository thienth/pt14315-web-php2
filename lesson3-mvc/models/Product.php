<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    protected $table = "products";

    public $fillable = ['name', 'cate_id', 'price', 'short_desc', 'detail', 'views'];

    public function getCategoryName(){
        $cate = Category::find($this->cate_id);
        if($cate){
            return $cate->cate_name;
        }

        return null;
    }
}

?>