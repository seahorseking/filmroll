<?php
class Static_page_in_link_block_model extends MY_Model{
	
	public function __construct(){
		parent::__construct('static_page_in_link_block');
		$this->select = array('static_page_in_link_block.page_id', 'static_page_in_link_block.block_id', 'static_page_in_link_block.position');
		$this->select_id = array('static_page_in_link_block.id', 'static_page_in_link_block.page_id', 'static_page_in_link_block.block_id', 'static_page_in_link_block.position');
		
	}
	
	public static function get_select(){
		return array('static_page_in_link_block.page_id', 'static_page_in_link_block.block_id', 'static_page_in_link_block.position');
	}
	public static function get_select_id(){
		return array('static_page_in_link_block.id', 'static_page_in_link_block.page_id', 'static_page_in_link_block.block_id', 'static_page_in_link_block.position');
	}
	public static function get_relation(){
		return array(
				'page' => array(
						'join' => 'static_page',
						'on' => 'static_page_in_link_block.page_id=static_page.id',
						'type' => 'inner',
						'select' => Static_page_model::get_select(),
				),
				'block' => array(
						'join' => 'page_link_block',
						'on' => 'static_page_in_link_block.block_id=page_link_block.id',
						'type' => 'inner',
						'select' => Page_link_block_model::get_select(),
				),
		);
	}
	public function get($join = array(), $id = false){
		$this->db->select($this->join($join, $this->select_id));
		$this->db->order_by('block_id ASC, position ASC');
		if ($id == false){
			$query = $this->db->get($this->table);
			return $query->result_array();
		}
		else{
			$query = $this->db->get_where($this->table, array($this->table.'.id =' => $id));
			return $query->row_array();
		}
	}
	
	public function get_by_block($id, $join = array()){
		$this->db->select($this->join($join, $this->select_id));
		$this->db->order_by('position ASC');
		$query = $this->db->get_where($this->table, array($this->table.'.block_id =' => $id));
		return $query->result_array();
	}
	
	public function _create_table(){
		$this->db->query("CREATE TABLE IF NOT EXISTS static_page_in_link_block(
				id int(9) NOT NULL AUTO_INCREMENT,
				page_id int(9) NOT NULL,
				block_id int(9) NOT NULL,
				position int(9) NOT NULL,
				PRIMARY KEY (id),
				FOREIGN KEY (page_id) REFERENCES static_page(id) ON DELETE CASCADE,
				FOREIGN KEY (block_id) REFERENCES page_link_block(id) ON DELETE CASCADE)
				COLLATE utf8_general_ci,
				ENGINE innoDB");
	}
}