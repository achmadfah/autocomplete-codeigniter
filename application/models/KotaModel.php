<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KotaModel extends CI_Model {
	
	public function viewByProvinsi($pillar_id){
		$this->db->where('pillar_id', $pillar_id);
		$result = $this->db->get('cat_parent')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
		return $result; 
	}
}
