<?php

class Matakuliah_model extends CI_Model {

    public function tampil_data($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('kode_matakuliah', $keyword);
            $this->db->or_like('nama_matakuliah', $keyword);
            $this->db->or_like('sks', $keyword);
            $this->db->or_like('semester', $keyword);
            $this->db->or_like('nama_prodi', $keyword);
        }
        return $this->db->get('matakuliah', $limit, $start);
    }
    public function ambil_data($table)
    {
        return $this->db->get($table);
    }

    public function input_data($data,$table)
    {
        $this->db->insert($table, $data);
    }
    public function ambil_kode($kode,$table)
    {
        $result = $this->db->where('kode_matakuliah', $kode)->get($table);
        if($result->num_rows() >0){
            return $result->result();
        }else{
            return false;
        }
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