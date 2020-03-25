<?php
/**
 * 
 */
class Model_ThucHien extends Table
{
	static public $tableName = "tblthuchien";

	public $id; // id
	public $idChungTu;
	public $idUser;
	public $trangThai;
	public $ngayNhan;
	public $ngayHoanThanh;

	function __construct($id="") {

		
		//
		if($id){
			// find object
			$data = self::find1record(array("id"=>$id));
			
			//
			self::findAndAssign($id);

		} else{
			// setting default value

		}


	}	
	
	function createNew($data){
		//
		return $this->insert($data);
		//
	}
//==============================
	/**
	 * [findAndAssign description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	protected function findAndAssign($id){
		// find object and assign to properties
		$data = self::find1record(array("id"=>$id));

		$this->id = $data["id"];
		$this->idChungtu = $data["idChungTu"];
		$this->idUser = $data["idUser"];
		$this->trangThai = $data["trangThai"];
		$this->ngayNhan = $data["ngayNhan"];
		$this->ngayHoanThanh = $data["ngayHoanThanh"];
	}

#=============================
	/**
	 * [getLicensebyUser Chung tu dang xu li boi user $iduser]
	 * @param  [type] $idUser [description]
	 * @return [type]         [description]
	 */
	static function getLicensebyUser($idUser,$trangThai){
		$condition = array("idUser"=>$idUser,"trangThai"=>$trangThai);
		$data = self::find($condition);
		return $data;
	}


	function done($ngayHoanThanh){
		$condition = array("id" => $this->id);
		$data = array("ngayHoanThanh" => $ngayHoanThanh,"trangThai" => 2);
		return self::update($condition,$data);
	}


}