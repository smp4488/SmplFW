<?php
	
class blogActions extends SF_Controller
{
	//Exectued for all actions in the class
	public function preExecute(){

	
	}
	
	public function executeIndex(){
	    $this->title = "SmplFW Blog Index Action!";

	}
	
	public function executeSingle(){
	    $this->title = "SmplFW Blog Single Action!";
	}
}

?>