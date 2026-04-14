<?php
class buku_model extends CI_Model {

    public function get_all()
    {
        return
    $this->db->get('buku')->result();
    }

    public function tampil()
    {
        return $this->db->get('buku')->result();
    }

    public function get_kategori()
    {
        return $this->db->get('kategori')->result();
    }

    public function insert($data)
    {
        $this->db->insert('buku', $data);
    }

    public function delete($kode_buku)
    {
        $this->db->where('kode_buku', $kode_buku);
        $this->db->delete('buku');
    }

    public function get_by_kode($kode_buku)
    {
        $this->db->where('kode_buku', $kode_buku);
        return $this->db->get('buku')->row();
    }

    public function update($kode_buku, $data)
    {
        $this->db->where('kode_buku', $kode_buku);
        $this->db->update('buku', $data);
    }

    
}