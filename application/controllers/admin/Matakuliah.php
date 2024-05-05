<?php

class Matakuliah extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        // cek user login
        check_login();
    }
    
    public function index()
    {
        if (!$this->uri->segment(4) == 'matakuliah') {
            $this->session->unset_userdata('keyword');
        }
        //ambil data keyword
        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        //Mebuat Pagination
        $config['base_url'] = site_url('admin/matakuliah/index');
        $this->db->like('kode_matakuliah', $data['keyword']);
        $this->db->or_like('nama_matakuliah', $data['keyword']);
        $this->db->from('matakuliah');
        $config['total_rows'] = $this->db->count_all_results(); 
        $config['per_page'] = 7;
        $config['uri_segment'] = 4;
        $choice = $config["total_rows"] / $config['per_page'];
        $config['num_links'] = floor($choice);

        //style pagi sudah di pindah ke config pagination.php


        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['jlh_data'] = $config['total_rows'];
        // menampilkan data
        $data['prodi'] = $this->matakuliah_model->ambil_data('prodi')->result();
        $data['matakuliah']    = $this->matakuliah_model->tampil_data($config['per_page'], $data['page'], $data['keyword'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = $this->load->view('admin/matakuliah', $data, true);
        $this->load->view('template/_Template', $data);
    }

    public function input_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('input', 'Input data tidak valid, silakan coba lagi.');
            $this->index();
        } else {
            $data = array(
                'kode_matakuliah' => $this->input->post('kode_matakuliah', TRUE),
                'nama_matakuliah' => $this->input->post('nama_matakuliah', TRUE),
                'sks' => $this->input->post('sks', TRUE),
                'semester' => $this->input->post('semester', TRUE),
                'nama_prodi' => $this->input->post('nama_prodi', TRUE)
            );
            $this->matakuliah_model->input_data($data, 'matakuliah');
            $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Matakuliah berhasil ditambahkan.']);
            redirect('admin/matakuliah');
        }
    }

    public function detail($kode)
    {

        $data['detail'] = $this->matakuliah_model->ambil_kode($kode, 'matakuliah');
        $data['content'] = $this->load->view('admin/matakuliah_detail', $data, true);
        $this->load->view('template/_Template', $data);
    }

    public function edit($id)
    {
        $data['matakuliah'] = $this->db->query("SELECT * FROM matakuliah mk, prodi prd WHERE mk.nama_prodi = prd.nama_prodi AND mk.kode_matakuliah='$id'")->result();
        $data['prodi'] = $this->matakuliah_model->ambil_data('prodi')->result();
        $data['content'] = $this->load->view('admin/matakuliah_edit', $data, true);
        $this->load->view('template/_Template', $data);
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('kode_matakuliah');
            $this->session->set_flashdata('input', 'Input data tidak valid, silakan coba lagi.');
            $this->edit($id);
        } else {
            $data = array(
                'kode_matakuliah' => $this->input->post('kode_matakuliah', TRUE),
                'nama_matakuliah' => $this->input->post('nama_matakuliah', TRUE),
                'sks' => $this->input->post('sks', TRUE),
                'semester' => $this->input->post('semester', TRUE),
                'nama_prodi' => $this->input->post('nama_prodi', TRUE)
            );

            $where = array(
                'kode_matakuliah' => $this->input->post('kode_matakuliah', TRUE)
            );
            $this->matakuliah_model->update_data($where, $data, 'matakuliah');
            $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Matakuliah berhasil diupdate.']);
            redirect('admin/matakuliah');
        }
    }


    public function _rules()
    {
        $this->form_validation->set_rules(
            'kode_matakuliah',
            'Kode Matakuliah',
            'required|max_length[4]'
        );
        $this->form_validation->set_rules(
            'nama_matakuliah',
            'Nama Matakuliah',
            'required'
        );
        $this->form_validation->set_rules(
            'sks',
            'SKS',
            'required'
        );
        $this->form_validation->set_rules(
            'semester',
            'Semester',
            'required'
        );
        $this->form_validation->set_rules(
            'nama_prodi',
            'Program Studi',
            'required'
        );
    }

    public function hapus($id)
    {
        $where = array('kode_matakuliah' => $id);
        $this->prodi_model->delete_data($where, 'matakuliah');
        $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Matakuliah berhasil dihapus.']);
        redirect('admin/matakuliah');
    }
}
