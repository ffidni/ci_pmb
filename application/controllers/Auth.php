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
            $username = $this->input->post("no_hp");
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $encrypted_pass = md5($password);


            $data = array("no_hp" => $username, "email" => $email, "password" => $encrypted_pass, "hak_akses" => "user");
            $result = $this->Auth_model->register($data);
            if ($result == 0) {
                echo 'Register gagal.';
            } else {
                redirect("auth/login");
            }
        }

    }

    function validateRegister(){
        $this->form_validation->set_rules("no_hp", "Nomor HP", "required|is_unique[user.no_hp]");
        $this->form_validation->set_rules("email", "Email", "required|is_unique[user.email]");
        $this->form_validation->set_rules("password", "Password", "required");

        if ($this->form_validation->run() != false){
            $this->registerProcess();
        } else {
            $this->load->view("auth/register");
        }
    }

    public function validateLogin(){
        $this->form_validation->set_rules("no_hp", "Nomor HP", "required|callback_check_hp");
        $this->form_validation->set_rules("password", "Password", "required|callback_check_password");
        $this->form_validation->set_message("password", "Password tidak cocok.");

        if ($this->form_validation->run() != false) {
            $this->loginProcess();
        } else {
            $this->load->view("auth/login");
        }

    }

    public function check_password(){
        $curr = md5($this->input->post('password'));
        $no_hp = $this->input->post("no_hp");
        return $this->Auth_model->check_field($curr, $no_hp, 'password');
        
    }

    public function check_hp(){
        $no_hp = $this->input->post("no_hp");
        return $this->Auth_model->check_field($no_hp, $no_hp, 'no_hp');
    }

    public function register(){
        $this->load->view("auth/register");
    }

    public function login(){
        $this->load->view("auth/login");
    }

    public function loginProcess(){
        if ($this->input->post()){
            $username = $this->input->post("no_hp");
            $password = $this->input->post("password");
            $encrypted_pass = md5($password);
            $query = $this->Auth_model->login($username, $encrypted_pass);
            print_r($query);
            if ($query->num_rows() > 0){
                $result = $query->result_array()[0];
                $this->session->set_userdata($result);
                redirect("/");
            } else {
                echo "Login gagal";
            }
        }

    }

}   