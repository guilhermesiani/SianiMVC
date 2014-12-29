<?php
namespace Models;

use Libs;

/**
* 
*/
class Note_Model extends \Libs\Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function noteList()
	{
		return $this->db->select('SELECT * FROM note WHERE userid = :userid', 
			array(':userid' => $_SESSION['userid']));
	}

	public function noteSingleList($noteid)
	{
		return $this->db->select('SELECT * FROM note WHERE userid = :userid AND noteid = :noteid', 
			array(':userid' => $_SESSION['userid'], ':noteid' => $noteid));
	}	

	public function create($data)
	{
		$this->db->insert('note', array(
			'title' => $data['title'],
			'userid' => $_SESSION['userid'],
			'content' => $data['content'],
			'date_added' => date('Y:m:d H:i:s')
		));	
	}

	public function editSave($data)
	{
		$postData = array(
			'title' => $data['title'],
			'content' => $data['content']
		);

		$this->db->update('note', $postData, 
			"`noteid` = {$data['noteid']} AND `userid` = {$_SESSION['userid']}");	
	}	

	public function delete($id)
	{
		$this->db->delete('note', "`noteid` = {$id} AND `userid` = {$_SESSION['userid']}");
	}	
}