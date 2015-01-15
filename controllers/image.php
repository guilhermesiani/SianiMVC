<?php
namespace Controllers;

use Libs;

/**
* Class Image
*/
class Image extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(isset($_FILES['image'])) {

			$this->image = new \Libs\Image();

			try {
				$this->image->folder = 'profile';
				$image = $this->image->upload($_FILES);

				print_r($image);
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}

		$this->view->render('image/index');
	}	
}