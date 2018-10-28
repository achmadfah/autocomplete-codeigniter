<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('ProvinsiModel');
		$this->load->model('KotaModel');
		$this->load->model('KecamatanModel');
	}

	public function index(){
		$data['provinsi'] = $this->ProvinsiModel->view();
		
		$this->load->view('form', $data);
	}
	
	public function listKota(){
		// Ambil data ID Provinsi yang dikirim via ajax post
		$pillar_id = $this->input->post('pillar_id');
		
		$parent = $this->KotaModel->viewByProvinsi($pillar_id);
		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih</option>";
		
		foreach($parent as $data){
			$lists .= "<option value='".$data->id."'>".$data->ind_parent_title."</option>"; // Tambahkan tag option ke variabel $lists
		}
		
		$callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

		public function listKecamatan(){
		// Ambil data ID Provinsi yang dikirim via ajax post
		$parent_id = $this->input->post('parent_id');
		
		$cat = $this->KecamatanModel->viewByKota($parent_id);
		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih</option>";
		
		foreach($cat as $data){
			$lists .= "<option value='".$data->id."'>".$data->ind_category."</option>"; // Tambahkan tag option ke variabel $lists
		}
		
		$callback = array('list_kecamatan'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}
}
