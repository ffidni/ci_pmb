<?php

    class Auth_model extends CI_Model {
        public function __construct(){
            parent::__construct();
        }

        public function register($data){
            $this->db->insert("user", $data);
            return $this->db->insert_id();
        }

        public function login($no_hp, $password){
            $this->db->where("no_hp", $no_hp);
            $this->db->where("password", $password);
            return $this->db->get("user");
        }

        public function get_id($field, $value){
            $this->db->select('id');
            $this->db->where($field, $value);
            $val = $this->db->get("user")->row_array();
            if ($val == null) {
                return false;
            }
            return $val['id'];
        }


        public function check_field($curr, $id, $field) {
            $this->db->select($field);
            $this->db->where("id", $id);
            $val = $this->db->get("user")->row_array();
            if ($val == null) {
                return false;
            }
            if ($field == 'password') {
                return md5($curr) == $val['password']; 
            } else {
                return $curr == $val['no_hp'];
            }
        }

        public function updatePassword($new){
            $this->db->where("id", $_SESSION['id']);
            $this->db->update("user", array("password" => $new));
            return $this->db->affected_rows();
        }

        public function updateDetails($no_hp, $email) {
            $this->db->where("id", $_SESSION['id']);
            $this->db->update("user", array("no_hp" => $no_hp, "email" => $email));
            return $this->db->affected_rows();
        }

        public function update($field, $value, $id){
            $this->db->where("id", $id);
            $this->db->update("user", array($field => $value));
        }

        public function get_data(){
            return $this->db->get("user");
        }
    }