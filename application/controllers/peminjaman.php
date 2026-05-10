<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('Peminjaman_model');
    }

    public function index()
    {
        $data['peminjaman'] = $this->Peminjaman_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/tambah');
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        if (!$this->input->post('anggota_id')) {
            redirect('peminjaman/tambah');
        }

        $data = [
            'kode_peminjaman' => uniqid('PMJ-'),
            'anggota_id' => $this->input->post('anggota_id'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_jatuh_tempo' => $this->input->post('tanggal_jatuh_tempo'),
            'status' => 'dipinjam',
            'user_id' => $this->session->userdata('id_user')
        ];

        $buku_id = $this->input->post('buku_id');

        $this->Peminjaman_model->insert($data, $buku_id);

        redirect('peminjaman');
    }

    public function edit($id)
    {
        $data['peminjaman'] = $this->db->get_where(
            'peminjaman',
            ['id' => $id]
        )->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data = [
            'kode_peminjaman' => $this->input->post('kode_peminjaman'),
            'anggota_id' => $this->input->post('anggota_id'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_jatuh_tempo' => $this->input->post('tanggal_jatuh_tempo'),
            'status' => $this->input->post('status'),
            'user_id' => $this->input->post('user_id')
        ];

        $this->db->where('id', $id);

        $this->db->update('peminjaman', $data);

        redirect('peminjaman');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);

        $this->db->delete('peminjaman');

        redirect('peminjaman');
    }

    public function kembali($id)
    {
        $this->Peminjaman_model->pengembalian($id);

        redirect('peminjaman');
    }
}