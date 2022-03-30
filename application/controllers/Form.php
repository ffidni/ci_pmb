<?php 

class Form extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!array_key_exists("email", $this->session->userdata())){
            redirect('auth/login');
        }
    }

    public function index(){

    }

    public function daftar($is_edit = false, $detail = [], $updated = false){
        $data = [
            'provinsi' => $this->Form_model->getprovinsi(),
            'pendidikan' => $this->Form_model->get_pendidikan(),
            'mhs_pendidikan' => array("SMA", "SMK", "MA", "Paket C"),
            'is_home' => false,
            'is_edit' => false,
        ];
        if ($updated) {
            $data['updated'] = $updated;
        }

        if ($is_edit){
            $detail = $this->session->userdata("detail_pendaftaran");
            $data['is_edit'] = true;
        }


        if (!empty($detail)){
            $data['detail_pendaftaran'] = $detail;
        } else {
            $data['detail_pendaftaran'] = $this->Form_model->get_details($this->session->userdata('email'))->row_array();
            $_SESSION['detail_pendaftaran'] = $data['detail_pendaftaran'];
        }

        $this->load->view("home/sidebar", $data);
        $this->load->view("home/daftar", $data);
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
                $data['nomor_seleksi'] = $this->get_seleksi();
                $data['approved'] = "";
                $this->Form_model->update("nomor_seleksi", $data['nomor_seleksi'], $id);
                redirect('/');
            }
        }
    }

    public function updateProcess(){
        $data = $this->input->post();
        $id = $_SESSION['detail_pendaftaran']['mhs_id'];
        $updated = $this->Form_model->update_all($id, $data);
        $_SESSION['detail_pendaftaran'] = $this->Form_model->get_details($this->session->userdata('email'))->row_array();
        $this->daftar(true, $data, $updated);

    }

    public function get_seleksi(){
        $email = $this->session->userdata("email");
        $id = $this->Form_model->get_id($email)->row()->mhs_id;
        $current_year = date('y');
        return "$current_year-$id";
    }


    public function validateForm($is_update = false){
        $this->form_validation->set_rules("email", "Email", "required|is_unique[mahasiswa.email]", array("is_unique" => "Email ini sudah terdaftar, coba masukan email lain!"));
        $this->form_validation->set_rules("no_hp", "Nomor Hp", "required|is_unique[mahasiswa.no_hp]", array("is_unique" => "Nomor ini sudah terdaftar, coba masukan nomor lain!"));
        $this->form_validation->set_rules("nomor_ijazah", "Nomor Ijazah", "required|is_unique[mahasiswa.nomor_ijazah]", array("is_unique" => "Seri ini sudah terdaftar, coba masukan seri lain!"));

        if ($is_update && $_SESSION['detail_pendaftaran']['email'] == $this->input->post('email') && $_SESSION['detail_pendaftaran']['no_hp'] == $this->input->post('no_hp') && $_SESSION['detail_pendaftaran']['nomor_ijazah'] == $this->input->post('nomor_ijazah')) {
            $this->updateProcess();
        } 
        if ($this->form_validation->run() != false) {
                if ($is_update) {
                    $this->updateProcess();
                } else {
                    $this->daftarProcess();
                }
        } else {

            $this->daftar($is_update, $this->input->post());
        }
    }
}