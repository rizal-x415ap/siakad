<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_hook {

    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
    }

    public function check_login() {
        if (!isset($this->CI->session->userdata['username'])) {
            $this->CI->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible show fade">Anda belum Login!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/auth');
        }
    }
}
