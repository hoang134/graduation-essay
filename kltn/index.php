<?php
require_once "dangnhap/dangnhapc.php";
class index {
	public function index() {
		$ind=new dangnhapc();
		$ind->dangnhap();
	}
}
$d=new index();
$d->index();
?>