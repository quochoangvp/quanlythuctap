<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lecturers extends Api_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('lecturer_model');
    }

    public function add()
    {
        $lecturer = $this->input->post();

        $rules = $this->lecturer_model->rules;

        $rules['userid']['rules'] .= '|is_unique[lecturer.userid]';

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {

            $lecturer['birthday'] = date_format(date_create($lecturer['birthday']), 'Y-m-d H:j:s');

            if ($id = $this->lecturer_model->save($lecturer)) {
                $data['status'] = 'success';
                $data['msg'] = 'Thêm giảng viên mới thành công.';
                $data['reload'] = logged_url('lecturers');
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Không thể thêm giảng viên mới, hãy làm mới và thử lại.';
            }
        } else {
            $data['status'] = 'error';
            $data['msg']['form_error'] = show_form_error($rules);
        }

        echo json_encode($data);
    }

    public function edit()
    {
        $lecturer = $this->input->post();
        $id = intval($lecturer['id']);
        unset($lecturer['id']);

        $lecturer_db = $this->lecturer_model->get(null, $id);

        $rules = $this->lecturer_model->rules;
        if ($lecturer['userid'] != $lecturer_db->userid) {
            $rules['userid']['rules'] .= '|is_unique[lecturer.userid]';
        }

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {

            $lecturer['birthday'] = date_format(date_create($lecturer['birthday']), 'Y-m-d H:j:s');

            if ($this->lecturer_model->save($lecturer, $id)) {
                $data['status'] = 'success';
                $data['msg'] = 'Thêm giảng viên mới thành công.';
                $data['reload'] = logged_url('lecturers');
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Không thể thêm giảng viên mới, hãy làm mới và thử lại.';
            }
        } else {
            $data['status'] = 'error';
            $data['msg']['form_error'] = show_form_error($rules);
        }

        echo json_encode($data);
    }

    public function delete()
    {

        $id = intval($this->input->post('id'));

        $lecturer = $this->lecturer_model->get(null, $id);

        if ($lecturer) {

            if ($this->lecturer_model->delete($id)) {
                $data['status'] = 'success';
                $data['msg'] = 'Xóa thành công.';
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Xảy ra lỗi khi xóa, xin thử lại.';
            }
        } else {
            $data['status'] = 'error';
            $data['msg'] = 'Thành viên này không tồn tại hoặc đã bị xóa.';
        }

        echo json_encode($data);
    }

}

/* End of file Lecturers.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Lecturers.php */
