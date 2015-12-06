<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends Logged_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('form_model');
	}

	public function index() {

		$this->data['forms'] = $this->form_model->get();

		// ------------------------------------------------------------------------
		$this->data['css_array'] = array(
			'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
		);
		$this->data['js_array'] = array(
			'bower_components/datatables/media/js/jquery.dataTables.min.js',
			'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
		);
		// ------------------------------------------------------------------------

		$this->data['title'] = 'Quản lý mẫu đơn';
		$this->load->view('logged/form/index', $this->data);
	}

	public function add() {

		$this->data['js_array'] = array(
			'bower_components/tinymce/tinymce.min.js',
		);

		$this->data['title'] = 'Thêm mẫu đơn mới';
		$this->load->view('logged/form/add', $this->data);
	}

	public function edit() {

		$id = intval($this->input->get('id'));

		$this->data['js_array'] = array(
			'bower_components/tinymce/tinymce.min.js',
		);

		$this->data['form'] = $this->form_model->get(null, $id);

		$this->data['title'] = 'Sửa mẫu đơn';
		$this->load->view('logged/form/edit', $this->data);
	}

}

/* End of file Form.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Form.php */