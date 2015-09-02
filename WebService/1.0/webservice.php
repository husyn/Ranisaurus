<?php 
require_once 'private/mcontroller.php';

$modelClass = "modelControllerClass";
$model = new $modelClass();

$className = "api";
$webservice = new $className();
$webservice->index($model);//passing helper objects of model class

class api {
	
	function index($model)
	{
		switch ($_REQUEST['action']) {
			
			case 'getcategories':
				$model->getcategories($_REQUEST);
				break;
				
			case 'gettagline':
				$model->gettagline($_REQUEST);
				break;
				
			case 'addtagline':
				$model->addtagline($_REQUEST);
				break;
				
			case 'getall':
				$model->getAllData($_REQUEST);
				break;
				
			default:								
				$model->showArray('-1','Unknown action');
			break;
		}
	}
}
?>