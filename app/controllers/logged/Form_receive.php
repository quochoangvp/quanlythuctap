<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_receive extends Logged_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('required_forms_model');
	}

	public function index() {

		$this->data['forms'] = $this->required_forms_model->get(null, null, [['student_id', $this->session->userdata('user')['id']], ['rqf_date != ', '0000-00-00 00:00:00']]);

		$this->data['title'] = 'Thời gian hẹn lấy mẫu đơn';
		$this->load->view('logged/form_receive/index', $this->data);
	}

}

/* End of file Form_receive.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Form_receive.php */