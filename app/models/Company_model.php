<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends Base_model {

	/**
	 * Tên bảng
	 * @var string
	 */
	protected $_table_name = 'company';

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
		'name' => array(
			'field' => 'name',
			'label' => 'Tên công ty',
			'rules' => 'trim|required|xss_clean|min_length[3]|max_length[30]',
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

/* End of file Company_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/Company_model.php */