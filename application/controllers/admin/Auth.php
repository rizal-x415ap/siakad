<?php

class Auth extends CI_Controller
{   
    

    public function index()
    {
        if(isset($this->session->userdata['username'])){
            redirect('admin/dashboard');
        }else{
            $this->load->view('admin/login');
        }
    }

    public function proses_login()
    {
        $this->load->model('login_model'); // Load model sebelum menggunakannya

        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $cek    = $this->login_model->cek_login($user, $pass);

            if ($cek->num_rows() > 0) {
                foreach ($cek->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }

                if ($sess_data['level'] == 'admin') {
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">Maaf Username dan Password Salah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    redirect('admin/auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade">Maaf Username dan Password Salah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('admin/auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/auth');
    }
}
