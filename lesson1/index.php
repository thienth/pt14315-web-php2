<?php 
require_once './Animal.php';
require_once './Product.php';
/*
$rex = new Animal();
$rex->name = 'Nguyễn Văn Rex';
$rex->age = 12;
$rex->hairColor = "tím";
$rex->weight = 45;

$meo = new Animal();
$meo->name = 'Milu';
$meo->age = 39;
$meo->hairColor = "vằn vện";
$meo->weight = 32;
*/
// $iphone = new Product();

// $iphone->name = "iPorn 6 plus";
// $iphone->price = 3000;
// $iphone->modelNo = "x007";
// echo "Bạn đang mua sản phẩm " . $iphone->name;
// echo "<br>";
// $iphone->totalPrice(3);

// echo Animal::MAX_AGE;
// echo "<br>";
// echo Product::MAX_AGE;
$lili = new Animal("lili", 17, "green", 47);
var_dump($lili);











 ?>