<?php
class Profile extends Part{
	
	public function __construct($module){
		parent::__construct($module);
		
		$this->load->library("form_validation");
		$this->load->library("Bcrypt");
		
		//header
		$tmp = cms_header();
		$i = 0;
		foreach ($tmp as $h){
			$tmp[$i]['link'] = base_url()."index.php/".$h['link'];
			$i++;
		}
		$this->data['menu'] = $tmp;
		
		//menu
		$this->data['submenu'] = array(
				0 => array(
						'text' => "zmena hesla",
						'link' => base_url()."index.php/cms/admin/profile/password",
				),
		);
		
		$this->data['path'] = array(
				0 => array(
						'text' => "domov",
						'link' => base_url()."index.php/cms",
				),
				1 => array(
						'text' => "konto",
						'link' => base_url()."index.php/cms/admin/profile",
				),
		);
		
		$this->data['login'] = array(
				'link' => base_url()."index.php/cms/admin/login/logout",
				'text' => "odhlásenie",
		);
	}
	
	public function password_validation(){
		if ($user = $this->admin_model->get_login_by_id($this->session->userdata('admin_id'))){
			if ($this->bcrypt->check_password($this->input->post('old_password').$user['salt'], $user['password'])){
				return true;
			}
		}
		$this->form_validation->set_message('password_validation', 'Nesprávne staré heslo');
		return false;
	}
	
	public function _login($name){
		$login = $this->admin_model->get_login($name);
		$this->session->set_userdata('admin_id', $login['id']);
		redirect("cms/static");
	}
	
	public function index(){
		if (is_admin_login_redirect($this)){
			//form validation rules
			$this->form_validation->set_rules('nickname', 'nickname', 'required|max_length[50]');
			$this->form_validation->set_rules('name', 'meno', 'max_length[30]');
			$this->form_validation->set_rules('surname', 'priezvisko', 'max_length[30]');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[100]');
				
			//form validation
			if ($this->form_validation->run() !== false ){
				$this->_edit_profile();
			}
			
			$this->data['profile'] = $this->admin_model->get(array(), $this->session->userdata('admin_id'));
			
			//form
			$layout_data['title'] = "CMS účet";
			$layout_data['header'] = $this->load->view("cms/header", $this->data, true);
			$layout_data['body'] = $this->load->view("profile/body", $this->data, true);
			$layout_data['menu'] = $this->load->view("cms/menu", $this->data, true);
			$layout_data['submenu'] = $this->load->view("cms/submenu", $this->data, true);
			$layout_data['footer'] = $this->load->view("cms/footer", $this->data, true);
				
			$this->model->load->view("layouts/cms", $layout_data);
		}
	}
	
	public function _edit_profile(){
		$table_data = array(
				'admin_nickname' => $this->input->post('nickname'),
				'email' => $this->input->post('email'),
		);
		if ($this->input->post('surname') != false){
			$table_data['admin_surname'] = $this->input->post('surname');
		}
		if ($this->input->post('name') != false){
			$table_data['admin_name'] = $this->input->post('name');
		}
		$this->admin_model->save($table_data, $this->session->userdata('admin_id'));
		redirect("cms");
	}
	
	public function password(){
		if (is_admin_login_redirect($this)){
			//form validation rules
			$this->form_validation->set_rules('old_password', 'staré heslo', 'required|callback_password_validation');
			$this->form_validation->set_rules('new_password', 'nové heslo', 'required');
			$this->form_validation->set_rules('repeat_password', 'zopakuj heslo', 'required|matches[new_password]');
			
			if ($this->form_validation->run() == true){
				$this->_edit_password();
			}
	
			//form validation
			if ($this->form_validation->run() !== false ){
				$this->_edit_profile();
			}
	
			$this->data['path'][2] = array(
						'text' => "Zmena hesla",
						'link' => base_url()."index.php/cms/admin/profile/password",
			);
				
			$this->data['profile'] = $this->admin_model->get(array(), $this->session->userdata('admin_id'));
				
			//form
			$layout_data['title'] = "CMS heslo";
			$layout_data['header'] = $this->load->view("cms/header", $this->data, true);
			$layout_data['body'] = $this->load->view("profile/body_password", $this->data, true);
			$layout_data['menu'] = $this->load->view("cms/menu", $this->data, true);
			$layout_data['submenu'] = $this->load->view("cms/submenu", $this->data, true);
			$layout_data['footer'] = $this->load->view("cms/footer", $this->data, true);
	
			//
			$this->model->load->view("layouts/cms", $layout_data);
		}
	}
	
	public function _edit_password(){
		$user = $this->admin_model->get_login_by_id($this->session->userdata('admin_id'));
		$table_data = array(
				'password' => $this->bcrypt->hash_password($this->input->post('new_password').$user['salt']),
		);
		$this->admin_model->save($table_data, $this->session->userdata('admin_id'));
		redirect("cms/admin/profile");
	}
	
}