<?php
class Translation_model extends MY_Model{
	
	public function __construct(){
		parent::__construct('translation');
	}
	
	public static function get_select(){
		return array('translation.lang_id', 'translation.group_id', 'translation.lang_value', 'translation.slug');
	}
	public static function get_select_as($as = array()){
		$ret = array();
		$i = 0;
		$select = Translation_model::get_select();
		foreach ($select as $s){
			if (sizeof($as) > $i && $as[$i] != ""){
				$ret[$i] = $s.' AS '.$as[$i];
			}
			else{
				$ret[$i] = $s;
			}
			$i++;
		}
		return $ret;
	}
	public static function get_select_id(){
		return array('translation.id', 'translation.lang_id', 'translation.group_id', 'translation.lang_value', 'translation.slug');
	}
	public static function get_relation(){
		return array(
				'language' => array(
						'join' => 'language',
						'on' => 'translation.lang_id=language.id',
						'type' => 'inner',
						'select' => Language_model::get_select(),
				),
				'group' => array(
						'join' => 'translation_group',
						'on' => 'translation.group_id=translation_group.id',
						'type' => 'inner',
						'select' => Translation_group_model::get_select(),
				),
		);
	}
	
	public function get_translation($group_id, $lang_id = false){
		$this->db->select($this->join(array(), $this->get_select_id()));
		$this->db->where('group_id', $group_id);
		if ($lang_id == false){
			$this->db->where('lang_id = (SELECT id FROM language WHERE lang_default = \'1\')');
		}
		else{
			$this->db->where('lang_id = '.$lang_id);
		}
		$query = $this->db->get($this->table);
		if (sizeof($query->row_array()) > 0){
			return $query->row_array();
		}
		else{
			return array(
					'lang_value' => "",
					'slug' => "",
			);
		}
	}
	
	public function exists_slug($slug, $lang, $label = false){
		$this->db->select($this->join(array('group'), $this->get_select_id()));
		$this->db->from($this->table);
		$this->db->where('slug', $slug);
		$this->db->where('lang_id', $lang);
		if ($label != false){
			$this->db->where('private_id', $label);
		}
		return ($this->db->count_all_results() > 0);
	}
	
	public function exists_combination($group_id, $lang_id){
		$this->db->select('id');
		$this->db->from($this->table);
		$this->db->where('group_id', $group_id);
		$this->db->where('lang_id', $lang_id);
		return ($this->db->count_all_results() > 0);
	}
	
	public function get_by_combination($group_id, $lang_id, $join = array()){
		$this->db->select($this->join($join, $this->get_select_id()));
		$this->db->where('group_id', $group_id);
		$this->db->where('lang_id', $lang_id);
		$this->db->order_by('id DESC');
		$query = $this->db->get($this->table);
		return $query->row_array();
	}
	
	public function get_by_slug($slug, $lang, $label = false){
		$this->db->select($this->join(array('group'), $this->get_select_id()));
		$this->db->where('slug', $slug);
		$this->db->where('lang_id', $lang);
		$this->db->order_by('id DESC');
		if ($label != false){
			$this->db->where('private_id', $label);
		}
		$query = $this->db->get($this->table);
		return $query->row_array();
	}
	
	public function get_private($label){
		$this->db->select($this->join(array('group'), $this->get_select_id()));
		$this->db->where('translation_group.private_id IN (SELECT id FROM private_label WHERE label=\''.$label.'\')');
		$this->db->order_by('group_id ASC, lang_id ASC');
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	
	public function update($data, $group_id, $lang_id){
		if ($this->exists_combination($group_id, $lang_id)){
			$trans = $this->get_by_combination($group_id, $lang_id);
			return $this->save($data, $trans['id']);
		}
		else{
			$data['lang_id'] = $lang_id;
			$data['group_id'] = $group_id;
			return $this->save($data);
		}
	}
	
	public function _create_table(){
		$this->db->query("CREATE TABLE IF NOT EXISTS translation(
		        id int(9) NOT NULL AUTO_INCREMENT,
		        lang_id int(9) NOT NULL,
		        group_id int(9) NOT NULL,
		        lang_value text NOT NULL,
				slug text,
		    	PRIMARY KEY (id),
		        FOREIGN KEY (lang_id) REFERENCES language(id) ON DELETE CASCADE,
		        FOREIGN KEY (group_id) REFERENCES translation_group(id) ON DELETE CASCADE)
				COLLATE utf8_general_ci,
				ENGINE innoDB");
	}
}