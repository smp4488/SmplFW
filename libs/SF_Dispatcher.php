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
		try{
			include('modules/' . $moduleName . '/actions/actionsClass.php');
			$moduleClass = $moduleName.'Actions';
			$actions = new $moduleClass($actionName);
			$actions->preExecute();
			call_user_func(array($actions, 'execute'. ucfirst($actionName)));
			
		}
		catch(Exception $e){
			//no module found;
			echo("No Module Found!");
		}
	}
}
?>