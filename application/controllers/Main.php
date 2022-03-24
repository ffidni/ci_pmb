<?php

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if ($this->session->userdata("username") == NULL){
            redirect("auth/register");
        }
    }
    
    public function index(){
        $data["detail_pendaftaran"] = $this->Form_model->get_details($this->session->userdata("email"))->row_array();
        $this->load->view("home/sidebar", $data);
        $this->load->view("home/index", $data);
    }

}