<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Practice_report extends Logged_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pr_model');
    }

    public function index()
    {
        $user_type = $this->session->userdata('user')['type'];
        if ($user_type == 1) {
            $this->data['reports'] = $this->pr_model->get(null, null, [['user_id', $this->session->userdata('user')['id']]]);
        } else {
            $this->data['reports'] = $this->pr_model->get('practice_report.*, user.name AS student_name', null, null, [['user', 'practice_report.user_id = user.id']]);
        }
        $this->data['title'] = 'Báo cáo thực tập';
        $this->load->view('logged/practice_report/index', $this->data);
    }

    public function add()
    {
        $this->data['js_array'] = [
            'dist/js/pages/practice-report.js',
        ];

        $this->data['title'] = 'Đăng báo cáo thực tập';
        $this->load->view('logged/practice_report/add', $this->data);
    }

    public function edit()
    {
        $id = intval($this->input->get('id'));
        $this->data['report'] = $this->pr_model->get(null, $id);

        $this->data['js_array'] = [
            'dist/js/pages/practice-report.js',
        ];

        $this->data['title'] = 'Đăng báo cáo thực tập';
        $this->load->view('logged/practice_report/edit', $this->data);
    }

    public function comment($pr_id)
    {
        $id = intval($pr_id);
        $this->data['report'] = $this->pr_model->get(null, $id);

        $this->data['title'] = 'Nhận xét: ' . $this->data['report']->pr_title;
        $this->load->view('logged/practice_report/comment', $this->data);
    }

}

/* End of file Practice_report.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Practice_report.php */
