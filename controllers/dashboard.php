<?php
namespace Controller;

use Libs;

/**
* 
*/
class Dashboard extends \Libs\Controller
{
	
	function __construct()
	{
		parent::__construct();
		Auth::handLeLoggin();
		
		$this->view->js = array('/dashboard/js/default.js');
	}

	function index()
	{
		$this->view->render('dashboard/index');
	}

	function logout()
	{
		Session::destroy();
		header('location: '. URL .'login');
		exit;
	}

	function xhrInsert()
	{
		$this->model->xhrInsert();
	}

	function xhrGetListings()
	{
		$this->model->xhrGetListings();
	}

	function xhrDeleteListing()
	{
		$this->model->xhrDeleteListing();
	}

}