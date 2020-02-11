<?php 
class NhanVien{
	var $ten;
	var $diaChi;
	var $email;
	var $soDienThoai;
	var $bangCap;
	function __construct($ten = "", 
							$diaChi = "",
							$email = "",
							$soDienThoai = "",
							$bangCap = ""){
		$this->ten = $ten;
		$this->diaChi = $diaChi;
		$this->email = $email;
		$this->soDienThoai = $soDienThoai;
		$this->bangCap = $bangCap;
	}

	function hienThiThongTin(){
		echo "Ho va ten: " . $this->ten;
		echo "<br>";
		echo "Dia chi: " . $this->diaChi;
	}

	function nhapThongTin($ten = "", 
							$diaChi = "",
							$email = "",
							$soDienThoai = "",
							$bangCap = ""){
		$this->ten = $ten;
		$this->diaChi = $diaChi;
		$this->email = $email;
		$this->soDienThoai = $soDienThoai;
		$this->bangCap = $bangCap;
	}
}


 ?>