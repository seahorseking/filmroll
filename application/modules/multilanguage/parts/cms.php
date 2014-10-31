<?php
class CMS extends Part{
	
	public function __construct($module){
		parent::__construct($module);
		
		//library
		$this->load->library("form_validation");
		
		//language
		$this->data['language'] = $this->language_model->get();
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
						'text' => "nový jazyk",
						'link' => base_url()."index.php/cms/multilanguage/add",
				),
				1 => array(
						'text' => "predvolený",
						'link' => base_url()."index.php/cms/multilanguage/def",
				),
		);
		
		$this->data['path'] = array(
				0 => array(
						'text' => "domov",
						'link' => base_url()."index.php/cms",
				),
				1 => array(
						'text' => "jazyk",
						'link' => base_url()."index.php/cms/multilanguage",
				),
		);
		
		$this->data['login'] = array(
				'link' => base_url()."index.php/cms/admin/login/logout",
				'text' => "odhlásenie",
		);
		
		//title
	}
	
	public function index($page = 1){
		if (is_admin_login_redirect($this)){
			$this->data['get_language'] = $this->language_model->get_list(array(), ($page - 1) * $this->limit, $this->limit);
			
			$this->data['page'] = $page;
			$this->data['page_offset'] = 3;
			$this->data['page_last'] = ceil($this->language_model->count_all() / $this->limit);
			$this->data['page_link'] = base_url()."index.php/cms/multilanguage/index/%p";
			
			$template_data['title'] = "CMS jazyk";
			$template_data['header'] = $this->load->view("cms/header", $this->data, true);
			$template_data['body'] = $this->load->view("cms/body", $this->data, true);
			$template_data['menu'] = $this->load->view("cms/menu", $this->data, true);
			$template_data['submenu'] = $this->load->view("cms/submenu", $this->data, true);
			$template_data['footer'] = $this->load->view("cms/footer", $this->data, true);
				
			//load template
			$this->module->load->view("layouts/cms", $template_data);
		}
	}
	
	public function _save_add($id){
		$def = $this->language_model->get_default();
		if ($def != false){
			$def = 0;
		}
		else{
			$def = 1;
		}
		$table_data = array(
				'lang_name' => $this->input->post('name'),
				'lang_shortcut' => strtolower($this->input->post('shortcut')),
				'lang_default' => $def,
		);
		$this->language_model->save($table_data, $id);
		redirect("cms/multilanguage");
	}
	
	public function _set_default(){
		$this->language_model->set_default($this->input->post('default'));
		redirect("cms/multilanguage");
	}
	
	public function add($id = 0){
		if (is_admin_login_redirect($this)){

			if ($id == 0 || $this->language_model->exists($id)){
				
				$this->form_validation->set_rules('name', 'názov', 'required|max_length[20]');
				$this->form_validation->set_rules('shortcut', 'skratka', 'required|max_length[2]');
				
				if ($this->form_validation->run() !== false){
					$this->_save_add($id);
				}
				
				if ($id == 0){
					$this->data['lang_db'] = array(
							'id' => 0,
							'lang_name' => "",
							'lang_shortcut' => "",
					);	
				}
				else{
					$this->data['lang_db'] = $this->language_model->get(array(), $id);
				}
				
				if ($id > 0){
					$this->data['path'][] = array(
							'text' => "uprav",
							'link' => base_url()."index.php/cms/multilanguage/add/".$id,
					);
				}
				else{
					$this->data['path'][] = array(
							'text' => "nový",
							'link' => base_url()."index.php/cms/multilanguage/add",
					);
				}
				
				
				$template_data['title'] = "CMS jazyk";
				$template_data['header'] = $this->load->view("cms/header", $this->data, true);
				$template_data['body'] = $this->load->view("cms/body_add", $this->data, true);
				$template_data['menu'] = $this->load->view("cms/menu", $this->data, true);
				$template_data['submenu'] = $this->load->view("cms/submenu", $this->data, true);
				$template_data['footer'] = "";
		
				//load template
				$this->module->load->view("layouts/cms", $template_data);
			}
			else{
				$this->_error_message("Nesprávny jazyk");
			}
		}
	}
	
	public function def(){
		if (is_admin_login_redirect($this)){
	
			$this->form_validation->set_rules('default', 'predvolený', 'required|is_natural|callback_id_exists[language_model]');

			if ($this->form_validation->run() !== false){
				$this->_set_default();
			}

			$this->data['path'][] = array(
					'text' => 'predvolený',
					'link' => base_url()."index.php/cms/multilanguage/def",
			);
			
			$this->data['lang_def'] = $this->language_model->get_default();
			$template_data['title'] = "CMS jazyk";
			$template_data['header'] = $this->load->view("cms/header", $this->data, true);
			$template_data['body'] = $this->load->view("cms/body_default", $this->data, true);
			$template_data['menu'] = $this->load->view("cms/menu", $this->data, true);
			$template_data['submenu'] = $this->load->view("cms/submenu", $this->data, true);
			$template_data['footer'] = "";

			//load template
			$this->module->load->view("layouts/cms", $template_data);
		}
	}
	
	public function remove($id){
		if (is_admin_login_redirect($this)){
	
			if ($this->language_model->exists($id)){
				$this->language_model->remove($id);
			}
			
			redirect("cms/multilanguage");
		}
	}
}