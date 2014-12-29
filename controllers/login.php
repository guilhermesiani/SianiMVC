<?php
namespace Controller;

use Libs;

/**
* 
*/
class Login extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('login/index');		
	}

	function run()
	{
		$this->model->run();
	}
}