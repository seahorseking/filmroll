<?php
class Admin_model extends MY_Model{
	
	public $select_login;
	
	public function __construct(){
		parent::__construct('admin');
	}
	
	public static function get_select(){
		return array('admin.admin_nickname', 'admin.email', 'admin.admin_name', 'admin.admin_surname');
	}
	public static function get_select_id(){
		return array('admin.id', 'admin.admin_nickname', 'admin.email', 'admin.admin_name', 'admin.admin_surname', 'admin.password', 'admin.salt');
	}
	
	public function get_login($nickname = ""){
		$this->db->select($this->get_select_id());
		$query = $this->db->get_where($this->table, array('admin_nickname =' => $nickname));
		return $query->row_array();
	}
	
	public function get_login_by_id($id){
		$this->db->select($this->get_select_id());
		$query = $this->db->get_where($this->table, array('id =' => $id));
		return $query->row_array();
	}
	
	public function _create_table(){
		$this->db->query("CREATE TABLE IF NOT EXISTS static_page_in_link_block(
				id int(9) NOT NULL AUTO_INCREMENT,
				email varchar(100) NOT NULL,
				admin_name varchar(30),
				admin_surname varchar(30),
				salt varchar(16) NOT NULL,
				password varchar(128) NOT NULL,
				admin_nickname varchar(50) NOT NULL,
				PRIMARY KEY (id))
				COLLATE utf8_general_ci,
				ENGINE innoDB");
	}
}