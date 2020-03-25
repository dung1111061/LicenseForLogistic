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
		$condition  = [
		    'maChungTu' => $this->maChungTu,
		    'maLoaiPhi' => $this->maLoaiPhi
		];
		// 
		if( !$this->update($condition,$data) ) return false;

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
		// echo "<pre>";print_r($phi_list);print_r($gia_list); exit();
		if( empty($phi_list) ) return $dataArray;

		for ($i = 0; $i < count($phi_list); $i++){
			$dataArray[$i] = array("maChungTu"=>$maChungTu,"maLoaiPhi"=>$phi_list[$i],"gia" => $gia_list[$phi_list[$i]]);
		}
		return $dataArray;
		
	}

}