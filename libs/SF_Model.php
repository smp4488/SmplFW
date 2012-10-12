<?php

class SF_Model
{
	
	function SF_Model()
	{

	}
	
	public function getDb($module, $model)
	{
    try
    {
      //create or open the database
      $this->database = new SQLiteDatabase('modules/'.$module.'/models/'.$model.'.sqlite', 0666, $error);
    }
    catch(Exception $e)
    {
      die($error);
    }	    
	}
  
  function createTable($tableName, $fields){
    //add table to database
    $query = 'CREATE TABLE ' . $tableName . ' (';
    $fieldString = array();     
    foreach($fields as $field){
      array_push($fieldString, $field['name']. ' '.$field['type']);
    }
    
    $query = $query . implode(',',$fieldString).')';

    if(!$this->database->queryExec($query, $error))
    {
      die($error);
    }
    
  }
    
  function InsertInto($tableName,$fields,$values){

    $query = 'INSERT INTO ' . $tableName . ' (';
   
    $query = $query . implode(',',$fields).') ';
    
    $query = $query . 'VALUES ("' . implode('","',$values).'")';

    if(!$this->database->queryExec($query, $error))
    {
      die($error);
    }    
          
  }
  
  function queryData($tableName,$fields){
    //read data from database
    $query = "SELECT ";
    $query = $query . implode(',',$fields) . " FROM " . $tableName;
    
    if($result = $this->database->query($query, SQLITE_BOTH, $error))
    {
      while($row = $result->fetch())
      {
        print("Test1: {$row['TestField1']} <br />" .
              "Test2: {$row['TestField2']} <br />");
      }
    }
    else
    {
      die($error);
    }    
  }

}
?>