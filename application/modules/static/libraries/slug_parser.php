<?php
class Slug_parser{
	
	protected $slug;
	protected $id;
	
	public function __construct(){
		
	}
	
	public function parse($slug){
		$tmp = explode("-", $slug);
		$this->id = $tmp[sizeof($tmp) - 1];
		unset($tmp[sizeof($tmp) - 1]);
		$this->slug = implode("-", $tmp);
	} 
	
	public function get_slug(){
		return $this->slug;
	}
	
	public function get_id(){
		return $this->id;
	}
}