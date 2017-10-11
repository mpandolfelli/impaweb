<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('layout');
		$this->layout->setLayout('layout-web');
		
	}

	public function index($url = null){
		if(isset($url)){
			$this->layout->setFolder('web/templates');
			$this->db->select('s.name as page_title,s.text as page_content,s.id as section_id, t.*, s.status_id as status, s.image, u.username, u.avatar');
			$this->db->from('sections s');
			$this->db->join('templates t', 's.template_id = t.id');
			$this->db->join('users u', 's.user_id = u.id');

			$this->db->where('url', $url);
			$data['section'] = $this->db->get()->row();

			//si no existe la url o esta en draft muestro 404
			if($data['section'] == '' || $data['section']->status == STATUS_DRAFT){
				$this->layout->view('errors/html/error_404');				
				die();
			}else{
				//Si la url existe muestro la seccion con los post relacionados
				$data['related'] = $this->getRelatedPost($data['section']->section_id);
				$template = $data['section']->template;
				$this->layout->view($template, $data);
			}
			
		}else{
			//Muestro el index con todos los post
			$data['posts'] = $this->getPosts();		
			$data['related'] = $this->getRelatedPost();
			$this->layout->setFolder('web');
			$this->layout->view('index', $data);
		}
		
	}

	private function getPosts(){
		$this->db->select('*');
		$this->db->from('sections');
		$this->db->where('category_id', 1);
		$this->db->where('status_id', 2);
		return $this->db->get()->result();
	}


	private function getRelatedPost($post_id = false){
		$this->db->select('*');
		$this->db->from('sections');
		$this->db->where('template_id', 2);
		$this->db->where('status_id', 2);
		if($post_id){
			$this->db->where('id !=', $post_id);

		}

		return $this->db->get()->result();
	}
}