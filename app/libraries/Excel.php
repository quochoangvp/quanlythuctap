<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/phpexcel/PHPExcel.php';

class Excel extends PHPExcel {
	protected $ci;

	public function __construct() {
		parent::__construct();
		$this->ci = &get_instance();
	}

}

/* End of file Excel.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/libraries/Excel.php */
