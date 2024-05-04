<?php
class Upload_model extends CI_Model{

    public function tambah($table,$data){
        $this->db->insert($table,$data);
    }
    public function tampil_data($table){
       return $this->db->get($table);
    }
    public function tampil_id($table,$where){
     return $this->db->get_where($table,$where);
    }
    public function hapus_data($table,$where){
        $this->db->where($where);
        $this->db->delete($table);
    }
}