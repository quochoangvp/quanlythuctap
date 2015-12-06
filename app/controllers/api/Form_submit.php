<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_submit extends Api_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('required_forms_model');
	}

	public function send() {
		$form['student_id'] = intval($this->input->post('user_id'));
		$form['rqf_body'] = $this->input->post('rqf_body');
		$form['rqf_status'] = 0;

		if ($this->required_forms_model->save($form)) {
			$data['status'] = 'success';
			$data['msg'] = 'Gửi đơn thành công!';
			$data['reload'] = logged_url('form_submit');
		} else {
			$data['status'] = 'error';
			$data['msg'] = 'Không thể gửi đơn, xin vui lòng thử lại';
		}
		echo json_encode($data);
	}

}

/* End of file Form_submit.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Form_submit.php */