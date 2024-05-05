<?php
defined('BASEPATH') OR exit('No direct script access allowed');


    function check_login() {
        $CI = &get_instance();
        $CI->load->library('session');
        
        if (!isset($CI->session->userdata['username'])) {
            $CI->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible show fade">Silahkan Login untuk akses!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/auth');
        }
    }
