<?php

    class Auth_model extends CI_Model {
        public function __construct(){
            parent::__construct();
        }

        public function register($data){
            return $this->db->insert("user", $data);
        }

        public function login($no_hp, $password){
            $this->db->where("no_hp", $no_hp);
            $this->db->where("password", $password);
            return $this->db->get("user");
        }


        public function getUsername(){
            
        }

        public function check_field($curr, $no_hp, $field) {
            $this->db->select($field);
            $this->db->where("no_hp", $no_hp);
            $val = $this->db->get("user");
            if ($field == 'password') {
                return md5($curr) == $val; 
            } else {
                return $cur == $val;
            }

        }
    }