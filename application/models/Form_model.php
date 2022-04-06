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

    public function get_details($mhs_id){
        $this->db->where("mhs_id", $mhs_id);
        return $this->db->get("mahasiswa");
    }

    public function get_id($email){
        $this->db->where("email", $email);
        return $this->db->get("mahasiswa");
    }

    public function count_mahasiswa(){
        return $this->db->get('mahasiswa')->num_rows();
    }

    public function get_mahasiswa($number, $offset){
        $this->db->select('mahasiswa.mhs_id, mahasiswa.pas_foto, mahasiswa.ktp, mahasiswa.kartu_keluarga, mahasiswa.ijazah, mahasiswa.mhs_nama, mahasiswa.bukti_pembayaran, mahasiswa.nomor_seleksi, mahasiswa.mhs_nama, mahasiswa.no_hp, mahasiswa.nama_sekolah, prodi.nama, mahasiswa.is_reguler, mahasiswa.approved');
        $this->db->join("prodi", "prodi.id = mahasiswa.id_prodi");
        return $this->db->get("mahasiswa", $number, $offset);
    }

    public function get_pekerjaan($id) {
        $this->db->select("name");
        $this->db->where("id", $id);
        return $this->db->get("pekerjaan");
    }

    public function get_penghasilan($id) {
        $this->db->select("name");
        $this->db->where("id", $id);
        return $this->db->get("penghasilan");
    }

    public function get_prodi($id_prodi){
        $this->db->where("id", $id_prodi);
        return $this->db->get("prodi");
    }

    public function get_lokasi($table, $field, $id){
        $this->db->select("nama");
        $this->db->where($field, $id);
        return $this->db->get($table)->row_array()['nama'];
    }

    public function update($field, $value, $id){
        $this->db->where("mhs_id", $id);
        $this->db->update("mahasiswa", array($field => $value));
        $this->db->affected_rows();
    }

    public function update_all($id, $data) {
        $this->db->where("mhs_id", $id);
        $this->db->update("mahasiswa", $data);
        return $this->db->affected_rows();
    }

    public function get_img($id){
        $this->db->select("bukti_pembayaran");
        $this->db->where("mhs_id", $id);
        return $this->db->get("mahasiswa")->row_array();
    }


}