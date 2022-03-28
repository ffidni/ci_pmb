<?php

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if ($this->session->userdata("no_hp") == NULL){
            redirect("auth/register");
        }
    }
    
    public function index(){
        $_SESSION['detail_pendaftaran'] = $this->Form_model->get_details($this->session->userdata("email"))->row_array();
        $this->load->view("home/sidebar");
        $this->load->view("home/index");
    }

}