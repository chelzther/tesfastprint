<?php
class Produk_Controller extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Library session hanya untuk memanggil flashdata
        $this->load->library('session');
    }

    public function index(){
        $this->load->model('Produk_Model');

        $data['result'] = $this->Produk_Model->getAllData();
        $this->load->view('Produk_View', $data);
    }

    public function tambah(){
        // Load view tambah_produk_view.php
        $this->load->view('Tambah_Produk_View');
    }

    public function edit($id_produk) {
        // Memuat model Produk_model
        $this->load->model('Produk_model');
    
        // Mendapatkan data produk berdasarkan ID
        $data['produk'] = $this->Produk_model->getProdukById($id_produk);
        
        if ($data['produk']) {
            // Load view Update_Produk_View dan lewatkan data produk ke view
            $this->load->view('Update_Produk_View', $data);
        } else {
            // Handle jika data produk tidak ditemukan
            echo "Produk tidak ditemukan.";
        }
    }
    
    public function hapus($id_produk){
        // Memuat model Produk_model
        $this->load->model('Produk_Model');
        $check = $this->Produk_Model->removeData($id_produk);
        
        if ($check) {
            // Baris coding di comment supaya tidak mengurangi kecepatan penambahan data 
            // akan tetapi masih bisa diuncomment bagian ini dan view supaya ada notif setiap kali berhasil Simpan,Update,Delete
            // $this->session->set_flashdata('success', 'Barang berhasil dihapus.');

            // Jika pembaruan berhasil, redirect ke halaman daftar produk
            redirect(base_url());
        }
        else {
            // Jika pembaruan gagal, tampilkan pesan error atau lakukan penanganan kesalahan lainnya
            $this->session->set_flashdata('warning', 'Barang gagal dihapus.');
            // Redirect ke halaman daftar produk setelah 2 detik
            redirect(base_url());
        }
    }

    public function simpan(){
        // Ambil data dari input form
        $nama_produk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $kategori = $this->input->post('kategori');
        $status = $this->input->post('status');

        // Mengubah option value yang didapat menjadi tulisan bisa dijual dan tidak bisa dijual
        if ($status == '0') {
            $status = 'bisa dijual';
        } else{
            $status = 'tidak bisa dijual';
        }

        // Lakukan operasi penyimpanan data ke database
        $this->load->model('Produk_Model');
        $dataToInsert = array(
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'kategori' => $kategori,
            'status' => $status
        );
        // Baris coding di comment supaya tidak mengurangi kecepatan penambahan data 
        // akan tetapi masih bisa diuncomment bagian ini dan view supaya ada notif setiap kali berhasil Simpan,Update,Delete
        // $this->session->set_flashdata('success', 'Barang berhasil ditambahkan.');
        
        // Insert data melalui method yang ada pada Model
        $insertedId = $this->Produk_Model->insertData($dataToInsert);
        // Redirect ke halaman daftar produk setelah berhasil disimpan
        redirect(base_url());
    }
    
    public function update() {
        // Ambil data dari input form
        $id_produk = $this->input->post('id_produk');
        $nama_produk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $kategori = $this->input->post('kategori');
        $status = $this->input->post('status');
        
        // Mengubah option value yang didapat menjadi tulisan bisa dijual dan tidak bisa dijual
        if ($status == '0') {
            $status = 'bisa dijual';
        } else{
            $status = 'tidak bisa dijual';
        }

        // Panggil model Produk_model
        $this->load->model('Produk_model');
    
        // Panggil method updateData dari model untuk memperbarui data produk
        $updateData = array(
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'kategori' => $kategori,
            'status' => $status
        );
        $updated = $this->Produk_model->updateData($id_produk, $updateData);
        
        if ($updated) {
            // Baris coding di comment supaya tidak mengurangi kecepatan penambahan data 
            // akan tetapi masih bisa diuncomment bagian ini dan view supaya ada notif setiap kali berhasil Simpan,Update,Delete
            // $this->session->set_flashdata('success', 'Barang berhasil diedit.');

            // Jika pembaruan berhasil, redirect ke halaman daftar produk
            redirect(base_url());
        } else {
            // Jika pembaruan gagal, tampilkan pesan error atau lakukan penanganan kesalahan lainnya
            $this->session->set_flashdata('warning', 'Tidak ada perubahan yang terjadi.');
            // Redirect ke halaman daftar produk setelah 2 detik
            redirect(base_url());
        }
        
    }
}
?>