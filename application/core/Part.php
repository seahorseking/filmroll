<?php
class Part extends CI_Controller{
	
	//module name this part was created by
	protected $module;
	
	protected $data;
	protected $limit;
	
	public function __construct($module){
		parent::__construct($module->module_name);
		
		$this->module = $module;
		
		$this->limit = 15;
		
		if (!$this->module_lib->required($this->module->module_name)){
			die($this->module_lib->get_error_message());
		}
	}
	
	public function _error_message($message){
		$this->data['message'] = $message;
		$template_data['title'] = "CMS chyba";
		$template_data['header'] = $this->load->view("cms/header", $this->data, true);
		$template_data['body'] = $this->load->view("cms/body_error", $this->data, true);
		$template_data['menu'] = $this->load->view("cms/menu", $this->data, true);
		$template_data['footer'] = "";
		
		//load template
		$this->module->load->view("layouts/cms", $template_data);
	}
	
	public function id_exists($value, $model){
		if ($this->$model->exists($value)){
			return true;
		}
		$this->form_validation->set_message('id_exists', 'id doesn\'t belongs to database');
		return false;
	}
	
}