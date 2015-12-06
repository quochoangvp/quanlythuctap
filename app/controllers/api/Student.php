<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends Api_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
    }

    public function add()
    {
        // Lấy dữ liệu từ view
        $student = $this->input->post();

        // Áp dụng các quy tắc cho form
        $rules = $this->student_model->rules;
        $rules['mssv']['rules'] .= '|is_unique[student.mssv]';
        $rules['email']['rules'] .= '|is_unique[student.email]';
        $this->form_validation->set_rules($rules);

        // Nếu các trường nhập vào đúng
        if ($this->form_validation->run()) {

            $student['birthday'] = date_format(date_create($student['birthday']), 'Y-m-d H:j:s');

            // Lưu thông tin sinh viên
            if ($id = $this->student_model->save($student)) {
                // Thành công
                $data['status'] = 'success';
                $data['msg'] = 'Thêm sinh viên thành công.';
                $data['reload'] = logged_url('student');
            } else {
                // Thất bại
                $data['status'] = 'error';
                $data['msg'] = 'Không thể thêm sinh viên, hãy thử lại.';
            }
        } else {
            // Dữ liệu từ form không chính xác
            $data['status'] = 'error';
            $data['msg']['form_error'] = show_form_error($rules);
        }

        // Trả kết quả về cho view
        echo json_encode($data);
    }

    /**
     * Sửa thông tin sinh viên
     * @return void
     */
    public function edit()
    {

        // Lưu thông tin từ view
        $student = $this->input->post();

        // Lấy ID của sinh viên từ view
        $id = intval($student['id']);

        // Lấy thông tin sinh viên từ csdl
        $student_db = $this->student_model->get(null, $id);

        // Lấy các quy tắc chuẩn hóa dữ liệu form từ model
        $rules = $this->student_model->rules;

        // Nếu đổi mã sinh viên khác, chắc chắn không trùng với các sinh viên khác
        if ($student['mssv'] != $student_db->mssv) {
            $rules['mssv']['rules'] .= '|is_unique[student.mssv]';
        }
        // Nếu đổi email khác, chắc chắn không trùng với các sinh viên khác
        if ($student['email'] != $student_db->email) {
            $rules['email']['rules'] .= '|is_unique[student.email]';
        }

        // Áp dụng các quy tắc
        $this->form_validation->set_rules($rules);

        // Các trường nhập vào đúng quy tắc
        if ($this->form_validation->run()) {

            $student['birthday'] = date_format(date_create($student['birthday']), 'Y-m-d H:j:s');

            // Lưu thông tin sinh viên
            if ($id = $this->student_model->save($student, $id)) {
                // Lưu thành công
                $data['status'] = 'success';
                $data['msg'] = 'Cập nhật thông tin sinh viên thành công.';
                $data['reload'] = logged_url('student');
            } else {
                // Lưu thất bại
                $data['status'] = 'error';
                $data['msg'] = 'Không thể cập nhật thông tin sinh viên, hãy thử lại.';
                $data['reload'] = true;
            }
        } else {
            // Dữ liệu từ form không chính xác
            $data['status'] = 'error';
            $data['msg']['form_error'] = show_form_error($rules);
        }

        // Trả kết quả cho view
        echo json_encode($data);
    }

    /**
     * Xóa sinh viên
     * @return void
     */
    public function delete()
    {

        // Lấy ID sinh vien từ view
        $id = intval($this->input->post('id'));

        // Lấy thông tin sinh viên trong csdl
        $student = $this->student_model->get(null, $id);

        // Sinh viên này tồn tại trong hệ thống
        if ($student) {

            // Xóa sinh viên
            if ($this->student_model->delete($id)) {
                // THành công
                $data['status'] = 'success';
                $data['msg'] = 'Xóa thành công.';
            } else {
                // Thất bại
                $data['status'] = 'error';
                $data['msg'] = 'Xảy ra lỗi khi xóa, xin thử lại.';
            }
        } else {
            // Không tìm thấy sinh viên trong csdl
            $data['status'] = 'error';
            $data['msg'] = 'Sinh viên này không tồn tại hoặc đã bị xóa.';
        }

        // Trả kết quả về cho view
        echo json_encode($data);
    }

}

/* End of file Student.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Student.php */
