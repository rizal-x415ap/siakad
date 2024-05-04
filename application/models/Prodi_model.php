<?php

class Prodi_model extends CI_Model {

    public function tampil_data($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('kode_prodi', $keyword);
            $this->db->or_like('nama_prodi', $keyword);
            $this->db->or_like('nama_jurusan', $keyword);
        }
        return $this->db->get('prodi', $limit, $start);
    }
    public function ambil_data($table)
    {
        return $this->db->get($table);
    }

    public function input_data($data,$table)
    {
        $this->db->insert($table, $data);
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function delete_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}