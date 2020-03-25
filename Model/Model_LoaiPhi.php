<?php
/**
 * 
 */
class Model_LoaiPhi extends Db
{
	static public $tableName = "loaiphi";
	public $maLoaiPhi; // maLoaiPhi
	public $hienthi;
	public $thuTu;
	public $ghiChu;
	public $tenLoaiPhi;


	// lay tat ca loai phi duoc liet ke 
	function get()
	{
		$role = $_SESSION['admin_login']['idRole'];
		if ($role==3)
		$stm = $this->conn->prepare("select * from ".static::$tableName." order by thuTu asc");
	 else
	 	$stm = $this->conn->prepare("select * from ".static::$tableName." where hienThi=1 order by thuTu asc");
		$stm->execute();
		return $stm->fetchAll();
	}

	// them loai phi moi
	
	
}