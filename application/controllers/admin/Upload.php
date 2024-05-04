<?php

class Upload extends CI_Controller
{

    public function index()
    {

        $data['upload'] = $this->upload_model->tampil_data('upload')->result();
        $data['content'] = $this->load->view('admin/upload', $data, TRUE);
        $this->load->view('template/_Template', $data);
    }
    public function post()
    {
        $username = $this->session->userdata('username');

        $config['upload_path'] = './assets/files/foto/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['file_name'] = $username.'_'.substr(md5(date('Y-m-d H:i:s')), 1, 5);
        $this->load->library('upload',$config);

        if ($this->input->post('simpan') == 'simpan') {
            if(!$this->upload->do_upload('file')){
                $error = strip_tags($this->upload->display_errors());
                $this->session->set_flashdata('flashData', ['type' => 'error', 'message' => $error]);
                redirect('admin/upload');
            }else{
                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                // Gabungkan nama pengguna dengan nama file
                $input['uploader'] = $username;
                $input['file'] = $config['file_name'] . '.' . $file_ext;
                $this->upload_model->tambah('upload', $input);
                redirect('admin/upload');
            }
        }
    }

    public function hapus($id)
    {
       $where['id_file'] = $id;
       $nama_file = $this->upload_model->tampil_id('upload', $where)->row();
       $this->upload_model->hapus_data('upload',$where);
       unlink('./assets/files/foto/'.$nama_file->file);
       redirect('admin/upload');
       
    }

}
