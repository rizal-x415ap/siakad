<?php

class Prodi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        // cek user login
        check_login();
    }

    public function index()
    {
        // untuk simpan value input sebelumnya

        if(!$this->uri->segment(4) == 'prodi'){
            $this->session->unset_userdata('keyword');
        }
        //ambil data keyword
        if($this->input->post('keyword')){
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        }else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        //Mebuat Pagination
        $config['base_url'] = site_url('admin/prodi/index'); 
        $this->db->like('kode_prodi', $data['keyword']);
        $this->db->or_like('nama_prodi', $data['keyword']);
        $this->db->or_like('nama_jurusan', $data['keyword']);
        $this->db->from('prodi');
        $config['total_rows'] = $this->db->count_all_results(); 
        $config['per_page'] = 7;
        $config['uri_segment'] = 4; 
        $choice = $config["total_rows"] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $this->pagination->initialize($config);
        //style pagi sudah di pindah ke config pagination.php

       
        // menampilkan data
        $data['jurusan'] = $this->prodi_model->ambil_data('jurusan')->result();
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['jlh_data'] = $config['total_rows'];
        $data['prodi']    = $this->prodi_model->tampil_data($config['per_page'], $data['page'], $data['keyword'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = $this->load->view('admin/prodi', $data, true);
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
                'kode_prodi' => $this->input->post('kode_prodi', TRUE),
                'nama_prodi' => $this->input->post('nama_prodi', TRUE),
                'nama_jurusan' => $this->input->post('nama_jurusan', TRUE),
            );
            $this->prodi_model->input_data($data, 'prodi');
            $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data prodi berhasil ditambahkan.']);
            redirect('admin/prodi');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'kode_prodi',
            'Kode prodi',
            'required|max_length[3]'
        );
        $this->form_validation->set_rules(
            'nama_prodi',
            'Nama Prodi',
            'required'
        );
        $this->form_validation->set_rules(
            'nama_jurusan',
            'Nama Jurusan',
            'required'
        );
    }

    public function edit($id)
    {
        $data['prodi'] = $this->db->query("SELECT * FROM prodi prd, jurusan jrs where prd.nama_jurusan=jrs.nama_jurusan and 
        prd.id_prodi='$id'")->result();
        $data['jurusan'] = $this->prodi_model->ambil_data('jurusan')->result();
        $data['content'] = $this->load->view('admin/prodi_edit', $data, true);
        $this->load->view('template/_Template', $data);
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_prodi');
            $this->session->set_flashdata('input', 'Input data tidak valid, silakan coba lagi.');
            $this->edit($id);
        } else {
        $data = array(
            'id_prodi' => $this->input->post('id_prodi', TRUE),
            'kode_prodi' => $this->input->post('kode_prodi', TRUE),
            'nama_prodi' => $this->input->post('nama_prodi', TRUE),
            'nama_jurusan' => $this->input->post('nama_jurusan', TRUE)
        );
        
        $where = array(
            'id_prodi' => $this->input->post('id_prodi', TRUE)
        );
        $this->prodi_model->update_data($where,$data,'prodi');
        $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Prodi berhasil diupdate.']);
        redirect('admin/prodi');
        }
    }

    public function hapus($id)
    {
        $where = array('id_prodi' => $id);
        $this->prodi_model->delete_data($where, 'prodi');
        $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Prodi berhasil dihapus.']);
        redirect('admin/prodi');
    }
}