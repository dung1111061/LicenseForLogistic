<?php
/**
 * 
 */
class Model_ChungTuLoaiPhi extends Table
{
	static public $tableName = "chungtuloaiphi";

	public $maChungTu; // id
	public $maLoaiPhi;
	public $gia;
	public $idUser;

	function __construct($maChungTu="",$maLoaiPhi="") {

		//
		if($maChungTu){
			// find object
			if($maLoaiPhi){
				$this->findAndAssign($maChungTu,$maLoaiPhi);
			} 				
		}

		// setting default value


	}	
	
	function createNew($data){
		// 
		if( !$this->insert($data) ) return false;

		//
		$this->findAndAssign($data["maChungTu"],$data["maLoaiPhi"]);

		return true;
	}


	function audit($data){
		//
		$data["maChungTu"] = $this->maChungTu;
		$data["maLoaiPhi"] = $this->maLoaiPhi;

		// 
		if( !$this->update($data) ) return false;

		//
		return true;
	}
//==============================
	/**
	 * [findAndAssign description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	protected function findAndAssign($maChungTu,$maLoaiPhi){
		// find object and assign to properties
		$data = self::find1record(array("maChungTu"=>$maChungTu,"maLoaiPhi"=>$maLoaiPhi));

		$this->maChungTu = $data["maChungTu"];
		$this->maLoaiPhi = $data["maLoaiPhi"];
		$this->gia = $data["gia"];
		$this->idUser = $data["idUser"];
	}

//==========================================================
	// 
	static function getByChungTu($chungTu){

		$condition = array("maChungTu" => $chungTu);
		return self::find($condition);
	}

	// Form in view of "tao moi chung tu" 
	static function getDatafromForm($maChungTu){
		$dataArray = array();

		$phi_list = $_POST["maloaiphi"];
		$gia_list = isset($_POST["gia"]) ? $_POST["gia"]: null;
		if( empty($phi_list) ) return $dataArray;
		// $gia_list = postIndex('gia');
		for ($i = 0; $i < count($phi_list); $i++){
			$dataArray[$i] = array("maChungTu"=>$maChungTu,"maLoaiPhi"=>$phi_list[$i],"idUser"=>$_SESSION["admin_login"]["idUser"],"gia" => $gia_list[$i]);
		}
		return $dataArray;
		
	}

}