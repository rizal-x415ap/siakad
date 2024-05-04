<?php

class Jurusan extends CI_Controller
{

    public function index()
    {
        // untuk simpan value input sebelumnya

        if (!$this->uri->segment(4) == 'jurusan') {
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
        $config['base_url'] = site_url('admin/jurusan/index');  
        $this->db->like('kode_jurusan', $data['keyword']);
        $this->db->or_like('nama_jurusan', $data['keyword']);

        $this->db->from('jurusan');
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
        $data['jurusan']    = $this->jurusan_model->tampil_data($config['per_page'], $data['page'], $data['keyword'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = $this->load->view('admin/jurusan', $data, true);
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
                'kode_jurusan' => $this->input->post('kode_jurusan', TRUE),
                'nama_jurusan' => $this->input->post('nama_jurusan', TRUE),
            );
            $this->jurusan_model->input_data($data);
            $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Jurusan berhasil ditambahkan.']);
            redirect('admin/jurusan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'kode_jurusan',
            'Kode Jurusan',
            'required|max_length[3]'
        );
        $this->form_validation->set_rules(
            'nama_jurusan',
            'Nama Jurusan',
            'required'
        );
    }

    public function edit($id)
    {
        $where = array('id_jurusan' => $id);
        $data['jurusan'] = $this->jurusan_model->get_update_data($where, 'jurusan')->result();
        $data['content'] = $this->load->view('admin/jurusan_edit', $data, true);
        $this->load->view('template/_Template', $data);
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_jurusan');
            $this->session->set_flashdata('input', 'Input data tidak valid, silakan coba lagi.');
            $this->edit($id);
        } else {
            $data = array(
                'kode_jurusan' => $this->input->post('kode_jurusan'),
                'nama_jurusan' => $this->input->post('nama_jurusan'),
            );
            $where = array(
                'id_jurusan' => $this->input->post('id_jurusan')
            );
            $this->jurusan_model->update_data($where, $data, 'jurusan');
            $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Jurusan berhasil diupdate.']);
            redirect('admin/jurusan');
        }
    }

    public function hapus($id)
    {
        $where = array('id_jurusan' => $id);
        $this->jurusan_model->delete_data($where, 'jurusan');
        $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Jurusan berhasil dihapus.']);
        redirect('admin/jurusan');
    }
}
