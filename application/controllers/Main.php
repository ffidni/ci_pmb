<?php

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if ($this->session->userdata("no_hp") == NULL){
            redirect("auth/login");
        }
    }
    
    public function index(){
        $_SESSION['detail_pendaftaran'] = $this->Form_model->get_details($this->session->userdata("mhs_id"))->row_array();
        $data['title'] = "PMBB2022";
        $this->load->view("home/sidebar", $data);
        $this->load->view("home/index");
    }

    public function pembayaran(){
        $data['title'] = "Konfirmasi Pembayaran";
        $this->load->view("home/sidebar", $data);
        $this->load->view("home/pembayaran");
    }

    public function upload_error($target){
        $error = array('error' => $this->upload->display_errors());
        $data['title'] = ($target == 'pembayaran') ? 'Konfirmasi Pembayaran' : 'Dokumen';
        $this->load->view("home/sidebar");
        $this->load->view("home/$target", $error);
    }

    public function upload_bukti(){
        $config['upload_path'] = './assets/bukti/';
        $config['allowed_types'] = "jpg|jpeg|jfif|pjpeg|pjp|png|svg|webp";
        $name = 'bukti-'.$_SESSION['detail_pendaftaran']['nomor_seleksi'];
        $config['file_name'] = $name;
        $oldimage = $this->session->userdata("detail_pendaftaran")['bukti_pembayaran'];
        $oldimage = str_replace(base_url(), "./", $oldimage);


        $this->upload->initialize($config);
        $this->upload->overwrite = true;
        if (!$this->upload->do_upload('userfile')) {
            $this->upload_error("pembayaran");
        } else {
            $this->exists_overwrite($oldimage);
            $path = base_url().'assets/bukti/'.$config['file_name'].$this->upload->data("file_ext");
            $this->Form_model->update("bukti_pembayaran", $path, $this->session->userdata("mhs_id"));
            sleep(1);
            redirect('main/pembayaran');
        }

    }

    public function exists_overwrite($old){
        if (file_exists($old) && strpos($old, $this->upload->data("file_ext")) == false){
            unlink($old);
        }
    }



    public function upload_dokumen(){
        $config['upload_path'] = './assets/dokumen/';
        $config['allowed_types'] = "jpg|jpeg|jfif|pjpeg|pjp|png|svg|webp|pdf";
        $name = '';
        $fileName = '';
        $oldDoc = '';
        if (isset($_FILES['pas_foto'])){
            $name = 'pas_foto';
        } else if (isset($_FILES['ktp'])){
            $name = 'ktp';
        } else if (isset($_FILES['kartu_keluarga'])){
            $name = 'kartu_keluarga';
        } else if (isset($_FILES['ijazah'])){
            $name = 'ijazah';
        }

        if ($name) {
            $oldDoc = $this->session->userdata('detail_pendaftaran')[$name];
            $fileName = $name.'_'.$_SESSION['detail_pendaftaran']['nomor_seleksi'];
            $config['file_name'] = $fileName;
            $oldDoc = str_replace(base_url(), './', $oldDoc);
    
            $this->upload->initialize($config);
            $this->upload->overwrite = true;
            if (!$this->upload->do_upload($name)) {
                $this->upload_error("dokumen");
            } else {
                $this->exists_overwrite($oldDoc);
                $path = base_url().'assets/dokumen/'.$config['file_name'].$this->upload->data("file_ext");
                $this->Form_model->update($name, $path, $this->session->userdata("mhs_id"));  
                sleep(1);
                redirect('main/dokumen');
            }
        } else {
            redirect('main/dokumen');
        }



    }

    public function lihat_bukti($id, $nama, $nomor_seleksi, $page = ''){
        $data['lihat_bukti'] = array();
        $data['lihat_bukti']['img'] = $this->Form_model->get_img($id);
        $data['lihat_bukti']['nomor_seleksi'] = $nomor_seleksi;
        $data['lihat_bukti']['nama'] = str_replace("%20", " ", $nama);
        $data['title'] = "Lihat Bukti";
        $data['page'] = $page;
        $this->load->view("home/sidebar", $data);
        $this->load->view("home/pembayaran", $data);

    }

    public function dokumen(){
        $data = array(
            "pas_foto" => "",
            "ktp" => "",
            "kartu_keluarga" => "",
            "ijazah" => "",
            "title" => "Dokumen",
        );
        $this->load->view("home/sidebar", $data);
        $this->load->view("home/dokumen", $data);
    }

    public function lihat_dokumen($id, $nama, $nomor_seleksi, $page = '') {
        $data['lihat_dokumen'] = array();
        $data['lihat_dokumen']['id'] = $id;
        $data['lihat_dokumen']['title'] = $nama.' ('.$nomor_seleksi.')';
        $data['lihat_dokumen']['title'] = str_replace("%20", " ", $data['lihat_dokumen']['title']);
        $data['title'] = "Lihat Dokumen";
        $data['page'] = $page;

        $this->load->view("home/sidebar", $data);
        $this->load->view("home/dokumen", $data);
    }

    public function kartu(){
        $data['detail_pendaftaran'] = $this->Form_model->get_kartu($_SESSION['mhs_id'])->row_array();
        $this->load->view("home/kartu", $data);
    }


}