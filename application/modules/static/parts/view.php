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
	
	public function view($slug, $lang = ""){
		$lang = valid_language($lang);
		$this->data['language'] = $lang;
		$this->data['style'] = array('main');
		
		//if slug is actually language
		if ($lang == "" && $this->language_model->exists_shortcut($slug)){
			$this->index($slug);
		}
		else{
			$f = "_".$slug;
			if (method_exists($this, $f)){
				call_user_func_array(array(&$this, $f), array($lang));
			}
			else{
				$this->_error_page($lang);
			}
		}
	}
	
	public function _program($lang){
		
		$this->data['style'][] = "program";
		$this->data['style'][] = "card";
		$this->data['jscript'] = array("engine");
		
		/*
		//language
		if ($this->language_model->count_all() > 1){
			$tmp_lang = $this->language_model->get();
			$replace = array();
			foreach ($tmp_lang as $l){
				$replace[$l['lang_shortcut']] = array(
						'%s' => get_lang_slug($title['group_id'], $l['id']),
				);
			}
			$this->data['language_option'] = get_lang_label(base_url()."index.php/%l/%s", $replace, $tmp_lang, $lang);
		}
		$this->data['lang'] = $this->load->view("view/lang", $this->data, true);
		*/
	
		$template_data['title'] = "Filmroll | Program";
		$template_data['side'] = $this->load->view("view/side", $this->data, true);
		$template_data['header'] = $this->load->view("view/header", $this->data, true);
		$template_data['body'] = $this->load->view("view/body_program", $this->data, true);
		$template_data['footer'] = $this->load->view("view/footer", $this->data, true);
			
		//load template
		$this->load->view("layouts/main", $template_data);
	}
	
	public function error($lang){
		$template_data['title'] = "Filmroll | stránka sa nenašla";
		$template_data['side'] = $this->load->view("view/side", $this->data, true);
		$template_data['header'] = $this->load->view("view/header", $this->data, true);
		$template_data['body'] = $this->load->view("view/body_error_page_not_find", $this->data, true);
		$template_data['footer'] = $this->load->view("view/footer", $this->data, true);
			
		//load template
		$this->load->view("layouts/main", $template_data);
	}
}