<?php
namespace Models;

use Libs;

/**
* 
*/
class Login_Model extends \Libs\Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function run()
	{
		$sth = $this->db->prepare("SELECT userid, role FROM user WHERE 
			username = :username AND password = :password");

		$sth->execute(array(
			':username' => $_POST['username'],
			':password' => \Libs\Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
		));

		$data = $sth->fetch();

		$count = $sth->rowCount();

		if($count > 0) {
			// login
			\Libs\Session::init();
			\Libs\Session::set('role', $data['role']);
			\Libs\Session::set('loggedIn', true);
			\Libs\Session::set('userid', $data['userid']);
			header('location: ../dashboard');
		} else {
			header('location: ../login');
		}
	}
}