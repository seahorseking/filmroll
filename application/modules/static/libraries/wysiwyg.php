<?php
class Wysiwyg{
	
	protected $body;
	protected $lang;
	protected $id;
	protected $url;
	protected $url_save;
	protected $load_url;
	
	public function __construt(){
		$this->lang = valid_language("");
	}
	
	public function set_body($body){
		$this->body = $body;
	}
	
	public function set_language($language){
		$this->lang = $language;
	}
	public function set_url($url, $save){
		$this->url = $url;
		$this->url_save = $save;
	}
	public function set_load_url($url){
		$this->load_url = $url;
	}
	public function set_id($id){
		$this->id = $id;
	}
	
	public function init_load(){
		$lang_ext = "_".$this->lang['lang_shortcut'];
		if (file_exists($this->load_url."/body".$lang_ext.".txt")){
			$this->set_body(read_file($this->load_url."/body".$lang_ext.".txt"));
		}
	}
	
	//getters
	public function get_body(){
		return $this->body;
	}
	
	public function get_load(){
		$ret = "content:'".rawurldecode(str_replace(array('\'', '\"'), array('\\\'', '\\\"'), $this->body))."'},\n{";
		$ret .= "lang:'".$this->lang['lang_shortcut']."',\n";
		$ret .= "id:'".$this->id."',\n";
		$ret .= "url:'".$this->url."',\n";
		$ret .= "url_save:'".$this->url_save."'\n}\n";
		return $ret;
	}
}