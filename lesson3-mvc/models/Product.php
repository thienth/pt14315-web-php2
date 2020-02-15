<?php
require_once "./models/BaseModel.php";
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
                . " (name, cate_id, price, short_desc, detail, views) "
                . " values "
                . " ('$this->name', '$this->cate_id', '$this->price', 
                            '$this->short_desc', '$this->detail', '$this->views' )";
            $stmt = $this->connect->prepare($insertQuery);
            $stmt->execute();
            return true;
        }catch (Exception $ex){
            var_dump($ex->getMessage());
            return false;
        }
    }
}

?>