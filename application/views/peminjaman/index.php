<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Peminjaman</h2>

<a href="<?= site_url('peminjaman/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">

<table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">

<thead>
<tr>
<th>No</th>
<th>Kode Peminjaman</th>
<th>Anggota ID</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Jatuh Tempo</th>
<th>Status</th>
<th>User ID</th>
<th>Created At</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($peminjaman as $p): ?>
<tr>
<td><?= $no++; ?></td>
<td><?= $p->kode_peminjaman; ?></td>
<td><?= $p->anggota_id; ?></td>
<td><?= $p->tanggal_pinjam; ?></td>
<td><?= $p->tanggal_jatuh_tempo; ?></td>
<td><?= $p->status; ?></td>
<td><?= $p->user_id; ?></td>
<td><?= $p->created_at; ?></td>
<td>

<a href="<?= site_url('peminjaman/edit/'.$p->id); ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="<?= site_url('peminjaman/hapus/'.$p->id); ?>"
onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</a>

</td>
</tr>
<?php endforeach; ?>
</tbody>

</table>

</div>
</div>
</div>

</div>