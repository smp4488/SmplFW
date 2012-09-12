<?php
class SF_Module
{
	var $moduleName = '';
	var $action = '';
	var $parameters = array();
	
	function SF_Module($moduleName, $action, $parameters){
		$this->moduleName = $moduleName;
		$this->action = $action;
		$this->parameters = $parameters;
	}
	
	function getModuleName(){
		return $this->moduleName;
	}
	
	function getAction(){
		return $this->action;
	}
	
	function getParameters(){
		return $this->parameters;
	}
}
	
?>