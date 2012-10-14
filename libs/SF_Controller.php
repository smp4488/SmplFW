<?php
include 'libs/SF_Model.php';

class SF_Controller {
	var $module;
	var $action;

	function SF_Controller($module, $action, $parameters) {
		$this->module = $module;
		$this->action = $action;
		$this->parameters = $parameters;
	}

	function _default() {
		$includesFile = Spyc::YAMLLoad('./config/SF_Includes.yml');
		$this->styleSheets = $includesFile['styleSheets'];
		$this->javaScripts = $includesFile['javaScripts'];

		method_exists($this, 'preExecute') ? $this->preExecute() : false;//Pre Execute for all actions in the requested module

		call_user_func(array($this, 'execute' . ucfirst($this->action)));//Call the action of the module

		$this->actionTemplate = 'modules/' . $this->module . '/templates/'. $this->action .'Success.php';
		include('templates/layout.php');//Include base layout

		method_exists($this, 'postExecute') ? $this->postExecute() : false;
	}

	public function addStyleSheet($url) {
		array_push($this->styleSheets, $url);
	}

	public function addJavascript($url) {
		array_push($this->javaScripts, $url);
	}	

	function _error() {

	}
}
?>
