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

	public function other()
	{
		if(isset($_FILES)) {
			$this->image->folder = 'clientes';
			try { 
				$image = $this->image->upload($_FILES);

				print_r($image);
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
	}
}