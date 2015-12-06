<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Logged_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('user_model');
	}

	public function index() {

		$this->data['users'] = $this->user_model->get(
			'user.*, department.name AS department_name',
			$id = null,
			$where = null,
			[
				['department', 'user.departmentid = department.departmentid'],
			],
			$limit = null,
			$order_by = null,
			$single = false,
			$return_array = false,
			$group_by = false
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

		$this->data['title'] = 'Quản lý người dùng';
		$this->load->view('logged/user/index', $this->data);
	}

	public function add() {

		$this->load->model('department_model');

		$this->data['departments'] = $this->department_model->get();

		$this->data['title'] = 'Thêm thành viên mới';
		$this->load->view('logged/user/add', $this->data);
	}

	public function edit() {

		$id = intval($this->input->get('id'));

		$this->data['user'] = $this->user_model->get(null, $id);

		$this->load->model('department_model');

		$this->data['departments'] = $this->department_model->get();

		$this->data['title'] = 'Sửa thông tin thành viên';
		$this->load->view('logged/user/edit', $this->data);
	}

}

/* End of file User.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/User.php */