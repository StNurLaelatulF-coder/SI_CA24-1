<h2>Tambah Buku</h2>

<form method="post" action="<?php echo base_url('buku/simpan')?>">

Kode Buku
<input type="text" name="kode_buku" required><br><br>

Judul
<input type="text" name="judul" required><br><br>

Penulis
<input type="text" name="penulis" required><br><br>

Penerbit
<input type="text" name="penerbit"><br><br>

Tahun
<input type="number" name="tahun"><br><br>

Kategori
<select name="id_kategori">
<?php foreach($kategori as $k){ ?>
<option value="<?php echo $k->id_kategori ?>">
<?php echo $k->nama_kategori ?>
</option>
<?php } ?>
</select>

<br><br>

Stok
<input type="number" name="stok"><br><br>

Lokasi Rak
<input type="text" name="lokasi_rak"><br><br>

<button type="submit">Simpan</button>

</form>