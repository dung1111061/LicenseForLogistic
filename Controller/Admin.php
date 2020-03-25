<?php
class Admin
{
	public $model;
	function __construct()
	{
		if (!isset($_SESSION['admin_login']))
		{
			$_SESSION['flash']="Khong duoc phep truy cap...";

			//header('location:login.html');
			echo "Không được phép truy cập! ";
			echo "<a href=login.html>Đăng nhập</a>";
			exit;
		}

		$action = getIndex('action', 'index');

		//print_r($_GET);
		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function {$this->action} "; exit;}
	}

	function index()
	{
		$data =array();
		$admin_sub_view='admin_index.php';
		include ROOT ."/View/admin_layout1.php";
	}
	//================================================
	function hienthi_taochungtumoi()
	{

		$user = new Model_User();
		$salerList       = $user->getByRole(2);
		$logisticerList  = $user->getByRole(3);
		$transporterList = $user->getByRole(4);

		$loaiphi = new Model_LoaiPhi();
		$data = $loaiphi->get();
		$admin_sub_view='admin_taochungtumoi.php';
		include ROOT ."/View/admin_layout1.php";
	}
	

	function hienthi_chungtucanchinhsua() {

		// filter list chungTu o trang thai can chinh sua trong bang thuc hien
		$trangThai = 1;
		$chungTuIDList = Model_ThucHien::getLicensebyUser($_SESSION["admin_login"]["idUser"],$trangThai);

		$chungTuList = array();
		for ($i = 0; $i < count($chungTuIDList); $i++){
			$chungTuList[] = new Model_ChungTu( $chungTuIDList[$i]);
		}

		// 
		$admin_sub_view='admin_listchungtucanchinhsua.php';
		include ROOT ."/View/admin_layout1.php";
	}

	function hienthi_chungtuchuahoanthanh() {

		// filter list chungTu o trang thai ... trong bang thuc hien
		$trangThai = 0;
		$data = Model_ThucHien::getLicensebyUser($_SESSION["admin_login"]
											["idUser"],$trangThai);

		$chungTuIDList = array_column($data,"idChungTu"); 
		$thucHienList = array_column($data,"id");

		$chungTuList = array();
		for ($i = 0; $i < count($chungTuIDList); $i++){
			$chungTuList[$i] = new Model_ChungTu( $chungTuIDList[$i] );
	
		}

		// 
		$admin_sub_view='admin_listchungtuchuahoanthanh.php';
		include ROOT ."/View/admin_layout1.php";
	}

	function hienthi_chitietchungtu() {
		//
		$user = new Model_User();
		$salerList       = $user->getByRole(2);
		$logisticerList  = $user->getByRole(3);
		$transporterList = $user->getByRole(4);

		//
		$chungTu = new Model_ChungTu($_GET["id"]);
		
		//
		$phi = Model_ChungTuLoaiPhi::getByChungTu($chungTu->id);

		//
		$loaiphi = new Model_LoaiPhi();
		$data = $loaiphi->get();
		
		$admin_sub_view='admin_chitietchungtu.php';
		include ROOT ."/View/admin_layout1.php";
	}
//============================================

	function process_UpdateChungTu(){
		//
		$this->updateChungTu();

		//
		header('location: index.php?controller=Admin&action=hienthi_chungtuchuahoanthanh');
	}

	function process_luuchungtumoi(){
		
		//
		$this->taochungtumoi();

		//
		header('location: index.php?controller=Admin&action=hienthi_chungtuchuahoanthanh');
	}

