<h2>Tambah Anggota</h2>

<form method="post" action="<?php echo base_url('anggota/simpan')?>">

Nomor Anggota
<input type="text" name="nomor_anggota" required><br><br>

Nama
<input type="text" name="nama" required><br><br>

Alamat
<textarea name="alamat"></textarea><br><br>

Telepon
<input type="text" name="telepon"><br><br>

Email
<input type="email" name="email"><br><br>

Tanggal Daftar
<input type="date" name="tanggal_daftar"><br><br>

Status
<select name="status">
    <option value="Aktif">Aktif</option>
    <option value="Nonaktif">Nonaktif</option>
</select>

<br><br>

<button type="submit">Simpan</button>

</form>
```
