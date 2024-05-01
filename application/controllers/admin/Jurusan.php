<?php

class Jurusan extends CI_Controller
{

    public function index()
    {
        // untuk simpan value input sebelumnya
        $data = array(
            'id_jurusan'    => set_value('id_jurusan'),
            'kode_jurusan'  => set_value('kode_jurusan'),
            'nama_jurusan'  => set_value('nama_jurusan')
        );
        //Mebuat Pagination
        $config['base_url'] = site_url('admin/jurusan/index'); // URL halaman 
        $config['total_rows'] = $this->db->count_all('jurusan'); // Jumlah total baris data
        $config['per_page'] = 7; // Jumlah data per halaman
        $config['uri_segment'] = 4; // Segment URI yang berisi nomor halaman
        $choice = $config["total_rows"] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['first_link']       = false;
        $config['last_link']        = false;
        $config['full_tag_open']    = '<ul class="pagination justify-content-start mt-2">';
        $config['full_tag_close']   = '</ul>';
        $config['attributes']       = ['class' => 'page-link'];
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';


        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;


        // menampilkan data
        $data['jurusan']    = $this->jurusan_model->tampil_data($config['per_page'], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = $this->load->view('admin/jurusan', $data, true);
        $this->load->view('template/_Template', $data);
    }


    public function input_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'error');
            $this->index();
        } else {
            $data = array(
                'kode_jurusan' => $this->input->post('kode_jurusan', TRUE),
                'nama_jurusan' => $this->input->post('nama_jurusan', TRUE),
            );
            $this->jurusan_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade">Data Jurusan Berhasil ditambhakan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/jurusan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'kode_jurusan',
            'Kode Jurusan',
            'required|max_length[3]',
            [
                'required' => 'Kode jurusan tidak boleh kosong!',
                'max_length' => 'Kode jurusan tidak boleh lebih dari 3 karakter!'
            ]
        );
        $this->form_validation->set_rules(
            'nama_jurusan',
            'nama_jurusan',
            'required',
            [
                'required' => 'Nama jurusan tidak boleh kosong!'
            ]
        );
    }
}
