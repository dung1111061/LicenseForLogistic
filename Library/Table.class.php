<?php
abstract class Table extends Dbvs2
{
	static public $tableName;

	static function find($condition_arr){
		// Build SQL command
	    $place_holders = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');
	    
	    $values = array_values($condition_arr);

	    $sql = "select * from ".static::$tableName." WHERE ".$place_holders;

	    //
		return self::selectQuery($sql,$values);
	}

	static function find1record($condition_arr){
		// Build SQL command
	    $place_holders = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');
	    
	    $values = array_values($condition_arr);

	    $sql = "select * from ".static::$tableName." WHERE ".$place_holders;

	    //
		return self::selectQuery($sql,$values)[0];
	}

	static function getAll(){
		return self::selectQuery("select * from ".static::$tableName);
	}

	/**
	 * Build INSERT sql command and pass data array to updateQuery API
	 * arr: data array
	 * return: true if success or false if failed
	 */
	function insert($arr){

	    // SQL partition
	    $key = implode(array_keys($arr),',');
	    $place_holders = implode(',', array_fill(0, count($arr), '?'));
	    $values = array_values($arr);

	    // 
	    $sql = "INSERT INTO ".static::$tableName." ($key) VALUES ($place_holders);";
	    
	    /* Debug Infomation of execute PDOstm */
	    // echo "<b>SQL query string</b><br>&nbsp&nbsp&nbsp&nbsp" . $sql; echo "<br>"; 
	    // echo "<pre><b>Parameter</b><br>&nbsp&nbsp&nbsp&nbsp";
	    // var_dump($arr); echo "<br>";
	    /* Debug Infomation of execute PDOstm */

	    //
	    $result = self::updateQuery($sql,$values);
	    if($result == 1) return true;
	    else return false;

  	}
  	//
  	function update($condition_arr,$update_arr){

  		// Key and Placeholders of update partition
	    $parameter_update_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($update_arr), array_fill(0, count($update_arr), '?')),',');

	    // Key and Placeholders of condition partition
	    $parameter_condition_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');

	    // Values of update and condition partition
	    $values = array_values(array_merge($update_arr,$condition_arr));

	    //
	    $sql = "UPDATE ".static::$tableName." SET $parameter_update_arr WHERE $parameter_condition_arr";
    
    /* Debug Infomation of execute PDOstm */
    // echo "<b>SQL query string</b><br>&nbsp&nbsp&nbsp&nbsp" . $sql; echo "<br>"; 
    // echo "<pre><b>Parameter</b><br>&nbsp&nbsp&nbsp&nbsp";
    // print_r( array_merge($update_arr,$condition_arr)); echo "<br>";
    /* Debug Infomation of execute PDOstm */
    

  		$result = self::updateQuery($sql,$values);
	    if($result == 1) return true;
	    else return false;
  	}

  	// inject data from _POST to properties of object
  	abstract function createNew( $data );

  	//
  	// abstract function auditObject( $data );
}