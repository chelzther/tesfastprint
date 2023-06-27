<!-- Link ke method simpan di controller -->
<form action="<?php echo base_url('Produk_Controller/simpan'); ?>" method="post">
    <table>
        <tr>
            <td><label for="nama_produk">Nama Produk:</label></td>
            <td><input type="text" name="nama_produk" id="nama_produk" required></td>
        </tr>
        <tr>
            <td><label for="harga">Harga:</label></td>
            <td><input type="text" name="harga" id="harga" pattern="[0-9]+" title="Hanya angka yang diperbolehkan" required></td>
        </tr>
        <tr>
            <td><label for="kategori">Kategori:</label></td>
            <td><input type="text" name="kategori" id="kategori"></td>
        </tr>
        <tr>
            <td><label for="status">Status:</label></td>
            <td>
                <select name="status" id="status" required>
                    <option value="0" selected>Bisa Dijual</option>
                    <option value="1" >Tidak Bisa Dijual</option>
                </select>
            </td>
        </tr>
    </table>
    <br>
    <button type="submit">Simpan</button>
</form>
