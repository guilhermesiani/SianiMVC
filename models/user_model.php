<?php
namespace Models;

use Libs;

/**
* 
*/
class User_Model extends \Libs\Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function userList()
	{
		return $this->db->select('SELECT userid, username, role FROM user');
	}

	public function userSingleList($userid)
	{
		return $this->db->select('SELECT userid, username, role FROM user WHERE userid = :userid', array(':userid' => $userid));
	}	

	public function create($data)
	{
		$this->db->insert('user', array(
			'username' => $data['username'],
			'password' => \Libs\Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		));	
	}

	public function editSave($data)
	{
		$postData = array(
			'username' => $data['username'],
			'password' => \Libs\Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		);

		$this->db->update('user', $postData, "`userid` = {$data['userid']}");	
	}	

	public function delete($userid)
	{
		$result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));
		
		if($result[0]['role'] == 'owner')
			return false;

		$this->db->delete('user', "userid = $userid");
	}
}