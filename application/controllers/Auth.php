<?php

class Auth extends CI_Controller {

    public function index(){
        $this->load->view("auth/register");
    }

    public function registerProcess(){
        if ($this->input->post()){
            $username = $this->input->post("username");
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