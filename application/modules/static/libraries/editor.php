<?php
class Editor{
	
	protected $body;
	protected $title;
	protected $lang;
	protected $link;
	protected $image;
	protected $video;
	protected $tag;
	protected $thumbnail;
	protected $series;
	protected $id;
	protected $url;
	protected $url_save;
	protected $load_url;
	
	public function __construct(){
		$lang = valid_language("");
	}
	
	public function set_title($title){
		$this->title = $title;
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
	
	public function set_link($link){
		$this->link = $link;
	}
	public function set_image($image){
		$this->image = $image;
	}
	public function set_video($video){
		$this->video = $video;
	}
	public function set_tag($tag){
		$this->tag = $tag;
	}
	
	public function set_load_url($url){
		$this->load_url = $url;
	}
	
	public function init_load(){
		$lang_ext = "_".$this->lang['lang_shortcut'];
		if (file_exists($this->load_url."/titleTextarea".$lang_ext.".txt")){
			$this->set_title(read_file($this->load_url."/titleTextarea".$lang_ext.".txt"));
		}
		if (file_exists($this->load_url."/bodyTextarea".$lang_ext.".txt")){
			$this->set_body(read_file($this->load_url."/bodyTextarea".$lang_ext.".txt"));
		}
		if (file_exists($this->load_url."/link".$lang_ext.".txt")){
			$this->set_link(Blog_parser::parse_link(read_file($this->load_url."/link".$lang_ext.".txt")));
		}
		if (file_exists($this->load_url."/image".$lang_ext.".txt")){
			$this->set_image(Blog_parser::parse_image(read_file($this->load_url."/image".$lang_ext.".txt")));
		}
		if (file_exists($this->load_url."/video".$lang_ext.".txt")){
			$this->set_video(Blog_parser::parse_video(read_file($this->load_url."/video".$lang_ext.".txt")));
		}
	}
	
	public function set_id($id){
		$this->id = $id;
	}
	public function set_thumbnail($thumbnail){
		$this->thumbnail = $thumbnail;
	}
	public function set_series($series){
		$this->series = $series;
	}
	
	//getters
	public function get_title(){
		return $this->title;
	}
	public function get_body(){
		return $this->body;
	}
	
	public function get_load(){
		ob_start();
		include("./application/views/cms/editor_load.php");
		return ob_get_clean(); 
	}
}