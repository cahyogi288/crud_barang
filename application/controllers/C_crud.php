<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_crud extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('upload');
		$this->load->library('table');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');	
		$this->load->model('M_crud');
	}

	public function index(){
		$data['isian'] = $this->M_crud->get_barang()->result();
		$this->load->view('v_barang',$data);
	}

	public function input_barang(){
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$hargajual = $this->input->post('hargajual');
		$hargabeli = $this->input->post('hargabeli');
		$satuan = $this->input->post('satuan');
		$kategori = $this->input->post('kategori');
		$stok = $this->input->post('stok');

		$data = array(
			'kode_barang'=>$kode,
			'nama_barang'=>$nama,
			'harga_jual'=>$hargajual,
			'harga_beli'=>$hargabeli,
			'satuan'=>$satuan,
			'kategori'=>$kategori,
			'stok'=>$stok
		);

		$this->M_crud->input_barang('barang',$data);
		$this->index();
	}

	public function update_barang(){
		$kode = $this->input->post('newkode');
		$nama = $this->input->post('newnama');
		$hargajual = $this->input->post('newhargajual');
		$hargabeli = $this->input->post('newhargabeli');
		$satuan = $this->input->post('newsatuan');
		$kategori = $this->input->post('newkategori');
		$stok = $this->input->post('newstok');

		$where = array(
			'kode_barang'=>$kode
		);

		$data = array(
			'kode_barang'=>$kode,
			'nama_barang'=>$nama,
			'harga_jual'=>$hargajual,
			'harga_beli'=>$hargabeli,
			'satuan'=>$satuan,
			'kategori'=>$kategori,
			'stok'=>$stok
		);

		$this->M_crud->update_barang('barang',$where,$data);
		$this->index();
	}

	public function hapus_barang($kode){
		$this->M_crud->hapus_barang($kode);
		$this->index();
	}

	public function penjualan(){
		$data['isian'] = $this->M_crud->get_barang()->result();
		$this->load->view('v_penjualan',$data);
	}

	public function beli_barang(){
		$kode = $this->input->post('newkode');
		$nama = $this->input->post('newnama');
		$hargajual = $this->input->post('newhargajual');
		$namakon = $this->input->post('namakonsumen');
		$jumlah = $this->input->post('jumlah');
		$tgl = $this->input->post('tglfaktur');
		$total = $this->input->post('tot');
		$stok = $this->input->post('stok');

		$data = array(
			'kode_barang'=>$kode,
			// 'nama_barang'=>$nama,
			'harga_satuan'=>$hargajual,
			'nama_konsumen'=>$namakon,
			'jumlah'=>$jumlah,
			'tgl_faktur'=>$tgl,
			'harga_total'=>$total
		);

		$sisa = $stok-$jumlah;
		
		$where = array(
			'kode_barang'=>$kode
		);

		$data2 = array(
			'stok' => $sisa
		);
		$this->M_crud->beli_barang('penjualan',$data);

		$this->M_crud->update_barang('barang',$where,$data2);

		$this->penjualan();
	}


}


 ?>