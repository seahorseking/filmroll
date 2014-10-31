<?php
class Language_model extends MY_Model{
	
	public function __construct(){
		parent::__construct('language');
	}
	
	public static function get_select(){
		return array('language.lang_name', 'language.lang_shortcut', 'language.lang_default');
	}
	public static function get_select_id(){
		return array('language.id', 'language.lang_name', 'language.lang_shortcut', 'language.lang_default');
	}
	
	public function get_default(){
		$this->db->select($this->get_select_id());
		$this->db->where('lang_default = 1');
		$query = $this->db->get($this->table);
		return $query->row_array();
	}
	
	public function get_by_shortcut($shortcut){
		$this->db->select($this->get_select_id());
		$this->db->from($this->table);
		$this->db->where('lang_shortcut', $shortcut);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function exists_shortcut($shortcut){
		$this->db->select('id');
		$this->db->from($this->table);
		$this->db->where('lang_shortcut', $shortcut);
		return ($this->db->count_all_results() > 0);
	}
	
	public function set_default($id){
		$table_data = array(
				'lang_default' => 0,
		);
		$this->db->update($this->table, $table_data);
		$table_data = array(
				'lang_default' => 1,
		);
		$this->save($table_data, $id);
		$ret = $id;
		return $ret;
	}
	
	public function remove($id){
		$get = $this->get(array(), $id);
		parent::remove($id);
		if ($get['lang_default'] == 1){
			if ($this->count_all() > 0){
				$get = $this->get(array());
				$this->set_default($get[0]['id']);
			}
		}
	}
	
	public function _create_table(){
		$this->db->query("CREATE TABLE IF NOT EXISTS language(
		        id int(9) NOT NULL AUTO_INCREMENT,
		        lang_name varchar(20) NOT NULL,
		        lang_shortcut varchar(2) NOT NULL,
		        lang_default tinyint(1) NOT NULL,
				PRIMARY KEY (id))
				COLLATE utf8_general_ci,
				ENGINE innoDB");
	}
}