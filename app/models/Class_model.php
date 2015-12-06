<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends Base_model {

	/**
	 * Tên bảng
	 * @var string
	 */
	protected $_table_name = 'class';

	/**
	 * Khóa chính
	 * @var string
	 */
	protected $_primary_key = 'classid';

	/**
	 * Quy tắc
	 * @var array
	 */
	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Tên lớp',
			'rules' => 'trim|required|xss_clean|min_length[3]|max_length[30]',
		),
		'departmentid' => array(
			'field' => 'departmentid',
			'label' => 'Khoa',
			'rules' => 'trim|required|integer',
		),
	);

	public function __construct() {
		parent::__construct();
	}

}

/* End of file Class_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/Class_model.php */