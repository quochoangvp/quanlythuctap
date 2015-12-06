<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assigning_practice extends Logged_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_model');
    }

    public function index()
    {
        $this->data['assigned'] = $this->ap_model->get(
            'assigning_practice.*, student.name AS student, teacher.name AS teacher, company.name AS company',
            $id = null,
            $where = null,
            [
                ['student', 'assigning_practice.student_id = student.id'],
                ['user AS teacher', 'assigning_practice.teacher_id = teacher.id'],
                ['company', 'assigning_practice.company_id = company.id'],
            ],
            $limit = null,
            $order_by = null,
            $single = false,
            $return_array = false,
            $group_by = false
        );

        // ------------------------------------------------------------------------
        $this->data['css_array'] = array(
            'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css',
        );
        $this->data['js_array'] = array(
            'bower_components/datatables/media/js/jquery.dataTables.min.js',
            'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
        );
        // ------------------------------------------------------------------------

        $this->data['title'] = 'Công việc đã phân công';
        $this->load->view('logged/assigning_practice/index', $this->data);
    }

    public function add()
    {

        $this->load->model('student_model');
        $this->data['students'] = $this->student_model->get(null, null, null, null, null, ['name', 'ASC']);

        $this->load->model('user_model');
        $this->data['teachers'] = $this->user_model->get(null, null, [['type', 2]], null, null, ['name', 'ASC']);

        $this->load->model('company_model');
        $this->data['companies'] = $this->company_model->get(null, null, null, null, null, ['name', 'ASC']);

        $this->data['title'] = 'Phân công thực tập';
        $this->load->view('logged/assigning_practice/add', $this->data);
    }

    public function edit()
    {

        $ap_id = intval($this->input->get('id'));

        $this->data['assigned'] = $this->ap_model->get(null, $ap_id);

        $this->load->model('student_model');
        $this->data['students'] = $this->student_model->get(null, null, null, null, null, ['name', 'ASC']);

        $this->load->model('user_model');
        $this->data['teachers'] = $this->user_model->get(null, null, [['type', 2]], null, null, ['name', 'ASC']);

        $this->load->model('company_model');
        $this->data['companies'] = $this->company_model->get(null, null, null, null, null, ['name', 'ASC']);

        $this->data['title'] = 'Phân công thực tập';
        $this->load->view('logged/assigning_practice/edit', $this->data);
    }
}

/* End of file Assigning_practice.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/controllers/logged/Assigning_practice.php */
