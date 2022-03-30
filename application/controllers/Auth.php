<?php

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (array_key_exists("email", $this->session->userdata())){
            
        }
    }

    public function index(){
        $this->load->view("auth/register");
        
    }

    public function logout(){
        unset($_SESSION);
        redirect('auth/login');
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
                $_SESSION['error_register'] = "Register gagal. Pastikan kamu terkoneksi dengan internet.";
                redirect('auth/register');
            } else {
                redirect("auth/login");
            }
        }

    }

    function validateRegister(){
        $this->form_validation->set_rules("no_hp", "Nomor HP", "required|is_unique[user.no_hp]", array("is_unique" => "Nomor HP ini sudah dipakai.", "required" => "Harus diisi."));
        $this->form_validation->set_rules("email", "Email", "required|is_unique[user.email]", array("is_unique" => "Email ini sudah terdaftar.", "required" => "Harus diisi."));
        $this->form_validation->set_rules("password", "Password", "required", array("required" => "Harus diisi."));

        if ($this->form_validation->run() != false){
            $this->registerProcess();
        } else {
            $this->register();
        }
    }
    
    public function check_password_login(){
        $no_hp = $this->input->post("no_hp");
        $id = $this->Auth_model->get_id("no_hp", $no_hp);
        if (!isset($id)) {
            return false;
        }
        $password = $this->input->post("password");
        return $this->Auth_model->check_field($password, $id, 'password');
    }



    public function validateLogin(){
        $this->form_validation->set_rules("no_hp", "Nomor HP", "required|callback_check_hp", array("required" => "Harus diisi.", "check_hp" => "Nomor HP tidak terdaftar."));
        $this->form_validation->set_rules("password", "Password", "required|callback_check_password_login", array("required" => "Harus diisi.", "check_password_login" => "Password salah atau akun tidak terdaftar."));
        //$this->form_validation->set_message("password", "Password tidak cocok.");
        //$this->form_validation->set_message("no_hp", "Nomor HP tidak terdaftar.");

        if ($this->form_validation->run() != false) {
            $this->loginProcess();
        } else {
            $this->login();
        }


    }



    public function check_hp(){
        $no_hp = $this->input->post("no_hp");
        $id = $this->Auth_model->get_id("no_hp", $no_hp);
        if (!$id){
            return false;
        }
        return $this->Auth_model->check_field($no_hp, $id, 'no_hp');
    }

    public function register($validate = false){
        if ($validate){
            $this->validateRegister();
        } else {
            $this->load->view("auth/register");
        }
    }

    public function login($validate = false){
        if ($validate){
            $this->validateLogin();
        } else {    
            $this->load->view("auth/login");
        }

    }

    function check_password($password){
        $id = $_SESSION['id'];
        if ($this->Auth_model->check_field($password, $id, 'password')) {
            return true;
        }
        return false;
    }

    public function ubah($type) {
        if ($type == 'pass'){
            $passwordLama = $this->input->post('passwordLama');
            $this->form_validation->set_rules("passwordLama", "Password Lama", "required|callback_check_password['.$passwordLama.']", array("required" => "Harus diisi.", "check_password" => "Password lama tidak sesuai."));
            $this->form_validation->set_rules("password", "Password", "required", array("required" => "Harus diisi."));
            $this->form_validation->set_rules("konfirmasi", "Konfirmasi", "required", array("required" => "Harus diisi."));
            if ($this->form_validation->run() != false) {
                $passwordBaru = md5($this->input->post("password"));
                $updated = $this->Auth_model->updatePassword($passwordBaru);
                $data['update_status'] = $updated;
                $data['ubah_pass'] = true;
                $this->load->view("home/sidebar");
                $this->load->view("auth/pengaturan", $data);
            } else {
                $data["ubah_pass"] = true;
                $this->load->view("home/sidebar");
                $this->load->view("auth/pengaturan", $data);
            }

        } else {
            $this->form_validation->set_rules("no_hp", "No HP", "required|is_unique[user.no_hp]", array("required" => "Harus diisi.", "is_unique" => "Nomor HP telah digunakan."));
            $this->form_validation->set_rules("email", "Email", "required|is_unique[user.email]", array("required" => "Harus diisi.", "is_unique" => "Email telah digunakan."));
            if ($this->form_validation->run() != false) {
                $no_hp = $this->input->post("no_hp");
                $email = $this->input->post("email");
                $updated = $this->Auth_model->updateDetails($no_hp, $email);
                $data['update_status'] = $updated;
                if ($updated) {
                    $this->session->set_userdata("no_hp", $no_hp);
                    $this->session->set_userdata("email", $email);
                }
            }
            $data["ubah_pass"] = false;
            $this->load->view("home/sidebar");
            $this->load->view("auth/pengaturan", $data);
        }
    }

    public function pengaturan($password = false){
        $data['ubah_pass'] = $password;
        $this->load->view("home/sidebar");
        $this->load->view("auth/pengaturan", $data);
    }
    
    public function loginProcess(){
        if ($this->input->post()){
            $username = $this->input->post("no_hp");
            $password = $this->input->post("password");
            $encrypted_pass = md5($password);
            $query = $this->Auth_model->login($username, $encrypted_pass);
            if ($query->num_rows() > 0){
                $result = $query->result_array()[0];
                $this->session->set_userdata($result);
                redirect("/");
            } else {
                $_SESSION['error_login'] = 'Akun tidak ditemukan';
                redirect("auth/login");
            }
        }
    }

}   