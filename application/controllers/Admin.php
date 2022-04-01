<?php

    class Admin extends CI_Controller {

        public function __construct(){
            parent::__construct();
            if (!array_key_exists("email", $this->session->userdata())){
                redirect('auth/login');
            } else if ($this->session->userdata("hak_akses") == 'user'){
                redirect('/');
            }
        }

        public function index(){

        }

        public function verifikasi(){
            $data['data_mahasiswa'] = $this->Form_model->get_mahasiswa()->result();
            $this->load->view("home/sidebar", $data);
            $this->load->view("admin/verifikasi", $data);   
        }

        public function accept($id){
            $this->Form_model->update("approved", "1", $id);
            redirect('admin/verifikasi');
        }

        public function deny($id){
            $this->Form_model->update("approved", "0", $id);
            $this->Form_model->update("alasan_pembatalan", $this->input->post("alasan_pembatalan"), $id);
            redirect('admin/verifikasi');
        }

        public function batal($id){
            $this->Form_model->update("approved", "", $id);
            redirect('admin/verifikasi');
        }

        public function user_detail($mhs_id, $print_view = false){
            $data = [
                'provinsi' => $this->Form_model->getprovinsi(),
                'pendidikan' => $this->Form_model->get_pendidikan(),
                'mhs_pendidikan' => array("SMA", "SMK", "MA", "Paket C"),
                'is_home' => false,
                'is_edit' => false,
            ];
            $data['detail_pendaftaran'] = $this->Form_model->get_details($mhs_id)->row_array();
    
            if ($print_view){
                $data['is_print'] = $print_view;
                $this->load->view("home/print_view", $data);
            } else {
                $data['admin_view'] = true;
                $this->load->view("home/sidebar");
                $this->load->view("home/daftar", $data);
            }
        }
    }