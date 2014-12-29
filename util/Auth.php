<?php
namespace Util;

/**
* 
*/
class Auth
{
	
	public static function handLeLoggin()
	{
		@session_start();
		$logged = $_SESSION['loggedIn'];
		if($logged == false) {
			session_destroy();
			header('location: login');
			exit;
		}		
	}
}