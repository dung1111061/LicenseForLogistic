<?php
/**
 * Connection to Database
 */
class DB
{

  private static $instance = NULL;
  public static function getInstance() {
    if (!isset(self::$instance)) {
      try {
        self::$instance = new PDO('mysql:host=localhost;dbname='.dbname, username, password);
        self::$instance->exec("SET NAMES 'utf8'");
        // if (ERRMODE['debug']) self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $ex) {
        die($ex->getMessage());
      }
    }
    return self::$instance;
  }
   
// New features
// 2020/01/04
// API for execute sql command

  /**
   * [Executes a prepared statement]
   * @param  [type] $sql [description]
   * @param  array  $parameter [description]
   * @return [PDOstatement]   [ statement or result of execute TRUE on success or FALSE on failure. ]
   */
   function execute($sql,$parameter=array(),$returned_flag=""){
    $stm  = self::getInstance()->prepare($sql);
    $stm->execute($parameter);
    
    return $stm; 
  }

/** [Execute sql command and fetchAll data ]
 * @param  $sql command as argument for PDO->prepare()
 * @param  $parameter parameter array for PDO->execute()
 * @return PDO->fetchAll()
 */
   function fetchAll($sql,$parameter=array()){
    return self::execute($sql,$parameter)->fetchAll(PDO::FETCH_ASSOC);
  }

/** [Execute sql command and fetch data ]
 * @param  $sql command as argument for PDO->prepare()
 * @param  $parameter parameter array for PDO->execute()
 * @return PDO->fetch()
 */
   function fetch($sql,$parameter=array()){
    return self::execute($sql,$parameter)->fetch();
  }
/** [Execute sql command and fetch data ]
 * @param  $sql command as argument for PDO->prepare()
 * @param  $parameter parameter array for PDO->execute()
 * @return PDO->rowCount()
 */
   function getRowCount($sql,$parameter=array()){
    return self::execute($sql,$parameter)->rowCount();
  }
  
}