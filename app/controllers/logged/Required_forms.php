<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Required_forms extends Logged_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('required_forms_model');
	}

	public function index() {

		$forms = $this->required_forms_model->get();
		$this->load->model('user_model');

		foreach ($forms as $key => $form) {
			$forms[$key]->student = $this->user_model->get('user.name AS user_name', $form->student_id)->user_name;
		}

		$this->data['forms'] = $forms;

		// ------------------------------------------------------------------------
		$this->data['css_array'] = array(
			'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
		);
		$this->data['js_array'] = array(
			'bower_components/datatables/media/js/jquery.dataTables.min.js',
			'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
			'dist/js/pages/required_forms.js',
		);
		// ------------------------------------------------------------------------

		$this->data['title'] = 'Danh sách đơn';
		$this->load->view('logged/required_forms/index', $this->data);
	}

}

/* End of file Required_forms.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Required_forms.php */