<?php
class CMS extends Part{
	
	public function __construct($module){
		parent::__construct($module);
		
		//libraries
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
		 				'text' => "nová stránka",
		 				'link' => base_url()."index.php/cms/static/add",
		 		),
		 		1 => array(
		 				'text' => "odkazy",
		 				'link' => base_url()."index.php/cms/static/link",
		 		),
		 		2 => array(
		 				'text' => "nový odkaz",
		 				'link' => base_url()."index.php/cms/static/edit_link",
		 		),
		 );
		 $this->data['path'] = array(
		 		0 => array(
		 				'text' => "domov",
		 				'link' => base_url()."index.php/cms",
		 		),
		 		1 => array(
		 				'text' => "stránky",
		 				'link' => base_url()."index.php/cms/static",
		 		),
		 );
		 
		 $this->data['login'] = array(
		 		'link' => base_url()."index.php/cms/admin/login/logout",
		 		'text' => "odhlásenie",
 		);
	}
	
	public function index($page = 1){
		if (is_admin_login_redirect($this)){
			$this->data['pages'] = $this->static_page_model->get_list(array(), ($page - 1) * $this->limit, $this->limit);
			
			$this->data['page'] = $page;
			$this->data['page_offset'] = 3;
			$this->data['page_last'] = ceil($this->static_page_model->count_all() / $this->limit);
			$this->data['page_link'] = base_url()."index.php/cms/static/index/%p";
			
			$template_data['title'] = "CMS stránky";
			$template_data['header'] = $this->load->view("cms/header", $this->data, true);
			$template_data['body'] = $this->load->view("cms/body", $this->data, true);
			$template_data['menu'] = $this->load->view("cms/menu", $this->data, true);
			$template_data['submenu'] = $this->load->view("cms/submenu", $this->data, true);
			$template_data['footer'] = $this->load->view("cms/footer", $this->data, true);
			
			//load template
			$this->module->load->view("layouts/cms", $template_data);
		}
	}
	
	public function is_unique_folder($folder, $id){
		$used_folders = array();
		$folder_id = 0;
		if ($this->static_page_model->exists_by_folder($folder)){
			$folder_id = $this->static_page_model->get_by_folder($folder)['id'];
		}
		if ($folder_id != $id || in_array($this->input->post('folder'), $used_folders)){
			$this->form_validation->set_message('is_unique_folder', 'Folder has to have unique name');
			return false;
		}
		return true;
	}
	
	public function add($id = 0){
		if (is_admin_login_redirect($this)){
			if ($id == 0 || $this->static_page_model->exists($id)){
				
				if ($id == 0){
					$this->data['page'] = array(
							'id' => 0,
							'folder' => "",
							'page_title' => 0,
							'dynamic' => 0,
					);
					$this->form_validation->set_rules('folder', 'folder', 'required|callback_is_unique_folder['.$id.']');
				}
				else{
					$this->data['page'] = $this->static_page_model->get(array(), $id);
				}
				$this->form_validation->set_rules('dynamic', 'dynamic', '');
				
				foreach ($this->data['language'] as $l){
					$this->form_validation->set_rules('title_'.$l['lang_shortcut'], 'jazyk '.$l['lang_name'], 'required');
				}
				
				if ($this->form_validation->run() !== false){
					if ($id == 0){
						$this->_save_add();
					}
					else{
						$this->_update_add($this->data['page']);
					}
				}
				
				if ($id > 0){
					$this->data['path'][] = array(
							'text' => "uprav",
							'link' => base_url()."index.php/cms/static/add/".$id,
					);
				}
				else{
					$this->data['path'][] = array(
							'text' => "nový",
							'link' => base_url()."index.php/cms/static/add",
					);
				}
				
				$template_data['title'] = "CMS stránky";
				$template_data['header'] = $this->load->view("cms/header", $this->data, true);
				$template_data['body'] = $this->load->view("cms/body_add", $this->data, true);
				$template_data['menu'] = $this->load->view("cms/menu", $this->data, true);
				$template_data['submenu'] = $this->load->view("cms/submenu", $this->data, true);
				$template_data['footer'] = $this->load->view("cms/footer", $this->data, true);
					
				//load template
				$this->module->load->view("layouts/cms", $template_data);
			}
			else{
				$this->_error_message("Nesprávna stránka");
			}
		}
	}
	
	public function _save_add(){
		if (is_admin_login_redirect($this)){
			//get lable
			$label_id = null;
			$label = $this->private_label_model->get_by_label('static');
			if ($label != false){
				$label_id = $label['id'];
			}
			//group save
			$table_data = array(
					'private_id' => $label_id,
			);
			$group = $this->translation_group_model->save($table_data);
			
			//concrete transaltions
			foreach ($this->data['language'] as $lang){
				$table_data = array(
						'lang_id' => $lang['id'],
						'group_id' => $group,
						'lang_value' => $this->input->post('title_'.$lang['lang_shortcut']),
						'slug' => url_title(convert_accented_characters($this->input->post('title_'.$lang['lang_shortcut'])), '-', TRUE),
				);
				$this->translation_model->save($table_data);
			}
			$table_data = array(
					'folder' => $this->input->post('folder'),
					'page_title' => $group,
					'post_date' => date('Y-n-d H:i:s'),
					'edit_date' => date('Y-n-d H:i:s'),
					'dynamic' => $this->input->post('dynamic'),
			);
			$this->static_page_model->save($table_data);
			mkdir('./application/views/static_page/'.$this->input->post('folder'), 0777);
			redirect("cms/static");
		}
	}
	
	public function _update_add($page){
		if (is_admin_login_redirect($this)){
			//concrete translations
			foreach ($this->data['language'] as $lang){
				$table_data = array(
						'lang_value' => $this->input->post('title_'.$lang['lang_shortcut']),
						'slug' => url_title(convert_accented_characters($this->input->post('title_'.$lang['lang_shortcut'])), '-', TRUE),
				);
				$group = $this->translation_model->update($table_data, $page['page_title'], $lang['id']);
			}
			
			$table_data = array(
					'edit_date' => date('Y-n-d H:i:s'),
					'dynamic' => $this->input->post('dynamic'),
			);
			$this->static_page_model->save($table_data, $page['id']);
			rename('./application/views/static_page/'.$page['folder'], './application/views/static_page/'.$this->input->post('folder'));
			redirect("cms/static");
		}
	}
	
	public function edit($id, $language = ""){
		if (is_admin_login_redirect($this)){
			
			if ($this->static_page_model->exists($id)){
				//MY_EDITOR
				/*
				$language = valid_language($language);
				$this->data['page'] = $this->static_page_model->get(array(), $id);
				$this->load->library("editor");
				
				//set editor
				$this->editor->set_id($id);
				$this->editor->set_language($language);
				$this->editor->set_url("cms/static_page", "/save");
				$this->editor->set_load_url("./application/views/static_page/".$this->data['page']['folder']);
				
				//compute editor
				$template_data['body'] = $this->editor->init_load();
				
				//values for menu editor
				$this->data['editor_title'] = $this->editor->get_title();
				$this->data['editor_body'] = $this->editor->get_body();
				
				//jscript
				$this->data['jscript'] = array('jquery_general', 'jscript_editor');
				
				$template_data['title'] = "CMS stránky";
				$template_data['header'] = $this->load->view("cms/header", $this->data, true);
				$template_data['body'] = $this->editor->get_load();
				$template_data['body'] .= $this->load->view("cms/body_editor", $this->data, true);
				$template_data['menu'] = $this->load->view("cms/menu_editor", $this->data, true);
				$template_data['footer'] = $this->load->view("cms/footer", $this->data, true);
			
				//load template
				$this->module->load->view("layouts/cms", $template_data);
				*/
				
				//TINYEDITOR
				$language = valid_language($language);
				$this->data['page'] = $this->static_page_model->get(array(), $id);
				$this->load->library("wysiwyg");
				
				//set editor
				$this->wysiwyg->set_id($id);
				$this->wysiwyg->set_language($language);
				$this->wysiwyg->set_url("cms/static", "/save");
				$this->wysiwyg->set_load_url("./application/views/static_page/".$this->data['page']['folder']);
				
				$this->wysiwyg->init_load();
				$this->data['load'] = $this->wysiwyg->get_load();
				
				//jscript
				$this->data['jscript'] = array('jquery_general', 'tinyeditor/packed', 'tinyeditor/tinyeditor', 'tinyeditor/tinyeditor_ext', 'tinyeditor/event');
				$this->data['style'] = array('tinyeditor/style', 'tinyeditor/ext_style');
				
				$this->data['path'][] = array(
						'text' => 'obsah',
						'link' => base_url()."index.php/cms/static/edit/".$id,
				);
				
				$template_data['title'] = "CMS stránky";
				$template_data['header'] = $this->load->view("cms/header", $this->data, true);
				$template_data['body'] = $this->load->view("cms/body_wysiwyg", $this->data, true);
				$template_data['menu'] = $this->load->view("cms/menu", $this->data, true);
				$template_data['submenu'] = $this->load->view("cms/menu_wysiwyg", $this->data, true);
				$template_data['footer'] = $this->load->view("cms/footer", $this->data, true);
					
				//load template
				$this->module->load->view("layouts/cms", $template_data);
			}
			else{
				$this->_error_message("Nesprávna stránka");
			}
		}
	}
	
	public function save($id, $language = ""){
		if (is_admin_login($this)){
				
			if ($this->static_page_model->exists($id)){
				$language = valid_language($language);
				
				$this->form_validation->set_rules('body', 'body', 'required');
				
				if ($this->form_validation->run() === FALSE){
					$log = "ID: ".$edit_id.PHP_EOL;
					$log .= "BODY: ".$this->input->post('body').PHP_EOL;
					$log .= "LANG: ".$this->data['language']['lang_shortcut'].PHP_EOL;
					write_file("./log/static/".date("Y-n-d-H-i-s").".txt", $log);
					echo validation_errors();
				}
				else{
					$lang_ext = "_".$language['lang_shortcut'];
					
					$page = $this->static_page_model->get(array(), $id);
						
					write_file("./application/views/static_page/".$page['folder']."/body".$lang_ext.".txt", $this->input->post('body'));
					
					echo "success";
				}
			}
			else{
				echo "fail";
			}
		}
		else{
			echo "fail";
		}
	}
	
	public function link($page = 1){
		if (is_admin_login_redirect($this)){
			$this->data['links'] = $this->static_page_in_link_block_model->get_list(array('block', 'page'), ($page - 1) * $this->limit, $this->limit);
			
			$this->data['page'] = $page;
			$this->data['page_offset'] = 3;
			$this->data['page_last'] = ceil($this->static_page_in_link_block_model->count_all() / $this->limit);
			$this->data['page_link'] = base_url()."index.php/cms/static/link/%p";
			
			$this->data['path'][] = array(
					'text' => 'odkazy',
					'link' => base_url()."index.php/cms/static/link",
			);
			
			$template_data['title'] = "CMS odkazy";
			$template_data['header'] = $this->load->view("cms/header", $this->data, true);
			$template_data['body'] = $this->load->view("cms/body_link", $this->data, true);
			$template_data['menu'] = $this->load->view("cms/menu", $this->data, true);
			$template_data['submenu'] = $this->load->view("cms/submenu", $this->data, true);
			$template_data['footer'] = $this->load->view("cms/footer", $this->data, true);
				
			//load template
			$this->module->load->view("layouts/cms", $template_data);
		}
	}
	
	public function _save_link($id){
		$table_data = array(
				'page_id' => $this->input->post('page'),
				'block_id' => $this->input->post('block'),
				'position' => $this->input->post('position'),
		);
		$this->static_page_in_link_block_model->save($table_data, $id);
		redirect("cms/static/link");
	}
	
	public function edit_link($id = 0){
		if (is_admin_login_redirect($this)){
	
			if ($id == 0 || $this->static_page_in_link_block_model->exists($id)){
				$this->form_validation->set_rules('page', 'page', 'required|is_natural');
				$this->form_validation->set_rules('block', 'block', 'required|is_natural');
				$this->form_validation->set_rules('position', 'position', 'required|is_natural');
		
				if ($this->form_validation->run() !== false){
					$this->_save_link($id);	
				}
				$this->data['block'] = $this->page_link_block_model->get();
				$this->data['page'] = $this->static_page_model->get();
				
				if ($id == 0){
					$this->data['link'] = array(
							'id' => 0,
							'page_id' => 0,
							'block_id' => 0,
							'position' => 0,
					);
				}
				else{
					$this->data['link'] = $this->static_page_in_link_block_model->get(array(), $id);
				}
				
				$this->data['path'][] = array(
						'text' => 'odkazy',
						'link' => base_url()."index.php/cms/static/link",
				);
				if ($id > 0){
					$this->data['path'][] = array(
							'text' => "uprav",
							'link' => base_url()."index.php/cms/static/edit_link/".$id,
					);
				}
				else{
					$this->data['path'][] = array(
							'text' => "nový",
							'link' => base_url()."index.php/cms/static/edit_link",
					);
				}
				
				
				$template_data['title'] = "CMS odkazy";
				$template_data['header'] = $this->load->view("cms/header", $this->data, true);
				$template_data['body'] = $this->load->view("cms/body_add_link", $this->data, true);
				$template_data['menu'] = $this->load->view("cms/menu", $this->data, true);
				$template_data['submenu'] = $this->load->view("cms/submenu", $this->data, true);
				$template_data['footer'] = $this->load->view("cms/footer", $this->data, true);
	
				$this->module->load->view("layouts/cms", $template_data);
			}
			else{
				die("Nesprávna stránka");
			}
		}
	}
	
	public function remove_link($id){
		if (is_admin_login_redirect($this)){
			$this->static_page_in_link_block_model->remove($id);
			redirect("cms/static/link");
		}
	}
}