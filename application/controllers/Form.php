<?php 

class Form extends CI_Controller {
    public function index(){

    }

    public function daftar(){
        $data = [
            'provinsi' => $this->Form_model->getprovinsi(),
        ];
        $data['username'] = $this->session->userdata("username");
        $this->load->view("daftar/index", $data);
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
}