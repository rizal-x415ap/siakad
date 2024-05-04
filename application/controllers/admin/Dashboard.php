<?php

class Dashboard extends CI_Controller {

    function __construct() {
        parent:: __construct();
        if (!isset($this->session->userdata['username'])){
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible show fade">Anda belum Login!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/auth');
        }
    }

    public function index()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama_lengkap' => $data->nama_lengkap,
            'level'    => $data->level,
        );
        $data['content'] = $this->load->view('admin/dashboard', $data, true);
        $this->load->view('template/_Template', $data);
    }
}