<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_submit extends Logged_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('form_model');
	}

	public function index() {

		// ------------------------------------------------------------------------
		$this->data['css_array'] = array(
			'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
		);
		$this->data['js_array'] = array(
			'bower_components/datatables/media/js/jquery.dataTables.min.js',
			'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
		);
		// ------------------------------------------------------------------------

		$this->data['forms'] = $this->form_model->get(null, null, [['form_status', 1]]);

		$this->data['title'] = 'Điền mẫu đơn';
		$this->load->view('logged/form_submit/index', $this->data);
	}

	public function send() {

		$form_id = intval($this->input->get('id'));

		$this->load->model('lecturer_model');
		$this->data['lecturers'] = $this->lecturer_model->get('lecturer.*, user.name AS user_name', null, null, [['user', 'lecturer.userid = user.id']]);

		$this->load->model('form_model');
		$this->data['form'] = $this->form_model->get(null, $form_id);

		$this->data['js_array'] = array(
			'bower_components/tinymce/tinymce.min.js',
		);

		$this->data['title'] = 'Gửi đơn';
		$this->load->view('logged/form_submit/send', $this->data);
	}

}

/* End of file Form_submit.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Form_submit.php */