<?php
/**
 * @Author: sutejoramadhan
 * @Date:   2016-11-15 14:05:59
 * @Last Modified by:   sutejoramadhan
 * @Last Modified time: 2016-11-16 16:29:49
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

				$menu_seperator[$menuHeader->menu_seperator_id] = $menuSeperatorHtml;

				array_push($arMenuSeperatorHtml, $menuSeperatorHtml);
				array_push($arMenuSeperatorID, $menuHeader->menu_seperator_id);
			}

			$returnData = $menu_seperator;	
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
		foreach ($this->generateMenuSeperator() as $key => $menuSeperatorRender)
		{
			$menu_parents = $this->getMenu($key);

			if (is_array($menu_parents) AND !empty($menu_parents))
			{
				$arMenuParent = array();
				$arMenuParentHtml = array();

				foreach ($menu_parents as $key => $menu_parent)
				{
					$menuParentHtml = $this->generateMenuSeperator()[1]; 
					$menuParentHtml .= $this->li_tag_open1 . $this->li_tag_open2;
					$menuParentHtml .= "\n\t\t" . $this->link_atr_open1 . base_url('' . $menu_parent->url) . $this->link_atr_open2;
					$menuParentHtml .= $this->icon_atr1 . $menu_parent->icon . $this->icon_atr2 ." " . $this->caption_atr1 . $menu_parent->title . $this->caption_atr2 . $this->link_atr_close;
					$menuParentHtml .= "\n" . $this->li_tag_close;

					array_push($arMenuParent, $menu_parent->menu_id);
					array_push($arMenuParentHtml, $menuParentHtml);

					//echo $menuParentHtml;
				}

				$returnData = array(
					'menu_parent' => $arMenuParent, 
					'html_render' => $arMenuParentHtml, 
				);
			}
			else 
			{
				//echo "Nothing!";
			}
		}

		return $returnData;
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
