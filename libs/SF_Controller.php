<?php

class SF_Controller
{
	var $action;
	
	function SF_Controller(&$action)
	{
		$this->action = $action;
	}
	
	function _default()
	{
	}

	function _error()
	{
	}
	
	function execute()
	{
	
	}
}
?>