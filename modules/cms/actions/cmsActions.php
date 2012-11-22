<?php
	
class cmsActions extends SF_Controller
{
	//Exectued for all actions in the class
	public function preExecute(){

	
	}
	
	public function executeIndex(){
	    $this->title = "SmplFW CMS Action!";
	    $this->model = new SF_Model();
      $this->model->getDb('cms', 'cmsModel');
      echo('DB Created! </br>');
      //$this->model->createTable('Test', array(array('name'=>'TestField1','type'=>'string'),array('name'=>'TestField2','type'=>'string')));
      //echo('Table Created! </br>');
      //$this->model->InsertInto('Test', array('TestField1','TestField2'), array('value1','value2'));
      //echo('Data Inserted! </br>');
      $this->model->queryData('Test', array('TestField1','TestField2'));

	}

	public function executeNewModule(){
	    $this->title = "SmplFW CMS | New Module";
	    $moduleName = !is_null($_POST['moduleName']) ? $_POST['moduleName'] : false;
	    if($moduleName){
	    	$templates = array('actions' => '_support/moduletemplates/actions.php.template', 
	    						'models' => '_support/moduletemplates/models.php.template', 
	    						'templates' => '_support/moduletemplates/template.php.template');
	    	
	    	mkdir('modules/'.$moduleName);

	    	foreach ($templates as $name => $path) {	    	
		    	
		    	mkdir('modules/'.$moduleName . '/'.$name);

		    	//Read Teamplate
				$handle = fopen($path, 'r');
				$data = fread($handle,filesize($path));
				$data = str_replace('[[MODULENAME]]', $moduleName, $data);
				fclose($handle);
				//Write to new file
				switch ($name) {
					case 'actions':
						$templateName = 'Actions';
						break;
					case 'models':
						$templateName = 'Model';
						break;
					case 'templates':
						$templateName = 'Success';
						break;	
					default:
						$templateName = null;
						break;
				}

				$actionsFile = "modules/" . $moduleName . "/" . $name . "/". $moduleName . $templateName .".php";
				$fh = fopen($actionsFile, 'w+') or die("can't open file");
				fwrite($fh, $data);
				fclose($fh);
			}						
	    }

	}	
}

?>