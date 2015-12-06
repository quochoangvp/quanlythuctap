<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_internship extends Logged_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('reg_inter_model');
    }

    public function index()
    {
        $this->data['regs'] = $this->reg_inter_model->get('reg_id, reg_status', null, [['user_id', $this->session->userdata('user')['id']]]);
        $this->data['title'] = 'Nộp phiếu đăng ký thực tập doanh nghiệp';
        $this->load->view('logged/register_internship/index', $this->data);
    }

}

/* End of file Register_internship.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Register_internship.php */
