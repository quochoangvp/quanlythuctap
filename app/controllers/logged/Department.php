<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends Logged_Controller {

	public function __construct() {
		parent::__construct();

		// Gọi model thao tác với bagnr department
		$this->load->model('department_model');
	}

	/**
	 * Danh sách ngành
	 * @return void
	 */
	public function index() {

		// Lấy danh sách ngành từ csdl
		$this->data['departments'] = $this->department_model->get();

		// Load các file css và javascript cần thiết
		// ------------------------------------------------------------------------
		$this->data['css_array'] = array(
			'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
		);
		$this->data['js_array'] = array(
			'bower_components/datatables/media/js/jquery.dataTables.min.js',
			'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
		);
		// ------------------------------------------------------------------------

		// Gọi view
		$this->data['title'] = 'Quản lý ngành';
		$this->load->view('logged/department/index', $this->data);
	}

	/**
	 * THêm ngành mới
	 */
	public function add() {

		// Gọi view
		$this->data['title'] = 'Thêm ngành mới';
		$this->load->view('logged/department/add', $this->data);
	}

	/**
	 * Sửa thông tin ngành
	 * @return void
	 */
	public function edit() {

		// Lấy ID của ngành từ URL
		$id = intval($this->input->get('id'));

		// Lấy thông tin của ngành qua ID
		$this->data['department'] = $this->department_model->get(null, $id);

		// Gọi view
		$this->data['title'] = 'Sửa thông tin ngành';
		$this->load->view('logged/department/edit', $this->data);
	}

}

/* End of file Department.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Department.php */