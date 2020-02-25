<?php
namespace Models;
use Exception;
class Product extends BaseModel{
    protected $table = "products";

    public $fillable = ['name', 'cate_id', 'price', 'short_desc', 'detail', 'views'];

    // sẽ move sang BaseModel
    public function fill($data){
        foreach ($this->fillable as $col){
            $this->{$col} = $data[$col];
        }
    }

    // đọc kỹ hàm này
    public function insert(){
        try{
            $insertQuery = "insert into " . $this->table
                . " (name, cate_id, price, short_desc, detail, views, image) "
                . " values "
                . " ('$this->name', '$this->cate_id', '$this->price', 
                            '$this->short_desc', '$this->detail', '$this->views',
                             '$this->image')";
//            dd($insertQuery);
            $stmt = $this->connect->prepare($insertQuery);
            $stmt->execute();
            return true;
        }catch (Exception $ex){
            var_dump($ex->getMessage());
            return false;
        }
    }
    public function update(){
        try{
            $updateQuery = "update " . $this->table
                . " set
                        name = '$this->name', 
                        cate_id = '$this->cate_id', 
                        price = '$this->price', 
                        short_desc = '$this->short_desc', 
                        detail = '$this->detail', 
                        views = '$this->views', 
                        image = '$this->image' 
                    where id = $this->id";
            $stmt = $this->connect->prepare($updateQuery);
            $stmt->execute();
            return true;
        }catch (Exception $ex){
            var_dump($ex->getMessage());
            return false;
        }
    }
}

?>