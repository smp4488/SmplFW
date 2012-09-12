<?php
class SF_Request{
	
	function SF_Request(){
		$requestURI = explode('/', $_SERVER['REQUEST_URI']);
		$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
		unset($requestURI[0]);//remove blank spot
		$requestURI = array_values($requestURI);
		$moduleName = $requestURI[0];
		$action = $requestURI[1];
		$params = array_slice($requestURI, 2);
		$this->module = new SF_Module($moduleName,$action,$params);	
	}
	
	function getModule(){
		return $this->module;
	}

}
?>