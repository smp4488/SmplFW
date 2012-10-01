<?php
	
class blogActions extends SF_Controller
{
	//Exectued for all actions in the class
	public function preExecute(){

	
	}
	
	public function executeIndex(){
	    $this->title = $this->parameters['blogName'];

	}
	
	public function executeSingle(){
	    $this->title = $this->parameters['blogName']." | " . $this->parameters['title'];
	    //var_dump($this->parameters);
	    //exit();
	}
}

?>