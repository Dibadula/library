<?php
class Book_Model extends CI_Model{
	public function saveDepartment($data){
		$this->db->insert('tbl_dep', $data);
	}
}