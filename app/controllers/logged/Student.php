<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends Logged_Controller {

	public function __construct() {
		parent::__construct();
		// Gọi model thao tác với bảng student
		$this->load->model('student_model');
	}

	/**
	 * Danh sách sinh viên
	 * @return void
	 */
	public function index() {

		// Danh sách sinh viên
		$this->data['students'] = $this->student_model->get('student.*, class.name AS className', null, null, [['class', 'student.classid = class.classid']]);

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
		$this->data['title'] = 'Quản lý sinh viên';
		$this->load->view('logged/student/index', $this->data);
	}

	/**
	 * THêm sinh viên mới
	 */
	public function add() {

		// Gọi model thao tác với bảng class
		$this->load->model('class_model');

		// Lấy danh sách lớp từ csdl
		$this->data['classes'] = $this->class_model->get();

		// Gọi view
		$this->data['title'] = 'Thêm sinh viên mới';
		$this->load->view('logged/student/add', $this->data);
	}

	/**
	 * Sửa thông tin sinh viên
	 * @return void
	 */
	public function edit() {

		// Gọi model thao tác với bảng class
		$this->load->model('class_model');

		// Lấy danh sách lớp từ csdl
		$this->data['classes'] = $this->class_model->get();

		// Lấy ID của sinh viên từ URL
		$id = intval($this->input->get('id'));

		// Lấy thông tin của sinh viên qua ID
		$this->data['student'] = $this->student_model->get(null, $id);

		// Gọi view
		$this->data['title'] = 'Sửa thông tin sinh viên';
		$this->load->view('logged/student/edit', $this->data);
	}

}

/* End of file Student.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Student.php */