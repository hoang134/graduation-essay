<?php
require_once "core/PDOData.php";
use core\data\model\PDOData;
class dangnhapm {
	public function kiemtra($u,$p) {
		$db = new PDOData();
		$data=$db->doQuery("SELECT role FROM ac WHERE user = '$u' AND pass = '$p'");
		if(count($data)>0) {
			{
				foreach ($data as $row)
					return $row["role"];
			}
		}
		else {
			return 0;
		}
	}
}
?>