<?php

class Form_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    function showprovinsi()
    {        
        return $this->db->get('tprovinsi')->result();
    }


    function getprovinsi()
    {
        return $this->db->get('tprovinsi')->result();
    }

    function get_kabupaten($id)
    {
        $query = $this->db->get_where('tkabupaten', array('id_prov' => $id));
		return $query;
    }

    function get_kecamatan($id)
    {
        $query = $this->db->get_where('tkecamatan', array('id_kab' => $id));
		return $query;
    }

    function get_kelurahan($id)
    {
        $query = $this->db->get_where('tkelurahan', array('id_kec' => $id));
		return $query;
    }

    public function get_pendidikan($id = 0){
        if ($id == 0) {
            $query = $this->db->get("pendidikan");
        } else {
            $query = $this->db->get_where('pendidikan', array('id' => $id));
        }
        return $query->result();
    }

    public function insert_data($data){
        $this->db->insert('mahasiswa', $data);
        return $this->db->insert_id();
    }

    public function get_details($email){
        $this->db->where("email", $email);
        return $this->db->get("mahasiswa");
    }

}