<?php

    class Admin extends CI_Controller {

        public function __construct(){
            parent::__construct();
            if (!array_key_exists("email", $this->session->userdata())){
                redirect('auth/login');
            }
        }

        public function index(){

        }

        public function verifikasi(){
            $data['data_mahasiswa'] = $this->Form_model->get_mahasiswa()->result();
            $data["detail_pendaftaran"] = $this->Form_model->get_details($this->session->userdata("email"))->row_array();
            $this->load->view("home/sidebar", $data);
            $this->load->view("admin/verifikasi", $data);   
        }

        public function accept($id){
            $this->Form_model->update("approved", "1", $id);
            redirect('admin/verifikasi');
        }

        public function deny($id){
            $this->Form_model->update("approved", "0", $id);
            redirect('admin/verifikasi');

        }

        public function batal($id){
            $this->Form_model->update("approved", "", $id);
            redirect('admin/verifikasi');
        }
    }