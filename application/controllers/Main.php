<?php

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if ($this->session->userdata("username") == NULL){
            redirect("auth/register");
        }
    }
    
    public function index(){
        $this->load->view("home/index");
    }

    public function daftar(){
        $this->load->view("daftar/index");
    }




}