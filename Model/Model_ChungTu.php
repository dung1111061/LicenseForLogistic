<?php
/**
 * 
 */
class Model_ChungTu extends Table
{
	static public $tableName = "tblchungtu";
	public $id; // id
	public $docName;
	public $theDayReceived;
	public $theCustomersName;
	public $theCommodity;
	public $theDeclarationsNo;
	public $filesNo;
	public $portOfDestination;
	public $portOfLoading;
	public $volume;
	public $salesName;
	public $logisticsName;
	public $transportaionsName;
	public $theDayComplete;

	/**
	 * [__construct description]
	 * @param string $id [description]
	 */
	function __construct($id="") {

		//
		if($id){
			$this->findAndAssign($id);
						
		} else{
			// setting default value to properties

		}


	}	

	/**
	 * [createNew description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	function createNew($data){
		// 
		if( !$this->insert($data) ) return false;

		//
		$id = Dbvs2::getInstance()->lastInsertId();

		$this->findAndAssign($id);

		// $this->id = $id;
		// Note: other properties is not actually be assign 
		// It needs to be assigned again by 
		// $this = new self($id);
		
		return true;
	}

	// function audit($data){
	// 	// 
	// 	if( !$this->update($data) ) return false;

	// 	//
	// 	return true;
	// }
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
		$this->docName = $data["docName"];
		$this->theDayReceived = $data["theDayReceived"];
		$this->theCustomersName = $data["theCustomersName"];
		$this->theCommodity = $data["theCommodity"];
		$this->theDeclarationsNo = $data["theDeclarationsNo"];
		$this->filesNo = $data["filesNo"];
		$this->portOfDestination = $data["portOfDestination"];
		$this->portOfLoading = $data["portOfLoading"];
		$this->volume = $data["volume"];
		$this->salesName = $data["salesName"];
		$this->logisticsName = $data["logisticsName"];
		$this->transportaionsName = $data["transportaionsName"];
	}

//==============================	
	
	// Form in tao moi chung tu view
	function getDatafromForm(){

		// Note: properties is here is not actually be assigned
		// 		 , just meaning temporary variable for data array
		// $data["docName"] 			= postIndex('creater');
		$data["theDayReceived"] 	= postIndex('ngayhangden_di');
		$data["theCustomersName"] 	= postIndex('tenkhachhang');
		$data["theCommodity"] 		= postIndex('sanpham');
		$data["theDeclarationsNo"] 	= postIndex('sotokhai');
		$data["filesNo"] 			= postIndex('sofiles');
		$data["portOfDestination"]  = postIndex('destination');
		$data["portOfLoading"]  	= postIndex('loading');
		$data["volume"] 			= postIndex('volume');
		$data["salesName"] 			= postIndex('saler');
		$data["logisticsName"] 		= postIndex('logisticer');
		$data["transportaionsName"] = postIndex('transporter');

		return $data;
	}
}