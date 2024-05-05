<?php

class Dashboard_model extends CI_Model{

    public function jumlah_data($table) {
        return $this->db->count_all($table);
    }
    public function tampil_data($table,$limit,$start){
        return $this->db->get($table,$limit,$start);
    }
}