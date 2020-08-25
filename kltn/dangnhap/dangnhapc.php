<?php
include "dangnhapv.php";
include "dangnhapm.php";
/**
 * 
 */
class dangnhapc
{
	
	public function dangnhap()
	{
		$this->kiemtradangnhap();
	}

	public function kiemtradangnhap() {
		if(isset($_POST["btnsubmit"])) {
			$b=new dangnhapm();
			if($b->kiemtra($_POST["username"],$_POST["password"])==1)
			{
				header('Location:trangchusv/trangchusvv.php');
			}
			else if($b->kiemtra($_POST["username"],$_POST["password"])==2)
			{
				header('Location:trangchugv/trangchugvv.php');
			}
			else
				return;
		}
	}
}

?>