<?php
class Payment extends Part{
	
	public function __construct($module){
		parent::__construct($module);
	}
	
	public function index($lang = ""){
		$lang = valid_language($lang);
		$this->data['language'] = $lang;
		$this->data['style'] = array('main', 'reservation');
		
		$template_data['title'] = "Filmroll | rezervácia dokončenie";
		$template_data['side'] = $this->load->view("view/side", $this->data, true);
		$template_data['header'] = $this->load->view("view/header", $this->data, true);
		$template_data['body'] = $this->load->view("payment/body", $this->data, true);
		$template_data['footer'] = $this->load->view("view/footer", $this->data, true);
		
		$this->load->view("layouts/main", $template_data);
	}
}