<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">

<!-- Saya disable karena sepertinya mengurangi kecepatan dalam menambahkan/mengedit data
<?php if ($this->session->flashdata('success')): ?>
    <script>
        setTimeout(function() {
            var message = "<?php echo $this->session->flashdata('success'); ?>";
            alert(message);
        }, 500); // Menunggu 0.5 detik (500 ms) sebelum menampilkan notifikasi
    </script>
<?php endif; ?>
-->

<!-- Alert untuk jika proses CRUD gagal -->
<?php if ($this->session->flashdata('warning')): ?>
    <script>
        setTimeout(function() {
            var message = "<?php echo $this->session->flashdata('warning'); ?>";
            alert(message);
        }, 500); // Menunggu 0.5 detik (500 ms) sebelum menampilkan notifikasi
    </script>
<?php endif; ?>

<!-- Table penampung data dari databasee -->
<table class="centered-table" style="border-collapse: collapse;" border="1">
    <thead>
        <tr>
            <th style="border: 1px solid black; padding: 8px;">No</th>
            <th style="border: 1px solid black; padding: 8px; display:none">ID Produk</th> <!-- disembunyikan karena id produk bersifat key di tabel produk -->
            <th style="border: 1px solid black; padding: 8px;">Nama Produk</th>
            <th style="border: 1px solid black; padding: 8px;">Harga</th>
            <th style="border: 1px solid black; padding: 8px;">Kategori</th>
            <th style="border: 1px solid black; padding: 8px;">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $counter = 1; ?>
        <?php foreach ($result as $row): ?>
            <?php if($row->status == 'bisa dijual'): ?>
                <tr>
                    <td style="border: 1px solid black; padding: 8px;"><?php echo $counter; ?></td>
                    <td class="hidden" style="border: 1px solid black; padding: 8px; display:none"><?php echo $row->id_produk; ?></td>  <!-- disembunyikan karena id produk bersifat key di tabel produk -->
                    <td style="border: 1px solid black; padding: 8px;"><?php echo $row->nama_produk; ?></td>
                    <td style="border: 1px solid black; padding: 8px;"><?php echo $row->harga; ?></td>
                    <td style="border: 1px solid black; padding: 8px;"><?php echo $row->kategori; ?></td>
                    <td style="border: 1px solid black; padding: 8px;"><?php echo $row->status; ?>
                    <td style="border: 1px solid black; padding: 8px;">
                        <a href="<?php echo base_url('Produk_Controller/edit/'.$row->id_produk); ?>"><span>&#9998;</span></a>
                        <a href="<?php echo base_url('Produk_Controller/hapus/'.$row->id_produk); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');"><span>&#128465;</span></a>
                    </td>
                </tr>
                <?php $counter++; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- Link ke method tambah di controller -->
<a href="<?php echo base_url('Produk_Controller/tambah'); ?>"><h2>Tambah Barang</h2></a>

