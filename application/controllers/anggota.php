<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
        if ($this->session->userdata('login')){
            redirect('login');
        }
    }

    public function index()
    {
        $data['anggota'] = $this->anggota_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/tambah');
        $this->load->view('templates/footer');
    }

    // ===============================
    // SIMPAN
    // ===============================
    public function simpan()
    {
        $data = [
            'nomor_anggota'  => $this->input->post('nomor_anggota'),
            'nama'           => $this->input->post('nama'),
            'alamat'         => $this->input->post('alamat'),
            'telepon'        => $this->input->post('telepon'),
            'email'          => $this->input->post('email'),
            'tanggal_daftar' => $this->input->post('tanggal_daftar'),
            'status'         => $this->input->post('status')
        ];

        $this->anggota_model->insert($data);
        redirect('anggota');
    }

    public function hapus($id)
    {
        $this->anggota_model->delete($id);
        $this->session->set_flashdata('success', "Data Berhasil Dihapus");
        redirect('anggota');
    }

    public function edit($id)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data = [
            'nomor_anggota'  => $this->input->post('nomor_anggota'),
            'nama'           => $this->input->post('nama'),
            'alamat'         => $this->input->post('alamat'),
            'telepon'        => $this->input->post('telepon'),
            'email'          => $this->input->post('email'),
            'tanggal_daftar' => $this->input->post('tanggal_daftar'),
            'status'         => $this->input->post('status')
        ];

        $this->anggota_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data berhasil di update');
        redirect('anggota');
    }

}