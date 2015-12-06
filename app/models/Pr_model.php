<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pr_model extends Base_model
{

    /**
     * Tên bảng
     * @var string
     */
    protected $_table_name = 'practice_report';

    /**
     * Khóa chính
     * @var string
     */
    protected $_primary_key = 'pr_id';

    /**
     * Quy tắc
     * @var array
     */
    public $rules = array(
        'pr_title' => array(
            'field' => 'pr_title',
            'label' => 'Tên báo cáo',
            'rules' => 'trim|required|xss_clean',
        ),
        'teacher_cmt' => array(
            'field' => 'teacher_cmt',
            'label' => 'Đánh giá của giáo viên phụ trách',
            'rules' => 'trim|xss_clean',
        ),
        'company_cmt' => array(
            'field' => 'company_cmt',
            'label' => 'Đánh giá của công ty',
            'rules' => 'trim|xss_clean',
        ),
    );

    public function __construct()
    {
        parent::__construct();
    }

}

/* End of file Pr_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/Pr_model.php */
