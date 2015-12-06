<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturers extends Logged_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('lecturer_model');
	}

	/**
	 * Danh sách giảng viên
	 * @return void
	 */
	public function index() {

		// Danh sách giảng viên
		$this->data['lecturers'] = $this->lecturer_model->get(
			'lecturer.*,
			department.name AS departmentName,
			user.email AS user_email,
			user.name AS user_name',
			null, null,
			[
				['department', 'lecturer.departmentid = department.departmentid'],
				['user', 'lecturer.userid = user.id'],
			]
		);

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
		$this->data['title'] = 'Giảng viên';
		$this->load->view('logged/lecturers/index', $this->data);
	}

	/**
	 * THêm giảng viên mới
	 */
	public function add() {

		// Gọi model thao tác với bảng class
		$this->load->model('department_model');

		// Lấy danh sách khoa từ csdl
		$this->data['departments'] = $this->department_model->get();

		// Gọi model thao tác với bảng user
		$this->load->model('user_model');

		// Lấy danh sách giảng viên
		$this->data['users'] = $this->user_model->get(null, null, [['type', 2]]);

		// Gọi view
		$this->data['title'] = 'Thêm giảng viên mới';
		$this->load->view('logged/lecturers/add', $this->data);
	}

	/**
	 * Sửa thông tin giảng viên
	 * @return void
	 */
	public function edit() {

		// Gọi model thao tác với bảng class
		$this->load->model('department_model');

		// Lấy danh sách lớp từ csdl
		$this->data['departments'] = $this->department_model->get();

		// Gọi model thao tác với bảng user
		$this->load->model('user_model');

		// Lấy danh sách giảng viên
		$this->data['users'] = $this->user_model->get(null, null, [['type', 2]]);

		// Lấy ID của giảng viên từ URL
		$id = intval($this->input->get('id'));

		// Lấy thông tin của giảng viên qua ID
		$this->data['lecturer'] = $this->lecturer_model->get(null, $id);

		// Gọi view
		$this->data['title'] = 'Sửa thông tin giảng viên';
		$this->load->view('logged/lecturers/edit', $this->data);
	}

}

/* End of file Lecturers.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Lecturers.php */