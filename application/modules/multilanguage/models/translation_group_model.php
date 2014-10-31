<?php
class Translation_group_model extends MY_Model{
	
	public function __construct(){
		parent::__construct('translation_group');
	}
	
	public static function get_select(){
		return array('translation_group.private_id');
	}
	public static function get_select_id(){
		return array('translation_group.id', 'translation_group.private_id');
	}
	
	public function exists_private($id, $label){
		$this->db->select('id');
		$this->db->from($this->table);
		$this->db->where('id = '.$id);
		$this->db->where('private_id IN (SELECT id FROM private_label WHERE label = \''.$label.'\')');
		return ($this->db->count_all_results() > 0);
	}
	
	public function get_private($label){
		$this->db->select($this->get_select_id());
		$this->db->where('private_id IN (SELECT id FROM private_label WHERE label=\''.$label.'\')');
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	
	public function save($data, $id = false){
		if (sizeof($data) == 0){
			$this->db->query('INSERT INTO '.$this->table.'() VALUES()');
			$ret = $this->db->insert_id();
			return $ret;
		}
		else{
			return parent::save($data, $id);
		}
	}
	
	public function _create_table(){
		$this->db->query("CREATE TABLE IF NOT EXISTS translation_group(
		        id int(9) NOT NULL AUTO_INCREMENT,
				private_id int(9),
		    	PRIMARY KEY (id),
				FOREIGN KEY (private_id) REFERENCES private_label(id) ON DELETE SET NULL)
				COLLATE utf8_general_ci,
				ENGINE innoDB");
	}
}