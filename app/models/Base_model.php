<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_model extends CI_Model {

	/**
	 * Tên bảng
	 * @var string
	 */
	protected $_table_name = '';

	/**
	 * Khóa chính
	 * @var string
	 */
	protected $_primary_key = 'id';

	/**
	 * Sắp xếp theo
	 * @var string
	 */
	protected $_order_by = '';

	/**
	 * Có sử dụng ngày tháng không
	 * @var boolean
	 */
	protected $_timestamps = FALSE;

	/**
	 * Quy tắc
	 * @var array
	 */
	public $rules = array();

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Hàm lấy dữ liệu từ csdl
	 * @param  string  $cols         Cột cần lấy
	 * @param  integer $id           Giá trị của khóa chính
	 * @param  string  $where        Where
	 * @param  array   $join         Bảng cần join và điều kiện join
	 * @param  array   $limit        Giới hạn bản ghi
	 * @param  array   $order_by     Sắp xếp bởi
	 * @param  boolean $single       Trả về kết quả đơn hay không
	 * @param  boolean $return_array Trả về kết quả dạng mảng hay không
	 * @param  boolean $group_by     group_by
	 * @return object|array          Kết quả truy vấn
	 */
	public function get($cols = null, $id = null, $where = null, $join = null, $limit = null, $order_by = null, $single = false, $return_array = false, $group_by = false) {

		// Nếu truyền vào các cột được chọn thì chọn các cột đó
		if (!is_null($cols)) {
			$this->db->select($cols);
		}

		// Nếu truyền vào các bảng cần join và điều kiện join thì join với bảng đó
		if (!is_null($join) && is_array($join)) {
			foreach ($join as $item) {
				if (is_array($item) && count($item) == 2) {
					$this->db->join($item[0], $item[1], 'left'); // Left join
				}
			}
		}

		// Nếu truyền vào khóa chình thì chọn dữ liệu theo khóa chính và trả về kết quả đơn
		if (!is_null($id)) {
			$id = intval($id);
			$this->db->where($this->_table_name . '.' . $this->_primary_key, $id);
			$method = 'row';
		}
		// Trả về kết quả đơn
		elseif ($single == true) {
			$method = 'row';
		}
		// Trả về dạng mảng
		elseif ($return_array == true) {
			$method = 'result_array';
		}
		// Trả về kết quả
		else {
			$method = 'result';
		}

		// Truyền vào biến where
		if (!is_null($where) && is_array($where) && count($where) > 0) {
			foreach ($where as $el) {
				if (count($el) == 2) {
					if (is_string($el[0]) && is_array($el[1])) {

						// Where in
						$this->db->where_in($el[0], $el[1]);
					} else {

						// Where
						$this->db->where($el[0], $el[1]);
					}

				}
			}
		}

		// Có giới hạn kết quả trả về
		if (!is_null($limit)) {
			if (is_array($limit) && count($limit) == 2) {
				$this->db->limit($limit[0], $limit[1]);
			} else {
				$this->db->limit($limit);
			}
		}

		// Sắp xếp theo
		if (!is_null($order_by) && is_array($order_by) && count($order_by) == 2) {
			$this->db->order_by($order_by[0], $order_by[1]);
		}

		// Nhóm bởi
		if ($group_by != false) {
			$this->db->group_by($group_by);
		}

		// Trả về kết quả
		return $this->db->get($this->_table_name)->$method();
	}

	/**
	 * Lấy kết quả bởi 1 điều kiện
	 * @param  string  $where   Điều kiện truy vấn
	 * @param  boolean $single  Trả về kết quả đơn
	 * @return object|array     Kết quả truy vấn
	 */
	public function get_by($where, $single = false) {
		$this->db->where($where);
		return $this->get(null, null, null, null, null, null, $single);
	}

	/**
	 * Lưu kết quả vào csdl
	 * @param  array   $data    Mảng dữ liệu cần lưu
	 * @param  integer $id      Giá trị khóa chính
	 * @param  string  $where   Điều kiện lưu
	 * @return boolean|integer  Giá trị khóa chính hoặc đúng sai
	 */
	public function save($data, $id = null, $where = null) {

		// Nếu cài đặt thêm thời gian, tự động thêm trường created_at và updated_at vào csdl
		if ($this->_timestamps) {
			$now = date('Y-m-d H:i:s');
			$id || $data['created_at'] = $now;
			$data['updated_at'] = $now;
		}

		// Nếu không có giá khóa chính thì thêm dữ liệu mới
		if (is_null($id) && is_null($where)) {
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
			return $id;
		}
		// Có khóa chính, cập nhật dữ liệu của khóa chính này.
		else {
			$this->db->set($data);
			if (!is_null($id)) {
				if (is_array($id)) {
					$this->db->where_in($this->_primary_key, $id);
				} else {
					$this->db->where($this->_primary_key, $id);
				}
			}

			// Điều kiện cập nhật dữ liệu
			if (is_array($where) && count($where) == 2) {
				foreach ($where as $w) {
					if (is_array($w) && count($w) == 2) {
						$this->db->where($w[0], $w[1]);
					}
				}
			}

			// Cập nhật thành công
			if ($this->db->update($this->_table_name)) {
				return TRUE;
			}
		}
		// Cập nhật thất bại
		return FALSE;
	}

	/**
	 * Xóa
	 * @param  integer  $id   Giá trị khóa chính
	 * @param  boolean $many  Xóa nhiều nay không
	 * @return boolean        Kết quả
	 */
	public function delete($id, $many = false) {

		// Nếu không truyền vào ID thì dừng
		if (!$id) {
			return FALSE;
		}

		// Xóa nhiều
		if (is_array($id)) {
			foreach ($id as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		// Xóa 1
		else {
			$this->db->where($this->_primary_key, $id);
		}
		if (!$many) {
			$this->db->limit(1);
		}
		// Xóa thành công
		if ($this->db->delete($this->_table_name)) {
			return TRUE;
		}
		// Xóa thất bại
		else {
			return FALSE;
		}
	}
}

/* End of file Base_Model.php */
/* Location: ./application/models/Base_Model.php */