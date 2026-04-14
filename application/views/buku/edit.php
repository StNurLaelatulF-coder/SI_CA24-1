<h2>Edit Buku</h2>

<form method="post" action="<?php echo base_url('buku/update/'.$buku->kode_buku) ?>">

Kode Buku
<input type="text" name="kode_buku" value="<?php echo $buku->kode_buku ?>" readonly><br><br>

Judul
<input type="text" name="judul" value="<?php echo $buku->judul ?>" required><br><br>

Penulis
<input type="text" name="penulis" value="<?php echo $buku->penulis ?>" required><br><br>

Penerbit
<input type="text" name="penerbit" value="<?php echo $buku->penerbit ?>"><br><br>

Tahun
<input type="number" name="tahun" value="<?php echo $buku->tahun ?>"><br><br>

Kategori
<select name="id_kategori">
<?php foreach($kategori as $k){ ?>
<option value="<?php echo $k->id_kategori ?>"
<?php if($buku->id_kategori == $k->id_kategori) echo "selected"; ?>>
<?php echo $k->nama_kategori ?>
</option>
<?php } ?>
</select>

<br><br>

Stok
<input type="number" name="stok" value="<?php echo $buku->stok ?>"><br><br>

Lokasi Rak
<input type="text" name="lokasi_rak" value="<?php echo $buku->lokasi_rak ?>"><br><br>

<button type="submit">Update</button>

</form>