<?php
class Private_label_model extends MY_Model{
	
	public function __construct(){
		parent::__construct('private_label');
	}
	
	public static function get_select(){
		return array('private_label.label');
	}
	public static function get_select_id(){
		return array('private_label.id', 'private_label.label');
	}
	
	public function get_by_label($label){
		$this->db->where('label', $label);
		$query = $this->db->get($this->table);
		return $query->row_array();
	}
	
	public function _create_table(){
		$this->db->query("CREATE TABLE IF NOT EXISTS private_label(
				id int(9) NOT NULL AUTO_INCREMENT,
				label varchar(20) NOT NULL,
				PRIMARY KEY (id))
				COLLATE utf8_general_ci,
				ENGINE innoDB");
	}
}