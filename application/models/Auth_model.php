<?php

    class Auth_model extends CI_Model {
        public function __construct(){
            parent::__construct();
        }

        public function register($data){
            return $this->db->insert("user", $data);
        }

        public function login($username, $password){
            $this->db->where("username", $username);
            $this->db->where("password", $password);
            return $this->db->get("user");
        }

        public function getUsername(){
            
        }
    }