<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('_default');

		$this->output->section('header', '__admintemplate/_header');
		$this->output->section('sidebar', '__admintemplate/_sidebar');
		$this->output->section('footer', '__admintemplate/_footer');
		$this->output->section('js', '__admintemplate/_js');
	}

	public function index()
	{
		$data = array('');

		$this->load->view('dashboard/index', $data, FALSE);
	}

	public function test_dynamic_menu()
	{
		$this->output->unset_template('_default');

		print_r($this->ubd_admin_dynamic_menu->create_menu());
	}

}

/* End of file Dashboard.php */
/* Location: .//C/xampp/htdocs/Project/ubd-cms/ubd-modules/ubd-admin/controllers/Dashboard.php */