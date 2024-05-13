<?php

class Krs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // cek user login
        check_login();
    }

    public function index()
    {
        $data['content'] = $this->load->view('admin/masuk_krs', '', true);
        $this->load->view('template/_Template', $data);
    }
    public function krs_aksi()
    {   $this->_rulesKrs();
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('input', 'Input data tidak valid, silakan coba lagi.');
            $this->index();
        } else {

            $nim = $this->input->post('nim', TRUE);
            $thn_akad = $this->input->post('id_thn_akad', TRUE);
            // simpan ke session
            $this->session->set_userdata('nim', $nim);
            $this->session->set_userdata('thn_akad', $thn_akad);
            redirect('admin/krs/krs_list');
        }
    }

    public function krs_list()
    {


        $nim = $this->session->userdata('nim');
        $thn_akad = $this->session->userdata('thn_akad');


        if ($this->mahasiswa_model->get_by_id($nim) == null) {
            $this->session->set_flashdata('flashData', ['type' => 'error', 'message' => 'Data mahasiswa belum terdaftar.']);
            redirect('admin/krs');
        }

        $data = array(
            'nim' => $nim,
            'id_thn_akad' => $thn_akad,
            'nama_lengkap' => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap
        );
        $dataKrs = array(
            'krs_data'      => $this->baca_krs($nim, $thn_akad),
            'nim'           => $nim,
            'id_thn_akad'   => $thn_akad,
            'tahun_akademik' => $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
            'semester' => $this->tahunakademik_model->get_by_id($thn_akad)->semester == 'Ganjil' ? 'Ganjil' : 'Genap',
            'nama_lengkap' => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap,
            'prodi' => $this->mahasiswa_model->get_by_id($nim)->nama_prodi,
            'id_krs'        => set_value('id_krs'),
            'kode_matakuliah' => set_value('kode_matakuliah')
        );


        $data['content'] = $this->load->view('admin/krs_list', $dataKrs, true);
        $this->load->view('template/_Template', $data);
    }

    public function baca_krs($nim, $thn_akad)
    {
        $this->db->select('k.id_krs, k.kode_matakuliah, m.nama_matakuliah,m.sks');
        $this->db->from('krs as k');
        $this->db->where('k.nim', $nim);
        $this->db->where('k.id_thn_akad', $thn_akad);
        $this->db->join('matakuliah as m', 'm.kode_matakuliah = k.kode_matakuliah');
        $krs = $this->db->get()->result();
        return $krs;
    }

    public function tambah_krs()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('input', 'Input data tidak valid, silakan coba lagi.');
            $this->krs_list();
        } else {
            $data = array(
                'nim' => $this->input->post('nim', TRUE),
                'id_thn_akad' => $this->input->post('id_thn_akad', TRUE),
                'kode_matakuliah' => $this->input->post('kode_matakuliah', TRUE),
            );
            $this->krs_model->input_data($data);
            $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data KRS berhasil ditambahkan.']);
            redirect('admin/krs/krs_list');
        }
    }

    public function edit($id)
    {
        $row = $this->krs_model->get_by_id($id);
        $th = $row->id_thn_akad;

        if ($row) {
            $data = array(
                'id_krs'        => set_value('id_krs', $row->id_krs),
                'id_thn_akad'        => set_value('id_thn_akad', $row->id_thn_akad),
                'nim'        => set_value('nim', $row->nim),
                'kode_matakuliah'        => set_value('kode_matakuliah', $row->kode_matakuliah),
                'tahun_akademik'        => $this->tahunakademik_model->get_by_id($th)->tahun_akademik,
                'semester'        => $this->tahunakademik_model->get_by_id($th)->semester == 'Ganjil' ? 'Ganjil' : 'Genap',
            );

            $data['content'] = $this->load->view('admin/krs_edit', $data, true);
            $this->load->view('template/_Template', $data);
        } else {
            echo "Data tidak ada!";
        }
    }
    public function edit_aksi()
    {
        $id_krs     = $this->input->post('id_krs', TRUE);
        $nim     = $this->input->post('nim', TRUE);
        $id_thn_akad     = $this->input->post('id_thn_akad', TRUE);
        $kode_matakuliah     = $this->input->post('kode_matakuliah', TRUE);

        $data = array(
            'id_krs'            => $id_krs,
            'id_thn_akad'       => $id_thn_akad,
            'nim'               => $nim,
            'kode_matakuliah'   => $kode_matakuliah

        );
        $this->krs_model->update($id_krs, $data);
        $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data KRS berhasil diupdate.']);
        redirect('admin/krs/krs_list');
    }

    public function hapus($id)
    {
        $where = array('id_krs' => $id);
        $this->krs_model->delete_data($where, 'krs');
        $this->session->set_flashdata('flashData', ['type' => 'success', 'message' => 'Data KRS berhasil dihapus.']);
        redirect('admin/krs/krs_list');
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'kode_matakuliah',
            'Mata Kuliah',
            'required'
        );
    }

    public function _rulesKrs()
    {
        $this->form_validation->set_rules(
            'nim',
            'nim',
            'required|max_length[8]|numeric'
        );
        $this->form_validation->set_rules(
            'id_thn_akad',
            'tahun akademik',
            'required'
        );
    }

    public function print()
    {

        $nim = $this->session->userdata('nim');
        $thn_akad = $this->session->userdata('thn_akad');


        $data = array(
            'nim' => $nim,
            'id_thn_akad' => $thn_akad,
            'nama_lengkap' => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap
        );
        $dataKrs = array(
            'krs_data'      => $this->baca_krs($nim, $thn_akad),
            'nim'           => $nim,
            'id_thn_akad'   => $thn_akad,
            'tahun_akademik' => $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
            'semester' => $this->tahunakademik_model->get_by_id($thn_akad)->semester == 'Ganjil' ? 'Ganjil' : 'Genap',
            'nama_lengkap' => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap,
            'photo' => $this->mahasiswa_model->get_by_id($nim)->photo,
            'prodi' => $this->mahasiswa_model->get_by_id($nim)->nama_prodi,
            'id_krs'        => set_value('id_krs'),
            'kode_matakuliah' => set_value('kode_matakuliah')
        );

        $this->load->view('print', $dataKrs);

    }
}
