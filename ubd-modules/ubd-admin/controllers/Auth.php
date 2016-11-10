<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_init();

		$this->load->helper('captcha');
		$this->load->library('form_validation');
	}

	private function _init()
	{
		$this->output->set_template('_default');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) 
		{
			redirect(base_url('dashboard'));
		} 
		else 
		{
			$this->login();
		}
	}

	public function login()
	{
		$data = array(
			'captcha' => $this->create_captcha(), 
		);

		$this->load->view('auth/index', $data, FALSE);
	}

	public function check_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required', array('required' => '%s tidak boleh kosong'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => '%s tidak boleh kosong'));
		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required', array('required' => '%s tidak boleh kosong'));

		if ($this->check_captcha($this->input->post('captcha')) == FALSE) 
		{
			$authResponse = array(
				'ResponMesage' => 'Captcha yang anda masukan salah atau captcha tidak boleh kosong',
				'ResponColor' => 'danger',
				'ResponTitle' => 'Gagal login!',
				'ResponCode' => 0);

			$_SESSION['ResponColor']  = $authResponse['ResponColor'];
			$_SESSION['ResponTitle']  = $authResponse['ResponTitle'];
			$_SESSION['ResponMesage']  = $authResponse['ResponMesage'];
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('ubd-admin'));
		}
		else if ($this->form_validation->run() == FALSE) 
		{
			$authResponse = array(
				'ResponMesage' => validation_errors(),
				'ResponColor' => 'danger',
				'ResponTitle' => 'Gagal login!',
				'ResponCode' => 0);

			$_SESSION['ResponColor']  = $authResponse['ResponColor'];
			$_SESSION['ResponTitle']  = $authResponse['ResponTitle'];
			$_SESSION['ResponMesage']  = $authResponse['ResponMesage'];
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('ubd-admin'));
		} 
		else 
		{
			# code...
		}
	}

	public function create_captcha()
	{
		$vals = array(
			//'word'          => 'Random word',
			'img_path'      => './ubd-content/captcha/',
			'img_url'       => base_url('ubd-content/captcha/'),
			//'font_path'     => './path/to/fonts/texb.ttf',
			'img_width'     => '165',
			'img_height'    => 45,
			'expiration'    => 1800,
			'word_length'   => 6,
			'font_size'     => 100,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			// White background and border, black text and red grid
			'colors'        => array(
				'background' => array(255, 255, 255),
				'border' => array(255, 255, 255),
				'text' => array(0, 0, 0),
				'grid' => array(210,214,222)
			)
		);

		$cap = create_captcha($vals);
		$image = $cap['image'];
		
		$this->session->set_userdata('captchaword', $cap['word']);

		return  $image;
	}

	public function check_captcha($str)
	{
		if ($str == $this->session->userdata('captchaword')) 
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}

/* End of file Auth.php */
/* Location: .//C/xampp/htdocs/Project/ubd-cms/ubd-modules/ubd-admin/auth/controllers/Auth.php */