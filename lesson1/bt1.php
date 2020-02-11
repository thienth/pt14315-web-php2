<?php 
require_once './NhanVien.php';
require_once './Animal.php';
// $vinh = new NhanVien();
// $vinh->nhapThongTin("nguyen thanh vinh", "13 Trinh Van Bo", "vinhnt@fpt.edu.vn", "0987654321", "Tien Sy");

// $vinh->hienThiThongTin();
// echo Animal::$hairColor;
// Animal::$hairColor = 'green';
// echo "<br>";
// echo Animal::$hairColor;
// echo "<br>";

// Animal::testStatic();
$vinh = Animal::testStatic('nguyen van a');
$vinh->getInfo()




 ?>