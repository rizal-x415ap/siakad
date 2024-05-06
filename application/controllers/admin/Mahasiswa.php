<?php

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek user login
        check_login();
    }

    public function index()
    {
        if (!$this->uri->segment(4) == 'mahasiswa') {
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
        $config['base_url'] = site_url('admin/mahasiswa/index');
        $this->db->like('nim', $data['keyword']);
        $this->db->or_like('nama_lengkap', $data['keyword']);
        $this->db->from('mahasiswa');
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
        $data['prodi'] = $this->mahasiswa_model->ambil_data('prodi')->result();
        $data['mahasiswa']    = $this->mahasiswa_model->tampil_data($config['per_page'], $data['page'], $data['keyword'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = $this->load->view('admin/mahasiswa', $data, true);
        $this->load->view('template/_Template', $data);
    }

    public function input_aksi()
    {
        $username = $this->session->userdata('username');
        $config['upload_path'] = './assets/files/foto/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['file_name'] = $username . '_' . substr(md5(date('Y-m-d H:i:s')), 1, 5);
        $this->load->library('upload', $config);

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('input', 'Input data tidak valid, silakan coba lagi.');
            $this->index();
        } else if (!$this->upload->do_upload('file')) {
            $error = strip_tags($this->upload->display_errors());
            $this->session->set_flashdata('input', $error);
            $this->index();
        } else {
            $data = array(
                'nim' => $this->input->post('nim', TRUE),
                'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'telepon' => $this->input->post('telepon', TRUE),
                'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'nama_prodi' => $this->input->post('nama_prodi', TRUE),
            );
            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $data['photo'] = $config['file_name'] . '.' . $file_ext;
            $this->mahasiswa_model->input_data($data, 'mahasiswa');
            $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Mahasiswa berhasil ditambahkan.']);
            redirect('admin/mahasiswa');
        }
    }
    public function detail($id)
    {

        $data['detail'] = $this->mahasiswa_model->ambil_kode($id, 'mahasiswa');
        $data['content'] = $this->load->view('admin/mahasiswa_detail', $data, true);
        $this->load->view('template/_Template', $data);
    }

    public function edit($id)
    {
        $data['mahasiswa'] = $this->db->query("SELECT * FROM mahasiswa mhs, prodi prd WHERE mhs.nama_prodi = prd.nama_prodi AND mhs.id='$id'")->result();
        $data['prodi'] = $this->mahasiswa_model->ambil_data('prodi')->result();
        $data['content'] = $this->load->view('admin/mahasiswa_edit', $data, true);
        $this->load->view('template/_Template', $data);
    }

    public function edit_aksi()
    {
        $username = $this->session->userdata('username');
        $config['upload_path'] = './assets/files/foto/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['file_name'] = $username . '_' . substr(md5(date('Y-m-d H:i:s')), 1, 5);
        $this->load->library('upload', $config);
        $this->_rules();
        $id = $this->input->post('id');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('input', 'Input data tidak valid, silakan coba lagi.');
            $this->edit($id);
        } else {
            $data = array(
                'nim' => $this->input->post('nim', TRUE),
                'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'telepon' => $this->input->post('telepon', TRUE),
                'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'nama_prodi' => $this->input->post('nama_prodi', TRUE),
            );

            $where = array(
                'id' => $this->input->post('id')
            );

            if (!empty($_FILES['file']['name'])) {
                if ($this->upload->do_upload('file')) {
                    $nama_file = $this->mahasiswa_model->tampil_id('mahasiswa', $where)->row();
                    unlink('./assets/files/foto/' . $nama_file->photo);
                    $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $data['photo'] = $config['file_name'] . '.' . $file_ext;
                } else {
                    $error = strip_tags($this->upload->display_errors());
                    $this->session->set_flashdata('flashData', ['type' => 'error', 'message' => $error]);
                    redirect('admin/mahasiswa/edit/'.$id);
                }
            }

            $this->mahasiswa_model->update_data($where, $data, 'mahasiswa');
            $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Mahasiswa berhasil diupdate.']);
            redirect('admin/mahasiswa/detail/'.$id);
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'nim',
            'NIM',
            'required|max_length[8]|numeric'
        );
        $this->form_validation->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required'
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required'
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email'
        );
        $this->form_validation->set_rules(
            'telepon',
            'No Telepon',
            'required|numeric|max_length[15]'
        );
        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required'
        );
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required'
        );
        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
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
        $where = array('id' => $id);
        $nama_file = $this->mahasiswa_model->tampil_id('mahasiswa', $where)->row();
        unlink('./assets/files/foto/' . $nama_file->photo);
        $this->mahasiswa_model->delete_data($where, 'mahasiswa');
        $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data Matakuliah berhasil dihapus.']);
        redirect('admin/mahasiswa');
    }
}
