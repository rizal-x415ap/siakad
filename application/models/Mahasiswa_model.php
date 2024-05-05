<?php

class Mahasiswa_model extends CI_Model {

    public function tampil_data($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('nim', $keyword);
            $this->db->or_like('nama_lengkap', $keyword);
            $this->db->or_like('email', $keyword);
        }
        return $this->db->get('mahasiswa', $limit, $start);
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
        $result = $this->db->where('id', $kode)->get($table);
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
    public function tampil_id($table,$where){
        return $this->db->get_where($table,$where);
       }

    public function delete_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}