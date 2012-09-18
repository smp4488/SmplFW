<?php
	
class cmsActions extends SF_Controller
{
	//Exectued for all actions in the class
	public function preExecute(){

	
	}
	
	public function executeIndex(){
	    $this->title = "SmplFW CMS Action!";
	    $this->model = new SF_Model();

	}
}

?>