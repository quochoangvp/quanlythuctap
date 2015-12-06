<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Required_forms extends Api_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('required_forms_model');
	}

	public function get_content() {
		$id = intval($this->input->get('id'));
		$required_form = $this->required_forms_model->get(null, $id);
		echo json_encode($required_form);
	}

	public function approve() {
		$id = intval($this->input->post('id'));
		$form['rqf_date'] = date_format(date_create($this->input->post('receive_date')), 'Y-m-d H:j:s');
		$form['rqf_status'] = 1;
		if ($this->required_forms_model->save($form, $id)) {
			$data['status'] = 'success';
			$data['msg'] = 'Duyệt đơn thành công!';
		} else {
			$data['status'] = 'error';
			$data['msg'] = 'Không thể duyệt đơn, xin vui lòng thử lại';
		}
		echo json_encode($data);
	}

}

/* End of file Required_forms.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Required_forms.php */