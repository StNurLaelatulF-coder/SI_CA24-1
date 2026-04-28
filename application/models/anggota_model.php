<?php
class anggota_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('anggota')->result();
    }

    public function tampil()
    {
        return $this->db->get('anggota')->result();
    }

    public function insert($data)
    {
        $this->db->insert('anggota', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('anggota');
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('anggota')->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('anggota', $data);
    }

}