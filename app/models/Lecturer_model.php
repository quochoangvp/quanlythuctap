<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturer_model extends Base_model {

	/**
	 * Tên bảng
	 * @var string
	 */
	protected $_table_name = 'lecturer';

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
		'userid' => array(
			'field' => 'userid',
			'label' => 'Người dùng',
			'rules' => 'trim|required|integer',
		),
		'name' => array(
			'field' => 'name',
			'label' => 'Tên',
			'rules' => 'trim|required|xss_clean',
		),
		'birthday' => array(
			'field' => 'birthday',
			'label' => 'Ngày sinh',
			'rules' => 'trim|required|xss_clean',
		),
		'address' => array(
			'field' => 'address',
			'label' => 'Địa chỉ',
			'rules' => 'trim|required|xss_clean',
		),
	);

	public function __construct() {
		parent::__construct();
	}

}

/* End of file Lecturer_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/Lecturer_model.php */