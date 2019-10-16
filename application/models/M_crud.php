<?php 

class M_crud extends CI_Model{

	 public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function input_barang($table,$data){
    	$this->db->insert($table,$data);
    }

    public function get_barang(){
        return $this->db->get('barang');
    }

    function update_barang($tabel,$where,$data){
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    function hapus_barang($kobar){
        $hasil=$this->db->query("DELETE FROM barang WHERE kode_barang='$kobar'");
        return $hasil;
    }
    // public function get_stat_mobil($where){
    // 	//$this->db->get_where($table,$where);
    // 	return $this->db->query("SELECT * from mobil where status != '$where'");
    // }

    public function beli_barang($table,$data){
        $this->db->insert($table,$data);
    }

}



 ?>