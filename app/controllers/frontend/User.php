<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Frontend_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function login() {

		if (is_logged()) {
			redirect(logged_url('dashboard'));
		}

		$this->data['title'] = 'Đăng nhập';
		$this->load->view('frontend/user/login', $this->data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect();
	}

}

/* End of file User.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/frontend/User.php */