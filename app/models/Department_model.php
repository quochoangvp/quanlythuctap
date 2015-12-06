<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends Base_model {

	/**
	 * Tên bảng
	 * @var string
	 */
	protected $_table_name = 'department';

	/**
	 * Khóa chính
	 * @var string
	 */
	protected $_primary_key = 'departmentid';

	/**
	 * Quy tắc
	 * @var array
	 */
	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Tên khoa',
			'rules' => 'trim|required|xss_clean|min_length[3]|max_length[100]',
		),
	);

	public function __construct() {
		parent::__construct();
	}

}

/* End of file Department_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/Department_model.php */