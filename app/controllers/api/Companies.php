<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends Api_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('company_model');
	}

	/**
	 * Thêm công ty mới
	 */
	public function add() {

		// Lưu thông tin công ty nhận từ view
		$company = $this->input->post();

		// Lấy các quy tắc từ model
		$rules = $this->company_model->rules;

		// Tên công ty là duy nhất
		$rules['name']['rules'] .= '|is_unique[company.name]';

		// Áp dụng các quy tắc chuẩn hóa form
		$this->form_validation->set_rules($rules);

		// Dữ liệu đầu vào chính xác
		if ($this->form_validation->run()) {

			// Lưu thông tin công ty
			if ($id = $this->company_model->save($company)) {

				// Lưu thành công
				$data['status'] = 'success';
				$data['msg'] = 'Thêm công ty mới thành công.';
				$data['reload'] = logged_url('companies');
			} else {

				// Lưu thất bại
				$data['status'] = 'error';
				$data['msg'] = 'Không thể thêm mới công ty, hãy làm mới và thử lại.';
			}
		} else {

			// Dữ liệu đầu vào không chính xác
			$data['status'] = 'error';
			$data['msg']['form_error'] = show_form_error($rules);
		}

		// Trả kết quả về cho view
		echo json_encode($data);
	}

	public function edit() {

		// Lưu thông tin từ view
		$company = $this->input->post();

		// Lấy địa chỉ ID của công ty
		$id = intval($company['id']);

		// Lấy thông tin của công ty từ csdl
		$company_db = $this->company_model->get(null, $id);

		// Nếu thay đổi tên công ty, kiểm tra xem có trùng tên với các công ty khác không
		if ($company['name'] != $company_db->name) {
			$rules['name']['rules'] .= '|is_unique[company.name]';
		}

		// Lưu các quy tắc từ model
		$rules = $this->company_model->rules;

		// Áp dụng các quy tắc
		$this->form_validation->set_rules($rules);

		// Dữ liệu từ form là chuẩn
		if ($this->form_validation->run()) {
			// Lưu thông tin công ty
			if ($id = $this->company_model->save($company, $id)) {

				// THành công
				$data['status'] = 'success';
				$data['msg'] = 'Sửa thông tin công ty thành công.';
				$datae['reload'] = logged_url('companies');
			} else {

				// Thất bại
				$data['status'] = 'error';
				$data['msg'] = 'Không thể sửa thông tin công ty, hãy thử lại.';
				$data['reload'] = true;
			}
		} else {

			// Dữ liệu từ form không chính xáv
			$data['status'] = 'error';
			$data['msg']['form_error'] = show_form_error($rules);
		}

		// Trả kết quả về cho view
		echo json_encode($data);
	}

	/**
	 * Xóa công ty
	 * @return void
	 */
	public function delete() {

		// Lấy ID của công ty từ vỉew
		$id = intval($this->input->post('id'));

		// Lấy thông tin của công ty từ model
		$company = $this->company_model->get(null, $id);

		// Nếu công ty tồn tại trong hệ thống
		if ($company) {

			// Xóa công ty
			if ($this->company_model->delete($id)) {
				$data['status'] = 'success';
				$data['msg'] = 'Xóa thành công.';
			} else {
				$data['status'] = 'error';
				$data['msg'] = 'Xảy ra lỗi khi xóa, xin thử lại.';
			}
		} else {

			// Công ty không tồn tại trong hệ thống
			$data['status'] = 'error';
			$data['msg'] = 'Công ty này không tồn tại hoặc đã bị xóa.';
		}

		// Trả kết quả về cho view
		echo json_encode($data);
	}
}

/* End of file Companies.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Companies.php */