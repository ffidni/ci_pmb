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

        public function verifikasi($type = "pengguna"){
            $jumlah_data = $this->Form_model->count_mahasiswa();
            $this->load->library('pagination');
            $config['base_url'] = base_url('admin/verifikasi/mahasiswa');
            $config['total_rows'] = $jumlah_data;
            $config['per_page'] = 15;

            $config['full_tag_open'] = '<div class="pagination"><ul>';
            $config['full_tag_close'] = '</ul></div><!--pagination-->';
        
            $config['first_link'] = '&laquo; First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';
        
            $config['last_link'] = 'Last &raquo;';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';
        
            $config['next_link'] = 'Selanjutnya &rarr;';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';
        
            $config['prev_link'] = '&larr; Sebelumnya';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';
        
            $config['cur_tag_open'] = '<li class="active"><a class="btn">';
            $config['cur_tag_close'] = '</a></li>';
        
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';
            $from = $this->uri->segment(4);
            $this->pagination->initialize($config);



            $data['data_mahasiswa'] = $this->Form_model->get_mahasiswa($config['per_page'], $from)->result();
            $data['data_pengguna'] = $this->Auth_model->get_data()->result();
            $data['title'] = "Verifikasi Data";
            $data['type'] = $type;

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

        public function user_detail($mhs_id, $page = '', $print_view = false){
            $data = [
                'provinsi' => $this->Form_model->getprovinsi(),
                'pendidikan' => $this->Form_model->get_pendidikan(),
                'mhs_pendidikan' => array("SMA", "SMK", "MA", "Paket C"),
                'is_home' => false,
                'is_edit' => false,
                'page' => $page,
            ];
            $data['detail_pendaftaran'] = $this->Form_model->get_details($mhs_id)->row_array();
            
            if ($print_view){
                $data['is_print'] = $print_view;
                $kec = $data['detail_pendaftaran']['kec'];
                $kec_ortu = $data['detail_pendaftaran']['kec_orangtua'];
                $data['detail_pendaftaran']['provinsi'] = $this->Form_model->get_lokasi("tprovinsi", "id_prov", $data['detail_pendaftaran']['provinsi']);
                $data['detail_pendaftaran']['kab_kota'] = $this->Form_model->get_lokasi("tkabupaten", "id_kab", $data['detail_pendaftaran']['kab_kota']);
                $data['detail_pendaftaran']['kec'] = $this->Form_model->get_lokasi("tkecamatan", "id_kec", $data['detail_pendaftaran']['kec']);
                $data['detail_pendaftaran']['kel'] = $this->Form_model->get_lokasi("tkelurahan", "id_kec", $kec);
                $data['detail_pendaftaran']['provinsi_orangtua'] = $this->Form_model->get_lokasi("tprovinsi", "id_prov", $data['detail_pendaftaran']['provinsi_orangtua']);
                $data['detail_pendaftaran']['kota_orangtua'] = $this->Form_model->get_lokasi("tkabupaten", "id_kab", $data['detail_pendaftaran']['kota_orangtua']);
                $data['detail_pendaftaran']['kec_orangtua'] = $this->Form_model->get_lokasi("tkecamatan", "id_kec", $data['detail_pendaftaran']['kec_orangtua']);
                $data['detail_pendaftaran']['kel_orangtua'] = $this->Form_model->get_lokasi("tkelurahan", "id_kec", $kec_ortu);
                $this->load->view("home/print_view", $data);
            } else {
                $data['admin_view'] = true;
                $data['title'] = "Detail Calon Mahasiswa";
                $this->load->view("home/sidebar", $data);
                $this->load->view("home/daftar", $data);
            }
        }

        public function reset_password($id){
            $data['user_id'] = $id;
            $status = $this->Auth_model->updatePassword(md5("pmb2022stainu"), $id);
            $this->session->set_flashdata("update_status", $status);
            redirect('admin/verifikasi');
        }

    }