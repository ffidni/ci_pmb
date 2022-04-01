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

        $this->load->view("home/sidebar");
        $this->load->view("home/index");
    }

    public function pembayaran(){
        $this->load->view("home/sidebar");
        $this->load->view("home/pembayaran");
    }

    public function upload_bukti(){
        $config['upload_path'] = './assets/bukti/';
        $config['allowed_types'] = "jpg|jpeg|jfif|pjpeg|pjp|png|svg|webp|gif";
        $name = 'bukti-'.$_SESSION['detail_pendaftaran']['nomor_seleksi'];
        $config['file_name'] = $name;
        $oldimage = $this->session->userdata("detail_pendaftaran")['bukti_pembayaran'];
        $oldimage = str_replace(base_url(), "./", $oldimage);

        if (file_exists($oldimage)){
            unlink($oldimage);
        }

        $this->upload->initialize($config);
        $this->upload->overwrite = true;
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view("home/sidebar");
            $this->load->view("home/pembayaran", $error);
        } else {
            $path = base_url().'assets/bukti/'.$config['file_name'].$this->upload->data("file_ext");
            $this->Form_model->update("bukti_pembayaran", $path, $this->session->userdata("mhs_id"));
            sleep(1);
            redirect('main/pembayaran');
        }

    }

    public function lihat_bukti($id, $nama, $nomor_seleksi){
        $data['lihat_bukti'] = array();
        $data['lihat_bukti']['img'] = $this->Form_model->get_img($id);
        $data['lihat_bukti']['nomor_seleksi'] = $nomor_seleksi;
        $data['lihat_bukti']['nama'] = str_replace("%20", " ", $nama);
        $this->load->view("home/sidebar");
        $this->load->view("home/pembayaran", $data);

    }

}