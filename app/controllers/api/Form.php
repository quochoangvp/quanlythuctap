<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends Api_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('form_model');
    }

    public function add()
    {
        $form = $this->input->post();

        $rules = $this->form_model->rules;

        $rules['form_title']['rules'] .= '|is_unique[forms.form_title]';

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {

            if ($id = $this->form_model->save($form)) {
                $data['status'] = 'success';
                $data['msg'] = 'Thêm mẫu đơn mới thành công.';
                $data['reload'] = logged_url('form');
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Không thể thêm mẫu đơn mới, hãy làm mới và thử lại.';
            }
        } else {
            $data['status'] = 'error';
            $data['msg']['form_error'] = show_form_error($rules);
        }

        echo json_encode($data);
    }

    public function edit()
    {

        $form = $this->input->post();

        $id = intval($form['form_id']);

        $form_db = $this->form_model->get(null, $id);

        $rules = $this->form_model->rules;

        if ($form['form_title'] != $form_db->form_title) {
            $rules['form_title']['rules'] .= '|is_unique[forms.form_title]';
        }

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {

            if ($id = $this->form_model->save($form, $id)) {
                $data['status'] = 'success';
                $data['msg'] = 'Sửa nội dung mẫu đơn thành công.';
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Không thể sửa nội dung mẫu đơn, hãy thử lại.';
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

        $form = $this->form_model->get(null, $id);

        if ($form) {

            if ($this->form_model->delete($id)) {
                $data['status'] = 'success';
                $data['msg'] = 'Xóa thành công.';
            } else {
                $data['status'] = 'error';
                $data['msg'] = 'Xảy ra lỗi khi xóa, xin thử lại.';
            }
        } else {
            $data['status'] = 'error';
            $data['msg'] = 'Mẫu đơn này không tồn tại hoặc đã bị xóa.';
        }

        // Trả kết quả về cho view
        echo json_encode($data);
    }

}

/* End of file Form.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/api/Form.php */
