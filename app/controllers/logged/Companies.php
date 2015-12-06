<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends Logged_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('company_model');
	}

	/**
	 * Danh sách công ty
	 * @return void
	 */
	public function index() {

		// Lấy danh sách công ty từ csdl
		$this->data['companies'] = $this->company_model->get('company.*, user.name AS user_name', null, null, [['user', 'company.userid = user.id']]);

		// ------------------------------------------------------------------------
		$this->data['css_array'] = array(
			'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
		);
		$this->data['js_array'] = array(
			'bower_components/datatables/media/js/jquery.dataTables.min.js',
			'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
		);
		// ------------------------------------------------------------------------

		$this->data['title'] = 'Công ty';
		$this->load->view('logged/companies/index', $this->data);
	}

	/**
	 * Thêm mới
	 */
	public function add() {

		// Gọi model thao tác với bảng user
		$this->load->model('user_model');

		// Lấy danh sách người dùng thuộc nhóm công ty từ csdl
		$this->data['users'] = $this->user_model->get(null, null, [['type', 3]]);

		// Gọi view
		$this->data['title'] = 'Thêm công ty mới';
		$this->load->view('logged/companies/add', $this->data);
	}

	/**
	 * Sửa thông tin công ty
	 * @return void
	 */
	public function edit() {

		// Gọi model thao tác với bảng user
		$this->load->model('user_model');

		// Lấy danh sách người dùng thuộc nhóm công ty từ csdl
		$this->data['users'] = $this->user_model->get(null, null, [['type', 3]]);

		// Lấy ID của công ty từ URL
		$id = intval($this->input->get('id'));

		// Lấy thông tin của công ty qua ID
		$this->data['company'] = $this->company_model->get(null, $id);

		// Gọi view
		$this->data['title'] = 'Sửa thông tin công ty';
		$this->load->view('logged/companies/edit', $this->data);
	}

}

/* End of file Companies.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Companies.php */