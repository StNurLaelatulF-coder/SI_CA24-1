<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman_model extends CI_Model {

    public function get_all()
    {
        $this->db->distinct();

        $this->db->select('peminjaman.*');

        $this->db->from('peminjaman');

        return $this->db->get()->result();
    }

    public function insert($data, $buku_id)
    {
        $this->db->insert('peminjaman', $data);

        $peminjaman_id = $this->db->insert_id();

        $this->db->insert('detail_peminjaman', [
            'peminjaman_id' => $peminjaman_id,
            'buku_id' => $buku_id,
            'qty' => 1
        ]);

        // Kurangi stok buku
        $this->db->set('stok', 'stok - 1', FALSE);
        $this->db->where('kode_buku', $buku_id);
        $this->db->update('buku');
    }

    public function get_detail($id)
    {
        $this->db->select('detail_peminjaman.*, buku.judul');

        $this->db->from('detail_peminjaman');

        $this->db->join(
            'buku',
            'buku.kode_buku = detail_peminjaman.buku_id'
        );

        $this->db->where(
            'detail_peminjaman.peminjaman_id',
            $id
        );

        return $this->db->get()->row();
    }

    public function pengembalian($id)
    {
        $detail = $this->get_detail($id);

        $pinjam = $this->db->get_where('peminjaman', [
            'id' => $id
        ])->row();

        $today = date('Y-m-d');

        $terlambat = 0;
        $denda = 0;

        if ($today > $pinjam->tanggal_jatuh_tempo) {

            $terlambat = (
                strtotime($today) -
                strtotime($pinjam->tanggal_jatuh_tempo)
            ) / 86400;
        }

        $this->db->insert('pengembalian', [
            'peminjaman_id' => $id,
            'tanggal_kembali' => $today,
            'terlambat' => $terlambat,
            'denda' => $denda
        ]);

        $this->db->where('id', $id);

        $this->db->update('peminjaman', [
            'status' => 'kembali'
        ]);

        // Tambah stok buku
        $this->db->set('stok', 'stok + 1', FALSE);

        $this->db->where(
            'kode_buku',
            $detail->buku_id
        );

        $this->db->update('buku');
    }
}