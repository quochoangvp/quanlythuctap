<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assigning_practice extends Api_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_model');
    }

    public function add()
    {
        $ap = $this->input->post();

        $rules = $this->ap_model->rules;

        $rules['student_id']['rules'] .= '|is_unique[assigning_practice.student_id]';

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {

            if ($id = $this->ap_model->save($ap)) {
                $data['status'] = 'success';
                $data['msg'] = 'Phân công thành công.';
                $data['reload'] = logged_url('assigning_practice');
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Không thể phân công, hãy làm mới và thử lại.';
            }
        } else {
            $data['status'] = 'error';
            $data['msg']['form_error'] = show_form_error($rules);
        }

        echo json_encode($data);
    }

    public function edit()
    {
        $ap = $this->input->post();

        $id = intval($ap['ap_id']);
        unset($ap['ap_id']);

        $assigned_db = $this->ap_model->get(null, $id);

        $rules = $this->ap_model->rules;

        if ($assigned_db->student_id != $ap['student_id']) {
            $rules['student_id']['rules'] .= '|is_unique[assigning_practice.student_id]';
        }

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {

            if ($id = $this->ap_model->save($ap, $id)) {
                $data['status'] = 'success';
                $data['msg'] = 'Phân công thành công.';
                $data['reload'] = logged_url('assigning_practice');
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Không thể phân công, hãy làm mới và thử lại.';
            }
        } else {
            $data['status'] = 'error';
            $data['msg']['form_error'] = show_form_error($rules);
        }

        echo json_encode($data);
    }

    public function delete()
    {
        // Lấy ID từ view
        $id = intval($this->input->post('id'));

        // Lấy dữ liệu từ csdl
        $ap = $this->ap_model->get(null, $id);

        // Nếu có ngành này
        if ($ap) {

            // Xóa ngành thành công
            if ($this->ap_model->delete($id)) {
                $data['status'] = 'success';
                $data['msg'] = 'Xóa thành công.';
            } else {

                // Không xóa được do lỗi hệ thống
                $data['status'] = 'error';
                $data['msg'] = 'Xảy ra lỗi khi xóa, xin thử lại.';
            }
        } else {

            // Khoa không tồn tại
            $data['status'] = 'error';
            $data['msg'] = 'Khoa này không tồn tại hoặc đã bị xóa.';
        }

        echo json_encode($data);
    }

}

/* End of file Assigning_practice.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Assigning_practice.php */
