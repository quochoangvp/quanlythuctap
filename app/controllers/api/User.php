<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Api_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login()
    {

        $username = $this->input->post('username');
        $password = hash_pass($this->input->post('password'));

        $user = $this->user_model->get(null, null, [['username', $username], ['password', $password]], null, 1, null, true);

        if ($user) {
            $data['status'] = 'success';
            $data['msg'] = 'Đăng nhập thành công!';
            $data['reload'] = logged_url('dashboard');

            $user_data['user'] = (array) $user;

            if ($this->input->post('remember') == 1) {
                $this->session->sess_expiration = '32140800'; //~ one year
                $this->session->sess_expire_on_close = 'false';
            } else {
                $this->session->sess_expiration = '1800'; //~ one year
                $this->session->sess_expire_on_close = 'true';
            }
            $this->session->set_userdata($user_data);
        } else {
            $data['status'] = 'error';
            $data['msg'] = 'Mật khẩu hoặc tên đăng nhập không đúng.';
        }
        echo json_encode($data);
    }

    public function add()
    {

        $user = $this->input->post();

        $rules = $this->user_model->rules;

        $rules['username']['rules'] .= '|is_unique[user.username]';
        $rules['email']['rules'] .= '|is_unique[user.email]';

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {

            $user['password'] = hash_pass($user['password']);

            if ($id = $this->user_model->save($user)) {
                $data['status'] = 'success';
                $data['msg'] = 'Thêm thành viên mới thành công.';
                $data['reload'] = logged_url('user');
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Không thể thêm thành viên mới, hãy làm mới và thử lại.';
            }
        } else {
            $data['status'] = 'error';
            $data['msg']['form_error'] = show_form_error($rules);
        }

        echo json_encode($data);
    }

    public function edit()
    {

        $user = $this->input->post();

        $id = intval($user['id']);

        $user_db = $this->user_model->get(null, $id);

        $rules = $this->user_model->rules;

        if ($user['username'] != $user_db->username) {
            $rules['username']['rules'] .= '|is_unique[user.username]';
        }
        if ($user['email'] != $user_db->email) {
            $rules['email']['rules'] .= '|is_unique[user.email]';
        }

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {

            $user['password'] = hash_pass($user['password']);

            if ($id = $this->user_model->save($user, $id)) {
                $data['status'] = 'success';
                $data['msg'] = 'Sửa thông tin thành viên thành công.';
                $data['reload'] = logged_url('user');
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Không thể sửa thông tin thành viên, hãy thử lại.';
                $data['reload'] = true;
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

        $user = $this->user_model->get(null, $id);

        if ($user) {

            if ($this->user_model->delete($id)) {
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

    public function import()
    {
        $this->load->library('excel');
        $inputFileName = FCPATH . 'uploads/list-SV.xlsx';

        //  Read your Excel workbook
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        //  Get worksheet dimensions
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $rowData = [];
        //  Loop through each row of the worksheet in turn
        for ($row = 1; $row <= $highestRow; $row++) {
            //  Read a row of data into an array
            $rowData = array_merge($rowData, $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false));
            //  Insert row data array into your database of choice here
        }
        var_dump($rowData);die;
    }

}

/* End of file User.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/User.php */