	// Done thuc hien 1, tao thuc hien 2 cho role tiep theo
	function process_banGiaoChungTu(){
		
		// 
		$idThucHien = $_GET["idThucHien"];
		$idChungTu = $_GET["id"];

		// done thuc hien 1
		$thucHien = new Model_ThucHien($idThucHien);
		$ngayHoanThanh = getTimeStamp('Y-m-d');
		$thucHien->done($ngayHoanThanh);


		// 
		if($_SESSION["admin_login"]["idRole"] == 1) {
			$idNguoiNhan = (new Model_ChungTu($idChungTu))->salesName;
		} elseif ($_SESSION["admin_login"]["idRole"] == 2) {
			$idNguoiNhan = (new Model_ChungTu($idChungTu))->logisticsName;
		} elseif ($_SESSION["admin_login"]["idRole"] == 3) {
			$idNguoiNhan = (new Model_ChungTu($idChungTu))->transportaionsName;
		} elseif ($_SESSION["admin_login"]["idRole"] == 4) {
			$chungTu = new Model_ChungTu($idChungTu);
			$data["theDayComplete"] = getTimeStamp('Y-m-d');
			if( !$chungTu->audit($data) ){
				$message = "<b style='color:red'>".Dbvs2::$stm->errorInfo()[2]."</b> <br>";
				throw new Exception($message);
			}
			return; 
		}

		// tao mot thuc hien moi
		$ngayNhan = $ngayHoanThanh;
		$thucHien2 = new Model_ThucHien();
		$trangThai = 0;
		$data = array("idChungTu"=>$idChungTu,"idUser"=>$idNguoiNhan,"ngayNhan" => $ngayNhan,"trangThai" =>$trangThai) ;
		$thucHien2->createNew($data);
		
		//
		header('location: index.php?controller=Admin&action=hienthi_chungtuchuahoanthanh');
	}

//======================================

	function taochungtumoi(){

		// tao chung tu
		$chungTu = new Model_ChungTu();
		$data = $chungTu->getDatafromForm();
		$data["docName"] = $_SESSION["admin_login"]["idUser"];
		if( !$chungTu->createNew($data) ){
			$message = "<b style='color:red'>".Dbvs2::$stm->errorInfo()[2]."</b> <br>";
			throw new Exception($message);
		}

		// Tick vao cac loai phi
		$loaiPhi_list = Model_ChungTuLoaiPhi::getDatafromForm($chungTu->id);

		foreach ($loaiPhi_list as $record) {
			$record["idUser"] = $_SESSION["admin_login"]["idUser"];
			$chungTuLoaiPhi = new Model_ChungTuLoaiPhi();
			if( ! $chungTuLoaiPhi->createNew($record) ) {
				$message = "<b style='color:red'>".Dbvs2::$stm->errorInfo()[2]."</b> <br>";
				throw new Exception($message);
			}
			
		}

		// tao mot thuc hien moi
		$ngayNhan = getTimeStamp('Y-m-d');
		$trangThai = 0;
		$thucHien = new Model_ThucHien();
		$data = array("idChungTu"=>$chungTu->id,"idUser"=>$_SESSION["admin_login"]["idUser"],"ngayNhan" => $ngayNhan,"trangThai" =>$trangThai);

		if( !$thucHien->createNew( $data ) ){
			$message = "<b style='color:red'>".Dbvs2::$stm->errorInfo()[2]."</b> <br>";
			throw new Exception($message);
		}

		//
		return $chungTu;	
	}

	function updateChungTu(){
		$idChungTu = $_GET["id"];

		// Not allow to audit chung tu
		$chungTu = new Model_ChungTu($idChungTu);
		// $data = $chungTu->getDatafromForm();
		// if( !$chungTu->audit($data) ){
		// 	$message = "<b style='color:red'>".Dbvs2::$stm->errorInfo()[2]."</b> <br>";
		// 	throw new Exception($message);
		// }

		// Them cac loai phi moi tick
		$PhiMoi_list = Model_ChungTuLoaiPhi::getDatafromForm($chungTu->id);

		$PhiCu_list  = Model_ChungTuLoaiPhi::getByChungTu($chungTu->id);

		$maLoaiPhiCu_list  = array_column($PhiCu_list, "maLoaiPhi");
		// echo "<pre>";print_r($PhiMoi_list); exit();
		foreach ($PhiMoi_list as $record) {
			// Them cac loai phi moi tick
			if( !in_array($record["maLoaiPhi"] , $maLoaiPhiCu_list) ){
				$record["idUser"] = $_SESSION["admin_login"]["idUser"];
				$phi = new Model_ChungTuLoaiPhi();
				if( !$phi->createNew($record) ) {
					$message = "<b style='color:red'>".Dbvs2::$stm->errorInfo()[2]."</b> <br>";
					throw new Exception($message);
				}

			} else { // Cac loai phi cu
				$phi = new Model_ChungTuLoaiPhi($chungTu->id,$record["maLoaiPhi"]);
				
				// Them gia
				if( !$phi->audit( array("gia" => $record["gia"]) ) ) {
					$message = "<b style='color:red'>".Dbvs2::$stm->errorInfo()[2]."</b> <br>";
					throw new Exception($message);
				}
			} 
				
			
		}


	}
}