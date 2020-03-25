<?php
class Model_User extends Db
{
	static public $tableName="tbluser";

	function get()
	{
		return $this->getTable('book');
	}

	function getById($userName)
	{
		return $this->selectQuery('select * from '.static::$tableName.' where idUser=? ', array($userName));
	}

	function getByIdPass($userName, $pass)
	{
		$arr = array($userName, $pass);
		$data= $this->selectQuery('select * from '.static::$tableName.' where idUser=? and pass=?', $arr);

		if (Count($data)==0) return array();
		return $data[0];
	}

	function getByRole($idRole)
	{
		$data= $this->selectQuery('select * from '.static::$tableName.' where idRole=?', array($idRole) );

		return $data;
	}

	function getAdminByIdPass($userName, $pass)
	{
		$arr = array($userName, $pass);
		$data= $this->selectQuery('select * from admin where userName=? and password=?', $arr);
		
		if (Count($data)==0) return array();
		return $data[0];
	}
	
}