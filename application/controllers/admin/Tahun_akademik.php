<?php

class Tahun_akademik extends CI_Controller{

    public function __construct(){
        parent::__construct();
        // cek user login
        check_login();
    }

    public function index()
    {
        // untuk simpan value input sebelumnya

        if(!$this->uri->segment(4) == 'tahun_akademik'){
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
        $config['base_url'] = site_url('admin/tahun_akademik/index'); 
        $this->db->like('tahun_akademik', $data['keyword']);
        $this->db->or_like('semester', $data['keyword']);
        $this->db->or_like('status', $data['keyword']);
        $this->db->from('tahun_akademik');
        $config['total_rows'] = $this->db->count_all_results(); 
        $config['per_page'] = 7;
        $config['uri_segment'] = 4; 
        $choice = $config["total_rows"] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $this->pagination->initialize($config);
        //style pagi sudah di pindah ke config pagination.php

       
        // menampilkan data
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['jlh_data'] = $config['total_rows'];
        $data['tahun_akademik']    = $this->tahunakademik_model->tampil_data($config['per_page'], $data['page'], $data['keyword'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = $this->load->view('admin/tahun_akademik', $data, true);
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
                'tahun_akademik' => $this->input->post('tahun_akademik', TRUE),
                'semester' => $this->input->post('semester', TRUE),
                'status' => $this->input->post('status', TRUE),
            );
            $this->tahunakademik_model->input_data($data, 'tahun_akademik');
            $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data tahun akademik berhasil ditambahkan.']);
            redirect('admin/tahun_akademik');
        }
    }

    public function edit($id)
    {
        $where = array('id_thn_akad' => $id);
        $data['tahun_akademik'] = $this->tahunakademik_model->get_update_data($where, 'tahun_akademik')->result();
        $data['content'] = $this->load->view('admin/tahunakademik_edit', $data, true);
        $this->load->view('template/_Template', $data);
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_thn_akad');
            $this->session->set_flashdata('input', 'Input data tidak valid, silakan coba lagi.');
            $this->edit($id);
        } else {
        $data = array(
            'id_thn_akad' => $this->input->post('id_thn_akad', TRUE),
            'tahun_akademik' => $this->input->post('tahun_akademik', TRUE),
            'semester' => $this->input->post('semester', TRUE),
            'status' => $this->input->post('status', TRUE)
        );
        
        $where = array(
            'id_thn_akad' => $this->input->post('id_thn_akad', TRUE)
        );
        $this->tahunakademik_model->update_data($where,$data,'tahun_akademik');
        $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Tahun Akademik berhasil diupdate.']);
        redirect('admin/tahun_akademik');
        }
    }

    public function hapus($id)
    {
        $where = array('id_thn_akad' => $id);
        $this->tahunakademik_model->delete_data($where, 'tahun_akademik');
        $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Tahun Akademik berhasil dihapus.']);
        redirect('admin/tahun_akademik');
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'tahun_akademik',
            'Tahun Akademik',
            'required'
        );
        $this->form_validation->set_rules(
            'semester',
            'Semester',
            'required'
        );
        $this->form_validation->set_rules(
            'status',
            'Status',
            'required'
        );
    }
}