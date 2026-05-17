<div class="container-fluid">

    <h3>Laporan Peminjaman</h3>

    <form method="get">

        <input
            type="month"
            name="bulan"
            value="<?= $bulan; ?>"
        >

        <button
            type="submit"
            class="btn btn-primary btn-sm"
        >
            Filter
        </button>

        <a
            href="<?= site_url('laporan/peminjaman'); ?>"
            class="btn btn-secondary btn-sm"
        >
            Reset
        </a>

    </form>

    <br>

    <a
        href="<?= site_url('laporan/cetak_peminjaman?bulan=' . $bulan); ?>"
        target="_blank"
        class="btn btn-success btn-sm"
    >
        Cetak PDF
    </a>

    <table class="table table-bordered mt-3">

        <tr>
            <th>No</th>
            <th>Kode Peminjaman</th>
            <th>Nama Anggota</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
        </tr>

        <?php
        $no = 1;
        foreach ($data as $p):
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $p->kode_peminjaman; ?></td>
            <td><?= $p->nama; ?></td>
            <td><?= $p->tanggal_pinjam; ?></td>
            <td><?= $p->status; ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</div>