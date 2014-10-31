<?php
class Page_link_block_model extends MY_Model{
	
	public function __construct(){
		parent::__construct('page_link_block');
	}
	
	public static function get_select(){
		return array('page_link_block.block');
	}
	public static function get_select_id(){
		return array('page_link_block.id', 'page_link_block.block');
	}
	
	public function get_by_name($name, $join = array()){
		$this->db->select($this->join($join, $this->get_select_id()));
		$query = $this->db->get_where($this->table, array($this->table.'.block =' => $name));
		return $query->row_array();
	}
	
	public function _create_table(){
		$this->db->query("CREATE TABLE IF NOT EXISTS page_link_block(
				id int(9) NOT NULL AUTO_INCREMENT,
				block varchar(30) NOT NULL,
				PRIMARY KEY (id))
				COLLATE utf8_general_ci,
				ENGINE innoDB");
	}
}