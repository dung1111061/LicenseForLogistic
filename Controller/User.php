<?php

class User
{
	public  $model, $action;

	function __construct()
	{
		$action= getIndex('action', 'index');
		$this->model = new Model_User();

		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function. {$this->action} "; exit;}
		
	}

/**
 * [index description]
 * @return [type] [description]
 */
function index()
	{
		echo "Chua xd user page";
		exit();
	}


}