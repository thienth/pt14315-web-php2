<?php 
/**
 * 
 */
class Product
{
	var $host = "127.0.0.1";
	var $dbname = "pt14315-web";
	var $dbusername = "root";
	var $dbpass = "123456";

	function __construct(){
		$this->connect = new PDO("mysql:host=" 
			. $this->host . ";dbname=" 
			. $this->dbname . ";charset=utf8",
			$this->dbusername, 
			$this->dbpass);
	}

	const MAX_AGE = 100;
	function totalPrice($amount){
		echo "Bạn đang mua $amount sản phẩm";
	}
	
}


 ?>