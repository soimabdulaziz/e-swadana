<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
	}
	public function index()
	{
		$this->template->load('template', 'maps');
	}
}
