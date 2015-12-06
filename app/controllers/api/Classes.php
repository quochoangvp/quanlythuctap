<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Classes extends Api_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Gọi model thao tác với bảng class
        $this->load->model('class_model');
    }

    /**
     * THêm lớp mới
     */
    public function add()
    {

        // Lưu thông tin nhận từ view
        $class['name'] = $this->input->post('name');
        $class['departmentid'] = intval($this->input->post('departmentid'));

        // Lưu thông tin lớp thành công
        if ($id = $this->class_model->save($class)) {
            $data['status'] = 'success';
            $data['msg'] = 'Thêm lớp thành công';

            // Chuyển đến trang sửa
            $data['reload'] = logged_url('classes');
        } else {

            // Không lưu được do lỗi hệ thống
            $data['status'] = 'error';
            $data['msg'] = 'Không thể thêm lớp mới, xin thử lại';
        }

        // Trả kết quả cho view
        echo json_encode($data);
    }

    /**
     * Sửa thông tin lớp
     * @return void
     */
    public function edit()
    {

        // Lưu thông tin từ view
        $class['name'] = $this->input->post('name');
        $class['departmentid'] = intval($this->input->post('departmentid'));
        $id = intval($this->input->post('classid'));

        // Lưu thông tin lớp thành công
        if ($this->class_model->save($class, $id)) {
            $data['status'] = 'success';
            $data['msg'] = 'Sửa thông tin lớp thành công';

            // Chuyển về trang danh sách lớp
            $data['reload'] = logged_url('classes');
        } else {

            // Lỗi hệ thống, không lưu được
            $data['status'] = 'error';
            $data['msg'] = 'Không thể thêm lớp mới, xin thử lại';
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
        $class = $this->class_model->get(null, $id);

        // Nếu có lớp này
        if ($class) {

            // Xóa lớp thành công
            if ($this->class_model->delete($id)) {
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

/* End of file Classes.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Classes.php */
