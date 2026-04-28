<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Anggota</h2>

<a href="<?= site_url('anggota/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">

<table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">

<thead>
<tr>
<th>No</th>
<th>Nomor Anggota</th>
<th>Nama</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Email</th>
<th>Tanggal Daftar</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($anggota as $a): ?>

<tr>
<td><?= $no++; ?></td>
<td><?= $a->nomor_anggota; ?></td>
<td><?= $a->nama; ?></td>
<td><?= $a->alamat; ?></td>
<td><?= $a->telepon; ?></td>
<td><?= $a->email; ?></td>
<td><?= $a->tanggal_daftar; ?></td>
<td><?= $a->status; ?></td>

<td>
<a href="<?= site_url('anggota/edit/'.$a->id); ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="<?= site_url('anggota/hapus/'.$a->id); ?>"
onclick="return confirm('Yakin ingin menghapus?')"
class="btn btn-danger btn-sm">Hapus</a>
</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>
</div>
</div>
</div>