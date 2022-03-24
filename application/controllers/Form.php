<?php 

class Form extends CI_Controller {



    public function index(){

    }

    public function daftar(){
        $data = [
            'provinsi' => $this->Form_model->getprovinsi(),
            'pendidikan' => $this->Form_model->get_pendidikan(),
            'mhs_pendidikan' => array("SMA", "SMK", "MA", "Paket C"),
            'username' => $this->session->userdata("username"),
            'email' => $this->session->userdata("email"),
        ];
        $this->load->view("home/sidebar");
        $this->load->view("home/daftar", $data);
    }

    public function daftar_edit(){
        $data = [
            'provinsi' => $this->Form_model->getprovinsi(),
            'pendidikan' => $this->Form_model->get_pendidikan(),
            'mhs_pendidikan' => array("SMA", "SMK", "MA", "Paket C"),
        ];
        $data['detail_pendaftaran'] = $this->Form_model->get_details($this->session->userdata('email'))->row();
        $this->load->view("home/sidebar");
        $this->load->view("home/edit_daftar", $data);
    }

    function get_kabupaten()
    {
        $category_id = $this->input->post('id',TRUE);
        $data = $this->Form_model->get_kabupaten($category_id)->result();
        echo json_encode($data);
    }

    function get_kecamatan()
    {
        $category_id = $this->input->post('id',TRUE);
        $data = $this->Form_model->get_kecamatan($category_id)->result();
        echo json_encode($data);
    } 
    
    function get_kelurahan()
    {
        $category_id = $this->input->post('id',TRUE);
        $data = $this->Form_model->get_kelurahan($category_id)->result();
        echo json_encode($data);
    }

    public function daftarProcess(){
        $data = $this->input->post();
        if ($data){
            $id = $this->Form_model->insert_data($data);
            if ($id) {
                echo "Berhasil";
            }
        }


    }
}