<?php
	
class errorActions extends SF_Controller
{
	//Exectued for all actions in the class
	public function preExecute(){

	
	}
	
	public function executeIndex(){

	}
	
	public function execute404(){
	    $this->title = 'SmplFW Error | 404';
  	}
  	
	public function postExecute(){

	}
}

?>