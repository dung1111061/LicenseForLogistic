<?php
class Dbvs2
{

	static public  $stm=null; //statement of lasted sql command
  public static $instance = NULL;
  public static function getInstance() {
    if (!isset(self::$instance)) {
      try {
        self::$instance = new PDO("mysql:host=". HOST_DB.";dbname=". DB, USER_DB,PASS_DB);
        self::$instance->query('set names utf8');
        // if (ERRMODE['debug']) self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $ex) {
        die($ex->getMessage());
      }
    }
    return self::$instance;
  }

	function getTable($tableName)
	{
		$stm = self::getInstance()->prepare("select * from $tableName");
		$stm->execute();
		return $stm->fetchAll();
	}

	static function selectQuery($sql, $arr=array(),$type="table")
	{
		$stm = self::getInstance()->prepare($sql);
		$stm->execute($arr);
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
	
	function updateQuery($sql, $arr=array())
	{
		$stm = self::getInstance()->prepare($sql);
		$stm->execute($arr);
		self::$stm = $stm;
		return $stm->rowCount();
	}
	
}