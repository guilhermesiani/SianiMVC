<?php
namespace Controllers;

use Libs;

/**
* 
*/
class Help extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->render('help/index');
	}
}