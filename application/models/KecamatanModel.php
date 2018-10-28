<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KecamatanModel extends CI_Model {
	
	public function viewByKota($parent_id){
		$this->db->where('parent_id', $parent_id);
		$result = $this->db->get('cat')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
		return $result; 
	}
}
