<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends Base_model {

	/**
	 * Tên bảng
	 * @var string
	 */
	protected $_table_name = 'user';

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
		'username' => array(
			'field' => 'username',
			'label' => 'Tên người dùng',
			'rules' => 'trim|required|xss_clean|min_length[3]|max_length[20]|alpha_numeric',
		),
		'name' => array(
			'field' => 'name',
			'label' => 'Họ tên',
			'rules' => 'trim|required|xss_clean|min_length[3]|max_length[50]',
		),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|min_length[3]|max_length[50]',
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Mật khẩu ',
			'rules' => 'trim|required|min_length[5]',
		),
		'password_confirm' => array(
			'field' => 'password_confirm',
			'label' => 'Xác nhận mật khẩu',
			'rules' => 'trim|matches[password]',
		),
		'type' => array(
			'field' => 'type',
			'label' => 'Nhóm',
			'rules' => 'trim|required|integer',
		),
	);

	public function __construct() {
		parent::__construct();
	}

}

/* End of file User_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/User_model.php */