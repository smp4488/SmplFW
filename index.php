<?php
error_reporting(-1);
include 'libs/SF_Module.php';
include 'libs/SF_Request.php';
include 'libs/SF_Dispatcher.php';
//require_once 'libs/spyc.php';

echo("SmplFW Initialized!");
$request = new SF_Request();
$module = $request->getModule();

$dispatcher = new SF_Dispatcher($module);
$dispatcher->Dispatch();
?>