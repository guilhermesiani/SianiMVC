<?php
namespace Libs;

/**
* classe Bootstrap
*/
class Bootstrap
{
	
	function __construct()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);

		// print_r($url);

		if(empty($url[0])) {
			require 'controllers/index.php';
			$controller = new \Controllers\Index();
			$controller->loadModel('index');
			$controller->index();
			return false;
		}

		$file = 'controllers/' . $url[0] . '.php';
		if(file_exists($file)) {
			require $file;
		} else {
			$this->error();
			exit();
		}

		$inst = '\\Controllers\\' . $url[0];
		$controller = new $inst;
		$controller->loadModel($url[0]);

		// Chamando os métodos
		if(isset($url[2])) {
			if(method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);				
			} else {
				$this->error();
				exit();
			}
		} else {
			if(isset($url[1])) {
				if(method_exists($controller, $url[1])) {				
					$controller->{$url[1]}();
				} else {
					$this->error();
					exit();
				}
			} else {
				$controller->index();
			}
		}
	}

	/**
	 * método Error
	 * É chamado quando um controlador ou seu método ñ existir
	 */
	public function error()
	{
		require 'controllers/error.php';
		$controller = new Error();
		$controller->index();
		return false;
	}

}