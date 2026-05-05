<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Edit Peminjaman</h2>

    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="<?= site_url('peminjaman/update/'.$peminjaman->id); ?>">

                <div class="form-group">
                    <label>Kode Peminjaman</label>
                    <input type="text" name="kode_peminjaman" class="form-control" value="<?= $peminjaman->kode_peminjaman; ?>" required>
                </div>

                <div class="form-group">
                    <label>Anggota ID</label>
                    <input type="number" name="anggota_id" class="form-control" value="<?= $peminjaman->anggota_id; ?>" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control" value="<?= $peminjaman->tanggal_pinjam; ?>" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Jatuh Tempo</label>
                    <input type="date" name="tanggal_jatuh_tempo" class="form-control" value="<?= $peminjaman->tanggal_jatuh_tempo; ?>" required>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="dipinjam" <?= ($peminjaman->status == 'dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
                        <option value="kembali" <?= ($peminjaman->status == 'kembali') ? 'selected' : ''; ?>>Kembali</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>User ID</label>
                    <input type="number" name="user_id" class="form-control" value="<?= $peminjaman->user_id; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= site_url('peminjaman'); ?>" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
</div>