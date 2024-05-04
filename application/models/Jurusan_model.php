<?php

class Jurusan_model extends CI_Model {

    public function tampil_data($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('kode_jurusan', $keyword);
            $this->db->or_like('nama_jurusan', $keyword);
        }
        return $this->db->get('jurusan', $limit, $start);
    }

    public function input_data($data)
    {
        $this->db->insert('jurusan', $data);
    }

    public function get_update_data($where,$table)
    {
        return $this->db->get_where($table,$where);
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