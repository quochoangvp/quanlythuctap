<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends Base_model {

	/**
	 * Tên bảng
	 * @var string
	 */
	protected $_table_name = 'student';

	/**
	 * Khóa chính
	 * @var string
	 */
	protected $_primary_key = 'id';

	/**
	 * Quy tắc
	 * @var array
	 */
	public $rules = array(
		'mssv' => array(
			'field' => 'mssv',
			'label' => 'Mã sinh viên',
			'rules' => 'trim|required|integer',
		),
		'name' => array(
			'field' => 'name',
			'label' => 'Họ tên',
			'rules' => 'trim|required|xss_clean|min_length[3]|max_length[50]',
		),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email',
		),
		'phonenumber' => array(
			'field' => 'phonenumber',
			'label' => 'Số điện thoại',
			'rules' => 'trim|required',
		),
	);

	public function __construct() {
		parent::__construct();
	}

}

/* End of file Student_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/Student_model.php */