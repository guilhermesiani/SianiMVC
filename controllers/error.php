<?php
namespace Controllers;

use Libs;

/**
* 
*/
class Error extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->msg = 'Esta página não existe';
		$this->view->render('error/index');
	}

}