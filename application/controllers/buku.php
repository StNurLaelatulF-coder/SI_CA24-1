<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model');
    }

    public function index()
    {
        $data['buku'] = $this->buku_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['kategori'] = $this->buku_model->get_kategori();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/tambah', $data);
        $this->load->view('templates/footer');
    }

    // ===============================
    // SIMPAN
    // ===============================
    public function simpan()
    {
        $data = [
            'kode_buku'   => $this->input->post('kode_buku'),
            'judul'       => $this->input->post('judul'),
            'penulis'     => $this->input->post('penulis'),
            'penerbit'    => $this->input->post('penerbit'),
            'tahun'       => $this->input->post('tahun'),
            'id_kategori' => $this->input->post('id_kategori'),
            'stok'        => $this->input->post('stok'),
            'lokasi_rak'  => $this->input->post('lokasi_rak')
        ];

        $this->buku_model->insert($data);
        redirect('buku');
    }

    public function hapus($kode_buku)
    {
        $this->buku_model->delete($kode_buku);
        $this->session->set_flashdata('success', "Data Berhasil Dihapus");
        redirect('buku');
    }

    public function edit($kode_buku)
    {
        $data['buku'] = $this->buku_model->get_by_kode($kode_buku);
        $data['kategori'] = $this->buku_model->get_kategori();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($kode_buku)
    {
        $data = [
            'judul'       => $this->input->post('judul'),
            'penulis'     => $this->input->post('penulis'),
            'penerbit'    => $this->input->post('penerbit'),
            'tahun'       => $this->input->post('tahun'),
            'id_kategori' => $this->input->post('id_kategori'),
            'stok'        => $this->input->post('stok'),
            'lokasi_rak'  => $this->input->post('lokasi_rak')
        ];

        $this->buku_model->update($kode_buku, $data);
        $this->session->set_flashdata('success', 'Data berhasil di update');
        redirect('buku');
    }

}