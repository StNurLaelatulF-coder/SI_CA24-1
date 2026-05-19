<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('login');
        }
    }

    public function peminjaman()
    {
        $bulan = $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join(
            'anggota',
            'anggota.id = peminjaman.anggota_id'
        );

        if ($bulan) {
            $this->db->where(
                "DATE_FORMAT(tanggal_pinjam, '%Y-%m') =",
                $bulan
            );
        }

        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_peminjaman()
    {
        $bulan = $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join(
            'anggota',
            'anggota.id = peminjaman.anggota_id'
        );

        if ($bulan) {
            $this->db->where(
                "DATE_FORMAT(tanggal_pinjam, '%Y-%m') =",
                $bulan
            );
        }

        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;

        $this->load->view('laporan/cetak_pinjam', $data);
    }

    public function buku()
    {
    $kategori = $this->input->get('kategori');

    $this->db->select('buku.*, kategori.nama_kategori');
    $this->db->from('buku');
    $this->db->join(
        'kategori',
        'kategori.id_kategori = buku.id_kategori'
    );

    if ($kategori) {
        $this->db->where('buku.id_kategori', $kategori);
    }

    $data['data'] = $this->db->get()->result();

    $data['kategori'] = $kategori;

    $data['kategori_list'] = $this->db
        ->get('kategori')
        ->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('laporan/buku', $data);
    $this->load->view('templates/footer');
    }
    public function cetak_buku()
    {
    $kategori = $this->input->get('kategori');

    $this->db->select('buku.*, kategori.nama_kategori');
    $this->db->from('buku');
    $this->db->join(
        'kategori',
        'kategori.id_kategori = buku.id_kategori'
    );

    if ($kategori) {
        $this->db->where('buku.id_kategori', $kategori);
    }

    $data['data'] = $this->db->get()->result();

    $data['kategori'] = $kategori;

    $this->load->view('laporan/cetak_buku', $data);
    }
}