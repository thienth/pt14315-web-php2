<?php 
class BaseModel{

	function __construct(){
		$host = "127.0.0.1";
		$dbname = "pt14315-web";
		$dbusername = "root";
		$dbpass = "123456";
		$this->connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpass);
	}

	static function all(){
		$model = new static();
		$model->querybuilder = "select * from " . $model->table;
		// var_dump($model);die;
		$stmt = $model->connect->prepare($model->querybuilder);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
		return $data;
	}
}

 ?>