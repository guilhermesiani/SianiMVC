<?php
namespace Controller;

use Libs;

/**
* 
*/
class User extends \Libs\Controller
{
	
	public function __construct()
	{
		parent::__construct();
		Auth::handLeLoggin();
	}

	public function index()
	{
		$this->view->userList = $this->model->userList();
		$this->view->render('user/index');
	}

	public function create()
	{
		$data = array(
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'role' => $_POST['role']
		);

		// @TODO: Faça seu error checking!

		$this->model->create($data);
		header('location: ' . URL . 'user');
	}

	public function edit($id)
	{
		// Fetch user individualmente
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('user/edit');
	}

	public function editSave($id)
	{
		$data = array(
			'userid' => $id,
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'role' => $_POST['role']
		);

		// @TODO: Faça seu error checking!

		$this->model->editSave($data);		
		header('location: ' . URL . 'user');
	}

	public function delete($id)
	{
		$this->model->delete($id);
		header('location: ' . URL . 'user');
	}		
}