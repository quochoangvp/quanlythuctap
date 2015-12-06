<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Department extends Api_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Gọi model thao tác với bảng department
        $this->load->model('department_model');
    }

    /**
     * THêm ngành mới
     */
    public function add()
    {

        // Lưu thông tin nhận từ view
        $department['name'] = $this->input->post('name');

        // Lưu thông tin ngành thành công
        if ($id = $this->department_model->save($department)) {
            $data['status'] = 'success';
            $data['msg'] = 'Thêm ngành thành công';

            // Chuyển đến trang sửa
            $data['reload'] = logged_url('department');
        } else {

            // Không lưu được do lỗi hệ thống
            $data['status'] = 'error';
            $data['msg'] = 'Không thể thêm ngành mới, xin thử lại';
        }

        // Trả kết quả cho view
        echo json_encode($data);
    }

    /**
     * Sửa thông tin ngành
     * @return void
     */
    public function edit()
    {

        // Lưu thông tin từ view
        $department['name'] = $this->input->post('name');
        $id = intval($this->input->post('id'));

        // Lưu thông tin ngành thành công
        if ($id = $this->department_model->save($department, $id)) {
            $data['status'] = 'success';
            $data['msg'] = 'Sửa thông tin ngành thành công';

            // Chuyển về trang danh sách ngành
            $data['reload'] = logged_url('department');
        } else {

            // Lỗi hệ thống, không lưu được
            $data['status'] = 'error';
            $data['msg'] = 'Không thể thêm ngành mới, xin thử lại';
        }

        // Trả kết quả về cho view
        echo json_encode($data);
    }

    /**
     * Xóa
     * @return void
     */
    public function delete()
    {

        // Lấy ID từ view
        $id = intval($this->input->post('id'));

        // Lấy dữ liệu từ csdl
        $department = $this->department_model->get(null, $id);

        // Nếu có ngành này
        if ($department) {

            // Xóa ngành thành công
            if ($this->department_model->delete($id)) {
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

/* End of file Department.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Department.php */
