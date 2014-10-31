<?php
class View extends Part{
	
	public function __construct($module){
		parent::__construct($module);
	}
	
	public function index($lang = ""){
		$lang = valid_language($lang);
		$this->data['language'] = $lang;
		$this->data['style'] = array('main');
		$block = $this->page_link_block_model->get_by_name('index menu');
	
		$menu = $this->static_page_in_link_block_model->get_by_block($block['id'], array('page'));
	
		$i = 0;
		foreach($menu as $m){
			$tmp = get_lang_db($m['page_title'], $lang['id']);
			$this->data['menu'][$i]['title'] = $tmp['lang_value'];
			$this->data['menu'][$i]['link'] = base_url()."index.php/".$lang['link'].$tmp['slug'];
			$i++;
		}
	
		//language
		if ($this->language_model->count_all() > 1){
			$tmp_lang = $this->language_model->get();
			$this->data['language_option'] = get_lang_label(base_url()."index.php/%l", array(), $tmp_lang, $lang);
		}
		$this->data['lang'] = $this->load->view("view/lang", $this->data, true);
	
		$template_data['title'] = "Filmroll";
		$template_data['side'] = $this->load->view("view/side", $this->data, true);
		$template_data['header'] = $this->load->view("view/header", $this->data, true);
		$template_data['body'] = $this->load->view("view/body", $this->data, true);
		$template_data['footer'] = $this->load->view("view/footer", $this->data, true);
	
		//load template
		$this->module->load->view("layouts/main", $template_data);
	}
	
	public function view($slug, $time, $lang = ""){
		$lang = valid_language($lang);
		$this->data['language'] = $lang;
		$this->data['style'] = array('main', 'reservation', 'card');
		$this->data['jscript'] = array('engine');
		
		$this->data['seats'][5][5] = 1;
		$this->data['seats'][5][6] = 1;
		$this->data['seats'][5][7] = 1;
		$this->data['seats'][5][8] = 1;
	
		$template_data['title'] = "Filmroll | rezervacia";
		$template_data['side'] = $this->load->view("view/side", $this->data, true);
		$template_data['header'] = $this->load->view("view/header", $this->data, true);
		$template_data['body'] = $this->load->view("view/body", $this->data, true);
		$template_data['footer'] = $this->load->view("view/footer", $this->data, true);
		
		$this->load->view("layouts/main", $template_data);
	}
}