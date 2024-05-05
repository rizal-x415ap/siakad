<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // cek user login
        check_login();
    }

    public function index()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama_lengkap' => $data->nama_lengkap,
            'level'    => $data->level,
        );
        $data['jumlah_data_mhs'] = $this->dashboard_model->jumlah_data('mahasiswa');
        $data['jumlah_data_prd'] = $this->dashboard_model->jumlah_data('prodi');
        $data['jumlah_data_mk'] = $this->dashboard_model->jumlah_data('matakuliah');
        $data['mahasiswa'] = $this->dashboard_model->tampil_data('mahasiswa', 3, 2)->result();
        $data['content'] = $this->load->view('admin/dashboard', $data, true);
        $this->load->view('template/_Template', $data);
    }
}
