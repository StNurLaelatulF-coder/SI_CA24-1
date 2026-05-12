<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Tambah Peminjaman</h2>

<div class="card shadow">  
    <div class="card-body">  

        <form method="post" action="<?= site_url('peminjaman/simpan'); ?>">  

            <div class="form-group">  
                <label>Anggota ID</label>  
                <input type="number" name="anggota_id" class="form-control" required>  
            </div>  

            <div class="form-group">  
                <label>Buku ID</label>  
                <input type="text" name="buku_id" class="form-control" required>  
            </div>  

            <div class="form-group">  
                <label>Tanggal Pinjam</label>  
                <input type="date"   
                       name="tanggal_pinjam"   
                       class="form-control"   
                       value="<?= date('Y-m-d'); ?>"   
                       readonly>  
            </div>  

            <div class="form-group">  
                <label>Tanggal Jatuh Tempo</label>  
                <input type="date"   
                       name="tanggal_jatuh_tempo"   
                       class="form-control"   
                       min="<?= date('Y-m-d'); ?>"   
                       required>  
            </div>  
            <button type="submit" class="btn btn-primary">  
                Simpan  
            </button>  

            <a href="<?= site_url('peminjaman'); ?>" class="btn btn-secondary">  
                Kembali  
            </a>  

        </form>  

    </div>  
</div>

</div>