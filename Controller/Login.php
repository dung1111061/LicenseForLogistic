<?php
class Login
{
	function __construct()
	{
		if (!isset($_SESSION)) session_start(); 
		$action = getIndex('action', 'index');
		//unset($_SESSION['admin_login']);
		// if ($action !='logout')
		// {
		// 	if ($this->isUserLogin())
		// 	{
		// 		header('location:index.html'); exit;
		// 	}
		// 	if ($this->isAdminLogin())
		// 	{
		// 		header('location:admin.php'); exit;
		// 	}
		// }

		$this->model = new Model_User();
		if (method_exists($this,$action))
			$this->$action();
		else {
			echo "Chua xd function {$this->action} "; exit;
			}
	}

	function isUserLogin()
	{
		return !empty($_SESSION['user_login'])?true:false;
	}

	function isAdminLogin()
	{
		return !empty($_SESSION['admin_login'])? true:false;
	}

	function index(){

		include "View/login.php";
	}

	function dologin()
	{
		
		$u = postIndex('email');
		$p = postIndex('password');
		if ($u==''){			header('location:login.html'); exit;	}
		$p= md5($p);

		$row = $this->model->getByIdPass($u, $p);
		//print_r($row); exit;

		if (Count($row)>0)//kg co trong table user
		{
			/*$row2 = $this->model->getAdminByIdPass($u, $p);
			if (Count($row2)==0)
				$_SESSION['flash']='Khong tin sai!';
			else 
			{*/
				$_SESSION['admin_login']= $row;
				header('location:admin.php');
				exit;
			//}
		}
		else 
		{
			$_SESSION['user_login']= $row;
				header('location:index.html');
				exit;
		}
	
	header('location:login.html');
}

function logout()
	{
		unset($_SESSION['user_login']);
		unset($_SESSION['admin_login']);
		header('location:index.html');
	}

}