<?php
namespace Controllers;

use Libs;

/**
* 
*/
class Index extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// echo Hash::create('sha256', 'jesse', HASH_PASSWORD_KEY);
		$this->view->render('index/index');		
	}
	
}