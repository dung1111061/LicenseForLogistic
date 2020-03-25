<?php
/**
 * Build Atomic SQL command
 */
abstract class SQLCommand extends DB
{
  // protected $tablename;
  protected static $tablename = "not defined";
  protected static $primary_key = "not defined";
  
  function selectSQL($field_list=array(),$primary_table="",$primary_field_list=array()){
      if(empty($field_list)){
        $fields="*";

      } else {
        // convert to string fields
        $fields = implode( array_map(function($field) { return static::$tablename.".$field"; }, $field_list), ',');
        
        if(!empty($primary_field_list) && !empty($primary_table)){
          array_walk($primary_field_list,function(&$field,$key,$prefix) { $field = $prefix.".$field"; }, 
                      $primary_table);
          $fields = $fields .",". implode( $primary_field_list, ',');
        }

      }

      return "SELECT $fields FROM ".static::$tablename;
  }

  function innerJoin($foreign_key,$primary_key,$primary_table){
    $constraint = " INNER JOIN $primary_table ON "
                   .static::$tablename.".$foreign_key = $primary_table.$primary_key";
    return $constraint;
  }

  /**
   * [getInformationSchema get database stuture information of quanlibanhang_offical]
   * @param  [type] $information_table [Table in information_schema database ]
   * @param  [type] $condition         [condition defined as string]
   * @return [type]                    [Table in information_schema database]
   */
  function getInformationSchema($information_table,$condition=""){
    $sql ="Select * FROM INFORMATION_SCHEMA.$information_table WHERE TABLE_NAME LIKE '".static::$tablename."' AND TABLE_SCHEMA = 'quanlibanhang_offical' $condition";
    return self::fetchAll($sql);
  }

  /**
   * [getConstraint description]
   * @param  [type] $foreign_key [description]
   * @return [type]              [description]
   */
  function getConstraint($foreign_key){
    $condition = "AND REFERENCED_TABLE_NAME IS NOT NULL";
    $structure = self::getInformationSchema('KEY_COLUMN_USAGE',$condition);
    $element   = $structure[array_search($foreign_key, array_column($structure, 'COLUMN_NAME'))];
    return array($element["REFERENCED_TABLE_NAME"],$element["REFERENCED_COLUMN_NAME"]);
  }

  /**
   * [getDefaultObject description]
   * @return [type] [description]
   */
  function getDefaultObject(){
    $defaults = self::getInformationSchema('Columns');
    return array_column($defaults, 'COLUMN_DEFAULT', 'COLUMN_NAME');
  }

}

/**
 *  Table on Database and API for query database
 *  Example: admin
 *  id | user | password | name
 *  1  | admin| admin    | Joe
 *  ...
 *  SQL command interface for control data in tables.
 */
abstract class Table extends SQLCommand
{
  // protected $tablename;
  protected static $tablename = "not defined";
  protected static $primary_key = "not defined";
  protected static $stored_stm;
  protected static $timestamp = FALSE;

  /**
   * [get all data on table] 
   * @param  [type] $sql [description]
   * @param  array  $arr [description]
   * @return [2d table]      [description]
   */
  static function getAll(){
    $sql = "select * from ".static::$tablename;
    return self::fetchAll($sql); 
  }

  /**
   * [insert 1 record]
   * @param  [1d array] $arr [data array: key = field, value = record]
   * @return [type]      [description]
   */
  function insert($arr){

    // 2020-3-2 Put time stamp flag
    if(static::$timestamp) self::addTimeStamp($arr);

    // SQL partition
    $key = implode(array_keys($arr),',');
    $place_holders = implode(',', array_fill(0, count($arr), '?'));
    $values = array_values($arr);

    // 
    $sql = "INSERT INTO ".static::$tablename." ($key) VALUES ($place_holders);";
    
    /* Debug Infomation of execute PDOstm */
    echo "<b>SQL query string</b><br>&nbsp&nbsp&nbsp&nbsp" . $sql; echo "<br>"; 
    echo "<pre><b>Parameter</b><br>&nbsp&nbsp&nbsp&nbsp";
    var_dump($arr); echo "<br>";
    /* Debug Infomation of execute PDOstm */

    //
    self::$stored_stm = self::execute($sql,$values);
    return self::$stored_stm;

  }

  /**
   * [update description]
   * @param  [1d array] $condition_arr [condition array:key = field, value = record]
   * @param  [1d array] $update_arr    [data array: key = field, value = record]
   * @return [type]                [stm statement]
   */
  function update($condition_arr,$update_arr){

    // 2020-3-2 Put time stamp flag
    if(static::$timestamp) self::updateTimeStamp($update_arr);

    // Key and Placeholders of update partition
    $parameter_update_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($update_arr), array_fill(0, count($update_arr), '?')),',');

    // Key and Placeholders of condition partition
    $parameter_condition_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($condition_arr), array_fill(0, count($condition_arr), '?')),' and ');

    // Values of update and condition partition
    $values = array_values(array_merge($update_arr,$condition_arr));

    //
    $sql = "UPDATE ".static::$tablename." SET $parameter_update_arr WHERE $parameter_condition_arr";
    
    /* Debug Infomation of execute PDOstm */
    echo "<b>SQL query string</b><br>&nbsp&nbsp&nbsp&nbsp" . $sql; echo "<br>"; 
    echo "<pre><b>Parameter</b><br>&nbsp&nbsp&nbsp&nbsp";
    print_r( array_merge($update_arr,$condition_arr)); echo "<br>";
    /* Debug Infomation of execute PDOstm */
    
    // execute
    self::$stored_stm = self::execute($sql,$values);
    return self::$stored_stm;
  }
}