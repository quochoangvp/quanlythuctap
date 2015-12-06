<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ap_model extends Base_model
{

    protected $_table_name = 'assigning_practice';

    /**
     * Khóa chính
     * @var string
     */
    protected $_primary_key = 'ap_id';

    /**
     * Sắp xếp theo
     * @var string
     */
    protected $_order_by = 'created_at';

    /**
     * Quy tắc
     * @var array
     */
    public $rules = array(
        'student_id' => array(
            'field' => 'student_id',
            'label' => 'Sinh viên',
            'rules' => 'trim|required|integer',
        ),
        'teacher_id' => array(
            'field' => 'teacher_id',
            'label' => 'Giảng viên phụ trách',
            'rules' => 'trim|required|integer',
        ),
        'company_id' => array(
            'field' => 'company_id',
            'label' => 'Công ty',
            'rules' => 'trim|required|integer',
        ),
        'job' => array(
            'field' => 'job',
            'label' => 'Phân công công việc',
            'rules' => 'trim|xss_clean',
        ),
        'timesheets' => array(
            'field' => 'timesheets',
            'label' => 'Bảng công',
            'rules' => 'trim|xss_clean',
        ),
    );

    public function __construct()
    {
        parent::__construct();
    }

}

/* End of file Ap_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/Ap_model.php */
