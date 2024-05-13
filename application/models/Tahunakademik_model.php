<?php

class Tahunakademik_model extends CI_Model {

    public function tampil_data($limit, $start, $keyword = null)
    {
        if($keyword){
            $this->db->like('tahun_akademik', $keyword);
            $this->db->or_like('semester', $keyword);
            $this->db->or_like('status', $keyword);
        }
        $this->db->order_by('tahun_akademik', 'DESC');
        return $this->db->get('tahun_akademik', $limit, $start);
    }
    public function get_update_data($where,$table)
    {
        return $this->db->get_where($table,$where);
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

    public $table ='tahun_akademik';
    public $id = 'id_thn_akad';

    public function get_by_id($id){
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }
}