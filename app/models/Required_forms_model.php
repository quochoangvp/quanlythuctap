<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Required_forms_model extends Base_model {

	/**
	 * Tên bảng
	 * @var string
	 */
	protected $_table_name = 'required_forms';

	/**
	 * Khóa chính
	 * @var string
	 */
	protected $_primary_key = 'rqf_id';

	/**
	 * Quy tắc
	 * @var array
	 */
	public $rules = array(
		'rqf_body' => array(
			'field' => 'rqf_body',
			'label' => 'Nội dung',
			'rules' => 'trim|required',
		),
	);

	public function __construct() {
		parent::__construct();
	}

}

/* End of file Required_forms_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/Required_forms_model.php */