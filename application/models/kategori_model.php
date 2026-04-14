<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class kategori_model extends CI_Model {

private $tabel = 'kategori';

// Ambil semua data
public function get_all()
{
    return $this->db->get($this->tabel)->result();
}
public function get_by_id($id)
{
    $this->db->where('id', $id);
    return $this->db->get('kategori')->row();
}
//insert data
public function insert($data)
{
    return $this->db->insert($this->tabel, $data);
}
public function delete($id)
{
    return $this->db->delete($this->tabel, ['id'=>$id]);
}
public function update($id,$data)
{
    $this->db->where('id',$id);
    return $this->db->update($this->tabel, $data);
}

}