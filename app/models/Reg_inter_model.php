<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reg_inter_model extends Base_model
{
    protected $_table_name = 'register_internship';
    protected $_primary_key = 'reg_id';
    protected $_timestamps = true;

    public function __construct()
    {
        parent::__construct();
    }

}

/* End of file Reg_inter_model.php */
/* Location: .//D/Dropbox/xampp/htdocs/devteam/2015/quanlythuctap/app/models/Reg_inter_model.php */
