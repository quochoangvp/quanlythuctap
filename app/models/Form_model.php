<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends Base_model {

	/**
	 * Tên bảng
	 * @var string
	 */
	protected $_table_name = 'forms';

	/**
	 * Khóa chính
	 * @var string
	 */
	protected $_primary_key = 'form_id';

	/**
	 * Quy tắc
	 * @var array
	 */
	public $rules = array(
		'form_title' => array(
			'field' => 'form_title',
			'label' => 'Tiêu đề',
			'rules' => 'trim|required|xss_clean|min_length[3]|max_length[255]',
		),
		'form_body' => array(
			'field' => 'form_body',
			'label' => 'Nội dung',
			'rules' => 'trim|required',
		),
		'form_status' => array(
			'field' => 'form_status',
			'label' => 'Trạng thái',
			'rules' => 'trim|integer',
		),
	);

	public function __construct() {
		parent::__construct();
	}

}

/* End of file Form_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/Form_model.php */