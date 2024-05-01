<?php

class Jurusan_model extends CI_Model {

    public function tampil_data($limit, $start)
    {
        return $this->db->get('jurusan', $limit, $start);
    }

    public function input_data($data)
    {
        $this->db->insert('jurusan', $data);
    }
}