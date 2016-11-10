<?php
/**
 * @author: sutejoramadhan
 * @date:   2016-11-09 12:45:24
 * @Last Modified by:   sutejoramadhan
 * @Last Modified time: 2016-11-09 13:37:11
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubd_configlib
{
	protected $ci;

	public function __construct()
	{
		date_default_timezone_set('asia/jakarta');
        $ci =& get_instance();

        $this->ci = $ci;
        $this->db = $ci->db;
	}

	public function UBDCMS_SiteOptions($option_name = NULL)
	{
		$response = $this->getSiteOptions($option_name);

		return $response->option_value;
	}

	private function getSiteOptions($option_name)
	{
		$this->db->where('option_name', $option_name);
		$query = $this->db->get('ubd_options');

		return $query->row();
	}

}

/* End of file ubd_configlib.php */
/* Location: ./application/libraries/ubd_configlib.php */
