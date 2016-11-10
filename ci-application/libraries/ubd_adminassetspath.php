<?php
/**
 * @Author: sutejoramadhan
 * @Date:   2016-11-09 14:05:16
 * @Last Modified by:   sutejoramadhan
 * @Last Modified time: 2016-11-09 14:35:22
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubd_adminassetspath
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function assets($assets = NULL)
	{
		return base_url('ubd-modules/' . $this->ci->router->fetch_module() . '/assets/' . $assets);
	}

}

/* End of file ubd_adminassetspath.php */
/* Location: ./application/libraries/ubd_adminassetspath.php */
