<?php

    class Auth_model extends CI_Model {
        public function register($data){
            return $this->db->insert("user", $data);
        }

        public function login($username, $password){
            $this->db->where("username", $username);
            $this->db->where("password", $password);
            return $this->db->get("user");
        }
    }