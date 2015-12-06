<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Practice_report extends Logged_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pr_model');
    }

    public function add()
    {
        $file = $_FILES['pr_attachment'];
        $config['upload_path'] = FCPATH . 'uploads/';
        $config['allowed_types'] = 'pdf|docx|doc|xls|xlsx|ppt|pptx';
        $config['max_size'] = '1000000';
        $config['encrypt_name'] = true;
        $report = [];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pr_attachment')) {
            $data['status'] = 'error';
            $data['msg'] = 'Không thể tải lên tập tin, xin vui lòng thử lại.';
        } else {

            $rules = $this->pr_model->rules;
            $this->form_validation->set_rules($rules);
            $report['pr_attachment'] = $upload_data['file_name'];
            if ($this->form_validation->run()) {
                $upload_data = $this->upload->data();
                $report['pr_title'] = $this->input->post('pr_title');
                $report['user_id'] = $this->session->userdata('user')['id'];
                if ($this->pr_model->save($report)) {
                    $data['status'] = 'success';
                    $data['msg'] = 'Đăng báo cáo thành công!';
                    $data['reload'] = logged_url('practice_report');
                } else {
                    $data['status'] = 'error';
                    $data['msg'] = 'Không thể đăng báo cáo, vui lòng làm mới và thử lại.';
                    unlink(FCPATH . 'uploads/' . $upload_data['file_name']);
                }
            } else {
                unlink(FCPATH . 'uploads/' . $upload_data['file_name']);
                $data['status'] = 'error';
                $data['msg']['form_error'] = show_form_error($rules);
            }
        }
        echo json_encode($data);
    }

    public function edit()
    {
        $file = $_FILES['pr_attachment'];
        $config['upload_path'] = FCPATH . 'uploads/';
        $config['allowed_types'] = 'pdf|docx|doc|xls|xlsx|ppt|pptx';
        $config['max_size'] = '1000000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pr_attachment')) {
            $data['status'] = 'error';
            $data['msg'] = 'Không thể tải lên tập tin, xin vui lòng thử lại.';
        } else {

            $pr_id = intval($this->input->post('pr_id'));

            $rules = $this->pr_model->rules;
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run()) {
                $upload_data = $this->upload->data();
                $report['pr_attachment'] = $upload_data['file_name'];
                $report['pr_title'] = $this->input->post('pr_title');
                $report['user_id'] = $this->session->userdata('user')['id'];
                if ($this->pr_model->save($report, $pr_id)) {
                    $data['status'] = 'success';
                    $data['msg'] = 'Sửa báo cáo thành công!';
                    $data['reload'] = logged_url('practice_report');
                } else {
                    $data['status'] = 'error';
                    $data['msg'] = 'Không thể sửa báo cáo, vui lòng làm mới và thử lại.';
                }
            } else {
                unlink(FCPATH . 'uploads/' . $report['pr_attachment']);
                $data['status'] = 'error';
                $data['msg']['form_error'] = show_form_error($rules);
            }
        }
        echo json_encode($data);
    }
/*Sinh viên đã đăng ký học phần(*) trên hệ thống SIS tương ứng với hệ đào tạo đang theo học
điền đầy đủ thông tin trên “Phiếu đăng ký nguyện vọng thực tập doanh nghiệp” và nộp theo lớp.
Sinh viên có thể chủ động tìm địa chỉ thực tập trước khi nộp Phiếu đăng ký
(các thông báo tuyển dụng được cập nhật trên website Viện) hoặc đợi phân công từ Viện.
Trong trường hợp sinh viên chủ động tìm địa chỉ thực tập cần thực hiện như sau:
-         Sinh viên cần ghi rõ địa chỉ thực tập trong “Phiếu đăng ký nguyện vọng thực tập doanh nghiệp”.
-         Xin xác nhận của nơi thực tập vào Phiếu đăng ký.*/
    public function add_comment()
    {
        $type = intval($this->input->post('type'));
        $id = intval($this->input->post('pr_id'));
        switch ($type) {
            case '2': // Giảng viên phụ trách nhận xét
                $report['teacher_cmt'] = strip_tags($this->input->post('content'));
                break;
            case '3': // Công ty nhận xét
                $report['company_cmt'] = strip_tags($this->input->post('content'));
                break;
            default:
                # code...
                break;
        }
        if ($this->pr_model->save($report, $id)) {
            $data['status'] = 'success';
            $data['msg'] = 'Đăng nhận xét thành công!';
            $data['reload'] = 'true';
        } else {
            $data['status'] = 'error';
            $data['msg'] = 'Không đăng được nhận xét, xin vui lòng thử lại!';
        }
        echo json_encode($data);
    }

}

/* End of file Practice_report.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Practice_report.php */
