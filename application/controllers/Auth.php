<?php

class Auth extends CI_Controller {

    public function index(){
        $this->load->view("auth/register");
        
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('auth/login'));
    }

    public function registerProcess(){
        if ($this->input->post()){
            $username = $this->input->post("username");
            $matches = $this->Auth_model->check_username($username)->num_rows();
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $encrypted_pass = md5($password);


            $data = array("username" => $username, "email" => $email, "password" => $encrypted_pass, "hak_akses" => "user");
            $result = $this->Auth_model->register($data);
            if ($result == 0) {
                echo 'Register gagal.';
            } else {
                redirect("auth/login");
            }
        }

    }

    function validateRegister(){
        $this->form_validation->set_rules("username", "Username", "required|is_unique[user.username]");
        $this->form_validation->set_rules("email", "Email", "required|is_unique[user.email]");
        $this->form_validation->set_rules("password", "Password", "required");

        if ($this->form_validation->run() != false){
            
        } else {
            $this->load->view("auth/register");
        }
    }

    public function register(){
        $this->load->view("auth/register");
    }

    public function login(){
        $this->load->view("auth/login");
    }

    public function loginProcess(){
        if ($this->input->post()){
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $encrypted_pass = md5($password);
            $query = $this->Auth_model->login($username, $encrypted_pass);
            print_r($query);
            if ($query->num_rows() > 0){
                $result = $query->result_array()[0];
                $this->session->set_userdata($result);
                print_r($this->session->userdata("username"));
                redirect("/");
            } else {
                echo "Login gagal";
            }
        }

    }

}   