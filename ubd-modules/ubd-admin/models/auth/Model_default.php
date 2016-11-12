<?php
/**
 * @Author: sutejoramadhan
 * @Date:   2016-11-10 18:19:08
 * @Last Modified by:   sutejoramadhan
 * @Last Modified time: 2016-11-12 11:53:49
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_default extends CI_Model {

	public function get_login_info($username, $password)
	{
		$this->db->select('
			A.user_id,
			A.username,
			A.`password`,
			A.nama_lengkap,
			A.email,
			A.user_picture,
			A.`group`,
			A.user_status,
			B.group_level,
			B.group_name,
			B.role,
			A.registrasi_date
		');
		$this->db->from($this->config->item('table_prefix') . 'users AS A');
		$this->db->join($this->config->item('table_prefix') . 'user_groups AS B', 'A.`group` = B.user_groupd_id', 'inner');
		$this->db->where('A.username', $username);
		$this->db->where('A.password', md5($password));
		$query = $this->db->get();

		$returnData = array(
			'row' => $query->num_rows(), 
			'data' => $query->row(), 
		);

		return $returnData;
	}

}

/* End of file Model_default.php */
/* Location: .//C/xampp/htdocs/Project/ubd-cms/ubd-modules/ubd-admin/models/auth/Model_default.php */