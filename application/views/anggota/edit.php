```php id="t6n24"
<h2>Edit Anggota</h2>

<form method="post" action="<?php echo base_url('anggota/update/'.$anggota->id) ?>">

ID
<input type="text" name="id" value="<?php echo $anggota->id ?>" readonly><br><br>

Nomor Anggota
<input type="text" name="nomor_anggota" value="<?php echo $anggota->nomor_anggota ?>" required><br><br>

Nama
<input type="text" name="nama" value="<?php echo $anggota->nama ?>" required><br><br>

Alamat
<textarea name="alamat"><?php echo $anggota->alamat ?></textarea><br><br>

Telepon
<input type="text" name="telepon" value="<?php echo $anggota->telepon ?>"><br><br>

Email
<input type="email" name="email" value="<?php echo $anggota->email ?>"><br><br>

Tanggal Daftar
<input type="date" name="tanggal_daftar" value="<?php echo $anggota->tanggal_daftar ?>"><br><br>

Status
<select name="status">
    <option value="Aktif" <?php if($anggota->status == 'Aktif') echo "selected"; ?>>Aktif</option>
    <option value="Nonaktif" <?php if($anggota->status == 'Nonaktif') echo "selected"; ?>>Nonaktif</option>
</select>

<br><br>

<button type="submit">Update</button>

</form>
```
