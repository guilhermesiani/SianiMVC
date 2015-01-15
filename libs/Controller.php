<?php
namespace Libs;

/**
* 
*/
abstract class Controller
{
	
	function __construct()
	{
		$this->view = new View();
	}

	public function loadModel($name) 
	{
		$path = 'models/'.$name.'_model.php';

		if(file_exists($path)) {
			require 'models/'.$name.'_model.php';

			$modelName = '\\Models\\' . $name . '_Model';
			$this->model = new $modelName;
		}
	}

	abstract public function index();
}