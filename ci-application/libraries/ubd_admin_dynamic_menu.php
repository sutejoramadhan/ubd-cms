<?php
/**
 * @Author: sutejoramadhan
 * @Date:   2016-11-15 14:05:59
 * @Last Modified by:   sutejoramadhan
 * @Last Modified time: 2016-11-15 17:27:43
 *
 * Library ini merupakan library anakan/terusan serta pengembangan dari 
 * library dynamic menu saya yg lain(ist_lib_dynamic_menu). 
 * Sederhana sekali logic saya di lybrary ini. hhehe
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubd_admin_dynamic_menu
{
	protected $ci;

	/**
	 * Baris kode yang bisa diubah sesuai kebutuhan.
	 * config html tag.
	 */
	/*main ul li tag, sesuaikan dengan template*/
	private $ul_tag_open1 = '<ul';
	private $ul_tag_open2 = '>';
	private $ul_tag_close = '</ul>';
	private $li_tag_open1 = '<li';
	private $li_tag_open2 = '>';
	private $li_tag_close = '</li>';

	/*class atribut, sesuai dengan class template*/
	private $main_ul_class = ' class="sidebar-menu"';
	private $header_li_class = ' class="header"';
	private $parent_li_class = ' class="treeview"';
	private $noparent_li_class = '';
	private $child_ul_class = 'class="treeview-menu"';

	/*link dan icon atribut, sesuaikan dengan template*/
	private $link_atr_open1 = '<a href="';
	private $link_atr_open2 = '">';
	private $link_atr_close = '</a>';
	private $icon_atr1 = '<i class="';
	private $icon_atr2 = '"></i>';
	//private $span_right_atr = '<span class="fa arrow"></span>';	

	/*menu caption/judul atribut, sesuaikan dengan template*/
	private $caption_atr1 = '<span> ';
	private $caption_atr2 = ' </span>';

	public function __construct()
	{
        $ci =& get_instance();
        $this->ci = $ci;
        $this->db = $ci->db;

        $this->ci->load->helper('array');
	}

	public function create_menu()
	{
		return $this->generateMenu();
	}

	/**
	 * generateMenuSeperator [function untuk generate menu seperator]
	 * 
	 * @return array
	 */
	private function generateMenuSeperator()
	{
		$menuHeaders = $this->getMenuSeperator();

		if (is_array($menuHeaders))
		{
			$arMenuSeperatorID = array();
			$arMenuSeperatorHtml = array();
			
			foreach ($menuHeaders as $key => $menuHeader) 
			{
				$menuSeperatorHtml = $this->li_tag_open1 . $this->header_li_class . $this->li_tag_open2 . strtoupper($menuHeader->menu_seperator_title) . $this->li_tag_close;

				array_push($arMenuSeperatorHtml, $menuSeperatorHtml);
				array_push($arMenuSeperatorID, $menuHeader->menu_seperator_id);
			}

			$returnData = array(
				'menu_seperator' => $arMenuSeperatorID,
				'html_render' => $arMenuSeperatorHtml,
			);		
		} 
		else 
		{
			$returnData = array();
		}

		return $returnData;
	}


	/**
	 * generateMenuSeperator [function untuk generate menu parent]
	 * 
	 * @return array
	 */
	public function generateMenu()
	{
		$menuSeperators = $this->generateMenuSeperator();

		$arMenuParentID = array();
		$arMenuHtml = array();

		print_r($menuSeperators);

		foreach ($menuSeperators['menu_seperator'] as $key) 
		{
			//echo $menuSeperators['menu_seperator'][$key];
		}

		//echo $menuSeperators['menu_seperator'][0];

		//return $menuSeperators['menu_seperator'];
	}
	

	/** Geting data **/
	private function getMenuSeperator()
	{
		$query = $this->db->get('menu_seperator');

		return $query->result();
	}

	private function getMenu($menu_seperator)
	{
		$this->db->select('A.*, B.*');
		$this->db->from('ubd_menu AS A');
		$this->db->join('ubd_menu_roles AS B', 'A.menu_id = B.menu_id', 'inner');
		$this->db->where('B.user_group_id', 1);
		$this->db->where('A.menu_parent_id', 0);
		$this->db->where('A.menu_seperator', $menu_seperator);
		$this->db->order_by('A.`order`', 'ASC');
		$query = $this->db->get();

		return $query->result();
		//return $this->db->last_query();
	}

	private function getSubMenu($menu_parent_id)
	{
		$this->db->select('A.*, B.*');
		$this->db->from('ubd_menu AS A');
		$this->db->join('ubd_menu_roles AS B', 'A.menu_id = B.menu_id', 'inner');
		$this->db->where('B.user_group_id', 1);
		$this->db->where('A.menu_parent_id', $menu_parent_id);
		$this->db->order_by('A.`order`', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}
	/** /Geting data **/

	

}

/* End of file ubd_admin_dynamic_menu.php */
/* Location: ./application/libraries/ubd_admin_dynamic_menu.php */
