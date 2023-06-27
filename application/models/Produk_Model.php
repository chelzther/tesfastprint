<?php
class Produk_Model extends CI_Model {

    public function __construct(){
        parent::__construct();
        // Load database.php
        $this->load->database();
    }
    
    public function getAllData(){
        // Mendapatkan semuat data pada tbProduk yang akan ditampilkan di page Produk_View
        $query = $this->db->get('tbProduk');
        return $query->result();
    }
    
    public function insertData($data){
        $this->db->insert('tbProduk', $data);
    }

    public function removeData($id_produk){
        // Menghapus data produk dari tabel 'produk' berdasarkan ID
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('tbProduk');
        
        // Mengembalikan nilai TRUE jika data berhasil dihapus, atau FALSE jika gagal
        return $this->db->affected_rows() > 0;
    }
    public function getProdukById($id_produk){
        // Mengambil data produk dari tabel 'produk' berdasarkan ID
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('tbProduk');
        
        // Mengembalikan hasil query sebagai objek tunggal jika data ditemukan, atau NULL jika tidak ditemukan
        return $query->row();
    }
    public function updateData($id_produk, $data)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->update('tbProduk', $data);
        return $this->db->affected_rows();
    }
}
?>