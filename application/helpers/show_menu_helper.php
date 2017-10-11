<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('show_menu'))
{
    function show_menu()
    {

		$CI =& get_instance();   
		$CI->db->select('s.name, s.url');
		$CI->db->from('sections s');
		$CI->db->where('s.menu', 1);
		$CI->db->order_by('s.position', 'asc');
		$pages =$CI->db->get()->result();

		foreach ($pages as $page) {
				echo '<li><a href="'.$page->url.'">'.$page->name.'</a></li>';
		}

    }   
}