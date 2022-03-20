<?php

class Profil_model extends CI_Model{

    function showpekerjaan()
    {
        $this->db->select('*');
        $this->db->from('tpekerjaan');
        return $this->db->get()->result();
    }


    

    function update_profil()
    {
        //cari key
        $userid       = $this->session->userdata['user_id'];

        //parse dari form input
        $tempat_lahir   =  $this->input->post('tempat_lahir');
        $tanggal_lahir  =  $this->input->post('tanggal_lahir');
        $jenis_kelamin  =  $this->input->post('jenis_kelamin');
        $asal_negara    =  $this->input->post('asal_negara');
        $asaljenjang    =  $this->input->post('asal_jenjang_pendidikan');
        $alamat         =  $this->input->post('alamat');
        $provinsi       =  $this->input->post('provinsi');
        $kabupaten      =  $this->input->post('kabupaten');

        //parse dari form input sec 2
        $rpenghasilan       = $this->input->post('rerata_penghasilan');
        $pekerjaan_ayah     = $this->input->post('pekerjaan_ayah');
        $pendidikan_ayah    = $this->input->post('pendidikan_ayah');
        $pekerjaan_ibu      = $this->input->post('pekerjaan_ibu');
        $pendidikan_ibu     = $this->input->post('pendidikan_ibu');
        
        //parse dari form input sec 3
        $no_handphone       = $this->input->post('no_handphone');
        $kepemilikan        = $this->input->post('kepemilikan');
        $no_rekening        = $this->input->post('no_rekening');
        $nama_rekening      = $this->input->post('nama_rekening');
        $nama_bank          = $this->input->post('nama_bank');
        
        $data = array(
            //section 1
            'tempat_lahir'     => $tempat_lahir,
            'tanggal_lahir'    => $tanggal_lahir,
            'jenis_kelamin'    => $jenis_kelamin,
            'asal_negara'      => $asal_negara,
            'asal_jenjang_pendidikan'      => $asaljenjang,
            'alamat'           => $alamat,
            'kota'             => $kabupaten,
            'provinsi'         => $provinsi,

            //section 2
            'rata_rata_penghasilan_orangtua' => $rpenghasilan,
            'pekerjaan_ayah'   => $pekerjaan_ayah,
            'pendidikan_ayah'  => $pendidikan_ayah,
            'pekerjaan_ibu'    => $pekerjaan_ibu,
            'pendidikan_ibu'   => $pendidikan_ibu,
            
            //section 3
            'no_handphone'     => $no_handphone,
            'kepemilikan'      => $kepemilikan,
            'no_rekening'      => $no_rekening,
            'nama_rekening'    => $nama_rekening,
            'nama_bank'        => $nama_bank
        );
 
        $this->db->where('fk_user_id', $userid)->update('tdata_mahasiswa', $data);
        if($this->db->affected_rows() > 0){
             return true;
        }else{
             return false;
        }
    }

    function updateprofildata($namafoto)
    {
        $userid       = $this->session->userdata['user_id'];

        $cekdata  = $this->db->get_where('tdata_mahasiswa', array('fk_user_id' =>  $userid))->result();
        $mhsid    = $cekdata[0]->pk_mahasiswa_id;

        $data = array( 'foto' => $namafoto );

        $this->db->update('tdata_mahasiswa', $data, array('pk_mahasiswa_id' => $mhsid));
    }

    function cek_tahunajaran($thnajaran)
    {
        $this->db->select('*');
        $this->db->from('ttahunajaran_kurikulum');
        $this->db->join('ttahun_ajaran', 'ttahun_ajaran.pk_tahunajaran_id = ttahunajaran_kurikulum.fk_tahun_ajaran_id');
        $this->db->join('tkurikulum', 'tkurikulum.pk_kurikulum_id = ttahunajaran_kurikulum.fk_kurikulum_id');
        $this->db->where('ttahunajaran_kurikulum.pk_tahunajarankurikulum_id', $thnajaran);
        return $this->db->get()->result();
    }

    function cek_jurusan($jurusan)
    {
        return $this->db->get_where('tjurusan', array('pk_jurusan_id'=>$jurusan))->result();
    }
    
    function cek_kelas($kelas)
    {
        return $this->db->get_where('tkelas', array('pk_kelas_id'=>$kelas))->result();
    }

    function update_info_pribadi($data, $where)
    {
        $hasil = $this->db->update('tdata_mahasiswa', $data, $where);
       
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function getpendidikan()
    {
        $this->db->order_by('pk_pendidikan_id', 'asc');
        return $this->db->get('tpendidikan')->result();
    }

    function getpekerjaan()
    {
        $this->db->order_by('pk_pekerjaan_id', 'asc');
        return $this->db->get('tpekerjaan')->result();
    }

    function update_info_orangtua_wali($data, $where)
    {
        $hasil = $this->db->update('tdata_mahasiswa', $data, $where);
       
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function update_info_alamat($data, $where)
    {
        $hasil = $this->db->update('tdata_mahasiswa', $data, $where);
       
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }


}

