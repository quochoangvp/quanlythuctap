<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Logged_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        // Đếm số lớp
        $this->load->model('class_model');
        $classes = $this->class_model->get('classid');
        $this->data['class_num'] = count($classes);

        // Đếm số khoa
        $this->load->model('department_model');
        $departments = $this->department_model->get('departmentid');
        $this->data['department_num'] = count($departments);

        // Đếm số sinh viên
        $this->load->model('student_model');
        $students = $this->student_model->get('id');
        $this->data['student_num'] = count($students);

        // Đếm số công ty
        $this->load->model('company_model');
        $companies = $this->company_model->get('id');
        $this->data['company_num'] = count($companies);

        $this->data['title'] = 'Trang chủ';
        $this->load->view('logged/dashboard/index', $this->data);
    }

}

/* End of file Dashboard.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Dashboard.php */
