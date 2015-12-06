<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends Logged_Controller {

	public function __construct() {
		parent::__construct();

		// Gọi model thao tác với bảng class
		$this->load->model('class_model');
	}

	/**
	 * Danh sách lớp
	 * @return void
	 */
	public function index() {

		// Lấy danh sách lớp từ csdl
		$this->data['classes'] = $this->class_model->get('class.*, department.name AS department_name', null, null, [['department', 'class.departmentid = department.departmentid']]);

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
		$this->data['title'] = 'Quản lý lớp';
		$this->load->view('logged/classes/index', $this->data);
	}

	/**
	 * THêm lớp mới
	 */
	public function add() {

		// Gọi model thao tác với bảng department
		$this->load->model('department_model');

		// Lấy danh sách khoa từ csdl
		$this->data['departments'] = $this->department_model->get();

		// Gọi view
		$this->data['title'] = 'Thêm lớp mới';
		$this->load->view('logged/classes/add', $this->data);
	}

	/**
	 * Sửa thông tin lớp
	 * @return void
	 */
	public function edit() {

		// Gọi model thao tác với bảng department
		$this->load->model('department_model');

		// Lấy danh sách khoa từ csdl
		$this->data['departments'] = $this->department_model->get();

		// Lấy ID của lớp từ URL
		$id = intval($this->input->get('id'));

		// Lấy thông tin của lớp qua ID
		$this->data['class'] = $this->class_model->get(null, $id);

		// Gọi view
		$this->data['title'] = 'Sửa thông tin lớp';
		$this->load->view('logged/classes/edit', $this->data);
	}
}

/* End of file Classes.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Classes.php */