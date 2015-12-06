<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_internship extends Logged_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('reg_inter_model');
    }

    public function add()
    {
        $file = $_FILES['attachment'];
        $config['upload_path'] = FCPATH . 'uploads/';
        $config['allowed_types'] = 'pdf|docx|doc|xls|xlsx|ppt|pptx';
        $config['max_size'] = '1000000';
        $config['encrypt_name'] = true;
        $report = [];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('attachment')) {
            $data['status'] = 'error';
            $data['msg'] = 'Không thể tải lên tập tin, xin vui lòng thử lại.';
        } else {

            $rules = $this->reg_inter_model->rules;
            $upload_data = $this->upload->data();

            $report['attachment'] = $upload_data['file_name'];
            $report['reg_status'] = 0;
            $report['user_id'] = $this->session->userdata('user')['id'];
            if ($this->reg_inter_model->save($report)) {
                $data['status'] = 'success';
                $data['msg'] = 'Gửi yêu cầu đăng ký thành công!';
                $data['reload'] = true;
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Không thể gửi yêu cầu, vui lòng làm mới và thử lại.';
            }
        }
        echo json_encode($data);
    }

}

/* End of file Register_internship.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Register_internship.php */
