<?php
include 'libs/SF_Controller.php';

class SF_Dispatcher
{
	var $module;
	
	function SF_Dispatcher(&$module)
	{
		$this->module = $module;
	}

	function Dispatch()
	{
		$moduleName = $this->module->getModuleName();
		$actionName = $this->module->getAction();
		$parameters = $this->module->getParameters();
		
		try{
			include('modules/' . $moduleName . '/actions/'. $moduleName .'Actions.php');
			$moduleClass = $moduleName.'Actions';
			$actions = new $moduleClass($moduleName,$actionName, $parameters);
			$actions->_default();
			
		}
		catch(Exception $e){
			//no module found;
			echo("No Module Found!");
		}
	}
}
?>