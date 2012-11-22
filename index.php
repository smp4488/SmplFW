<?php
error_reporting(-1);
include 'libs/SF_Module.php';
include 'libs/SF_Request.php';
include 'libs/SF_Dispatcher.php';
require_once 'libs/spyc.php';

//echo("SmplFW Initialized!");
$request = new SF_Request();
$module = $request->getModule();

$module = !is_null($module) ? $module : new SF_Module('error','404');

$dispatcher = new SF_Dispatcher($module);
$dispatcher->Dispatch();
?>