<?php
	
class cmsActions extends SF_Controller
{
	//Exectued for all actions in the class
	public function preExecute(){

	
	}
	
	public function executeIndex(){
	    $this->title = "SmplFW CMS Action!";
	    $this->model = new SF_Model();
      $this->model->getDb('cms', 'cmsModel');
      echo('DB Created! </br>');
      //$this->model->createTable('Test', array(array('name'=>'TestField1','type'=>'string'),array('name'=>'TestField2','type'=>'string')));
      //echo('Table Created! </br>');
      //$this->model->InsertInto('Test', array('TestField1','TestField2'), array('value1','value2'));
      //echo('Data Inserted! </br>');
      $this->model->queryData('Test', array('TestField1','TestField2'));

	}
}

?>