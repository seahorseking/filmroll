<?php
class Login extends Part{
	
	public function __construct($module){
		parent::__construct($module);
		
		$this->load->library("form_validation");
		$this->load->library("Bcrypt");
		
		$this->data['path'] = array(
				0 => array(
						'text' => "domov",
						'link' => base_url()."index.php/cms",
				),
		);
		
		$this->data['login'] = array(
				'link' => base_url()."index.php/cms/admin/login/login",
				'text' => "prihlásenie",
		);
	}
	
	public function login_validation(){
		if ($user = $this->admin_model->get_login($this->input->post('name'))){
			if ($this->bcrypt->check_password($this->input->post('password').$user['salt'], $user['password'])){
				return true;
			}
		}
		$this->form_validation->set_message('login_validation', 'Nesprávne meno alebo heslo');
		return false;
	}
	
	public function _login($name){
		$login = $this->admin_model->get_login($name);
		$this->session->set_userdata('admin_id', $login['id']);
		redirect("cms");
	}
	
	public function index(){
		if (is_admin_login_redirect($this)){
			//form validation rules
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('password', 'password', 'required|callback_login_validation');
				
			//form validation
			if ($this->form_validation->run() !== false ){
				$this->_login($this->input->post('name'));
			}
			
			//header
			$tmp = cms_header();
			$i = 0;
			foreach ($tmp as $h){
				$tmp[$i]['link'] = base_url()."index.php/".$h['link'];
				$i++;
			}
			$this->data['menu'] = $tmp;
			
			$this->data['login'] = array(
					'link' => base_url()."index.php/cms/admin/login/logout",
					'text' => "odhlásenie",
			);
			
			//form
			$layout_data['title'] = "CMS index";
			$layout_data['header'] = $this->load->view("cms/header", $this->data, true);
			$layout_data['body'] = $this->load->view("home", $this->data, true);
			$layout_data['menu'] = $this->load->view("cms/menu", $this->data, true);
			$layout_data['submenu'] = $this->load->view("cms/submenu", $this->data, true);
			$layout_data['footer'] = $this->load->view("cms/footer", $this->data, true);
				
			//
			$this->model->load->view("layouts/cms", $layout_data);
		}
	}
	
	public function login(){
		if (!is_admin_login($this)){
			//form validation rules
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('password', 'password', 'required|callback_login_validation');
			
			//form validation
			if ($this->form_validation->run() !== false ){
				$this->_login($this->input->post('name'));
			}
			
			//form
			$layout_data['title'] = "CMS login";
			$layout_data['header'] = $this->load->view("cms/header", $this->data, true);;
			$layout_data['body'] = $this->load->view("login/body", $this->data, true);
			$layout_data['menu'] = "";
			$layout_data['submenu'] = "";
			$layout_data['footer'] = "";
			
			//
			$this->model->load->view("layouts/cms", $layout_data);
		}
		else{
			redirect("cms/static");
		}
	}
	
	public function logout(){
		$this->session->unset_userdata('admin_id');
		redirect("cms");
	}
}