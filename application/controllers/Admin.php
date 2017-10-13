<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('layout');
		$this->layout->setFolder('admin');
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} 
	}

	public function index(){
	
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$data['active_tab'] = 'dashboard';
		
		$this->layout->view('index',$data);
	}

	public function secciones(){
		
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$data['active_tab'] = 'secciones';
		
		$this->db->select('s.*, ss.name as status, u.username, t.name as template_name');
		$this->db->from('sections s');
		$this->db->join('users u', 's.user_id = u.id');
		$this->db->join('templates t', 's.template_id = t.id', 'left');
		$this->db->join('sections_status ss', 's.status_id = ss.id', 'left');
		$data['secciones'] = $this->db->get()->result();
		
		$this->layout->view('secciones',$data);
	}

	
	public function agregar_seccion(){

		if($_POST){
			$url = $this->toAscii($_POST['name']);
			$insert['name'] = $_POST['name'];
			$insert['user_id'] = $this->tank_auth->get_user_id();
			$insert['url'] = $url;
			$insert['text'] = $_POST['text'];
			$insert['description'] = $_POST['description'];
			$insert['template_id'] = $_POST['template'];
			$insert['category_id'] = 1;
			$insert['status_id'] = $_POST['status'];
			$insert['image'] = $_POST['preview-image-input'];
			$this->db->insert('sections', $insert);
			redirect('admin/secciones');
		}

		$this->db->select('*');
		$this->db->from('templates');
		$data['templates'] = $this->db->get()->result();

		$data['active_tab'] = 'secciones';
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$this->layout->view('agregar_seccion', $data, $return=false);
	}

	
	public function editar_seccion($id){

		if($_POST){
			$url = $this->toAscii($_POST['name']);
			$update['name'] = $_POST['name'];
			$update['user_id'] = $this->tank_auth->get_user_id();
			$update['url'] = $url;
			$update['text'] = $_POST['text'];
			$update['description'] = $_POST['description'];
			$update['template_id'] = $_POST['template'];
			$update['status_id'] = $_POST['status'];
			$update['image'] = $_POST['preview-image-input'];
			$update['user_id'] = $this->tank_auth->get_user_id();


			$this->db->where('id',$id);
			$this->db->update('sections',$update);
			
			redirect('admin/secciones');
		
		}
		$data['active_tab'] = 'secciones';

		$this->db->select('*');
		$this->db->from('templates');

		$data['templates'] = $this->db->get()->result();
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();

		$data['seccion'] = $this->db->get_where('sections',array('id'=>$id))->row();
		$this->layout->view('editar_seccion', $data);
	}
	
	
	public function media(){
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$data['active_tab'] = 'media';
		$this->db->select('m.*,u.username');
		$this->db->from('media m');
		$this->db->join('users u', 'm.user_id = u.id');
		$data['files'] = $this->db->get()->result();
		$this->layout->view('media', $data);
	}
	
	public function agregar_media(){
		if($_FILES){			
			$this->upload();
		}
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$data['active_tab'] = 'media';
		$this->layout->view('agregar_media', $data);
	}

	public function perfil(){

		if($_POST){
			
			$update['username'] = $_POST['username'];
						
			$this->db->where('id', $this->tank_auth->get_user_id());
			$this->db->update('users', $update);

			if(!empty($_FILES['userfile']['name'])){
			
			$num_archivos = count($_FILES['userfile']['tmp_name']);
			$files = $_FILES;
			for ($i = 0; $i < $num_archivos; $i++) { 

				$fileName = $files['userfile']['name'][$i];
				$ext = pathinfo($fileName, PATHINFO_EXTENSION);
				$newFileName =  pathinfo($fileName, PATHINFO_FILENAME);
				$file = $this->toAscii($newFileName);
				$fecha = new DateTime();
				$finalName = $file.'_'.$fecha->getTimestamp().'.'.$ext;

				$config['file_name'] = $finalName; 
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']	= '10000';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				$_FILES['userfile']['name'] = $finalName;
				$_FILES['userfile']['type'] = $files['userfile']['type'][$i];
				$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
				$_FILES['userfile']['error'] = $files['userfile']['error'][$i];
				$_FILES['userfile']['size'] = $files['userfile']['size'][$i]; 

				if ( ! $this->upload->do_upload('userfile')){
					$error = array('error' => $this->upload->display_errors());

					print_r($error);
					die();
				}else{
						
						$update['avatar'] = $finalName;
						
						$this->db->where('id', $this->tank_auth->get_user_id());
						$this->db->update('users', $update);
					}
					
				}
			}
			redirect('admin');
		}



		$data['active_tab'] = 'perfil';
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$data['user'] = $this->db->get_where('users', array('id' => $this->tank_auth->get_user_id()));
		$this->layout->view('perfil', $data);
	}

	public function upload(){

		if(!empty($_FILES['userfile']['name'])){
			
			$num_archivos = count($_FILES['userfile']['tmp_name']);
			$files = $_FILES;
			for ($i = 0; $i < $num_archivos; $i++) { 

				$fileName = $files['userfile']['name'][$i];
				$ext = pathinfo($fileName, PATHINFO_EXTENSION);
				$newFileName =  pathinfo($fileName, PATHINFO_FILENAME);
				$file = $this->toAscii($newFileName);
				$fecha = new DateTime();
				$finalName = $file.'_'.$fecha->getTimestamp().'.'.$ext;

				$config['file_name'] = $finalName; 
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|doc|xls|docx|xlsx|ppt|pptx';
				$config['max_size']	= '10000';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				$_FILES['userfile']['name'] = $finalName;
				$_FILES['userfile']['type'] = $files['userfile']['type'][$i];
				$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
				$_FILES['userfile']['error'] = $files['userfile']['error'][$i];
				$_FILES['userfile']['size'] = $files['userfile']['size'][$i]; 

				if ( ! $this->upload->do_upload('userfile')){
					$error = array('error' => $this->upload->display_errors());

					print_r($error);
					die();
				}else{
						$insert['name'] = $file;
						$insert['type'] = $ext;
						$insert['file'] = $finalName;
						$insert['user_id'] = $this->tank_auth->get_user_id();
						$this->db->insert('media', $insert);
					}
					
				}
			}
			
			

		

	}


	public function uploadImage(){

		
			
		$num_archivos = count($_FILES['file']['tmp_name']);
		$files = $_FILES;
		

			$fileName = $files['file']['name'];
			$ext = pathinfo($fileName, PATHINFO_EXTENSION);
			$newFileName =  pathinfo($fileName, PATHINFO_FILENAME);
			$file = $this->toAscii($newFileName);
			$fecha = new DateTime();
			$finalName = $file.'_'.$fecha->getTimestamp().'.'.$ext;

			$config['file_name'] = $finalName; 
			$config['upload_path'] = './uploads/notas/';
			$config['allowed_types'] = 'gif|jpg|jpeg';
			$config['max_size']	= '10000';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			$_FILES['file']['name'] = $finalName;
			$_FILES['file']['type'] = $files['file']['type'];
			$_FILES['file']['tmp_name'] = $files['file']['tmp_name'];
			$_FILES['file']['error'] = $files['file']['error'];
			$_FILES['file']['size'] = $files['file']['size']; 

			if ( ! $this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors());

				print_r($error);
				die();
			}else{
					
				$image['location'] = base_url().'uploads/notas/'.$finalName;

				echo json_encode($image);	
				}
				
			
		
			

		

	}

	public function contactos(){
		
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$data['active_tab'] = 'contactos';
	
		$this->layout->view('contactos',$data);

	}

	public function usuarios(){
		
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$data['active_tab'] = 'usuarios';
		
		$this->layout->view('usuarios',$data);

	}


	public function get_contactos(){
		$rows = $this->db->get('contacts');
		$array = array();
		foreach ($rows->result() as $row) {
			$array[] = $row;
		}
		echo json_encode($array);
	}

	public function get_usuarios(){
		$this->db->select('u.*, r.role');
		$this->db->from('users u');
		$this->db->join('roles r', 'u.role_id = r.id');

		$rows = $this->db->get();
		$array = array();
		foreach ($rows->result() as $row) {
			$array[] = $row;
		}
		echo json_encode($array);
	}

	public function get_textos(){
		$this->db->select('t.*, s.name as sectionname');
		$this->db->from('texts t');
		$this->db->join('sections s', 't.section_id = s.id');
		$rows = $this->db->get();
		$array = array();
		foreach ($rows->result() as $row) {
			$array[] = $row;
		}
		echo json_encode($array);
	}

	public function get_contact(){
		$id = $_POST['id'];
		
		if($_POST){
			
			$rs = $this->db->get_where('contacts',array('id'=>$id));
			$products = $rs->row();
			echo json_encode($products);
			
		}

	}

	

	public function user_delete(){
		$id = $_POST['id'];
		$this->db->delete('users',array('id'=>$id));
	}	

	public function borrarSeccion($id){
		
		$this->db->delete('sections',array('id'=>$id));
	}

	public function delete_media(){
		$id = $_POST['id'];
		$this->db->delete('media',array('id'=>$id));
	}	

	

	function toAscii($str, $replace=array(), $delimiter='-') {
		$str = strip_tags($str);
		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}

		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		return $clean;
	}

	public function getMedia(){
		$this->db->select('file');
		$this->db->from('media');
		$data['images'] = $this->db->get()->result();
		echo json_encode($data['images']);
	}


	public function config(){
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$data['active_tab'] = 'config';

		$this->db->select('s.id, s.url, s.name, s.position, s.menu');
		$this->db->from('sections s');
		$this->db->where('s.status_id', 2);
		$this->db->order_by('position', 'asc');
		$data['pages'] = $this->db->get()->result();
 		$this->layout->view('config/index', $data);
	}

	public function activeMenu(){
		$active = $this->input->post('active');
		$page_id = $this->input->post('page_id');
		
		$update['menu'] = $active;
		$this->db->where('id', $page_id);
		if($this->db->update('sections', $update)){
			return 1;
		}

	}	

	public function updatePosition(){
        $table = $this->input->post('table');
        $positions = $this->input->post('positions');
        $update = array();
        $c = 1;         
        foreach ($positions as $position) {
           $update['position'] = $c;
           $this->db->where('id', $position);
           $this->db->update($table, $update);
           $c++;
        }
    }


}