<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Profil extends CI_Controller
{
    function __construct(){
        parent::__construct();
        

        //date_default_timezone_set('Asia/Jakarta');

        //if(!isset($this->session->userdata['username'])) {
		//	$this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
		//	redirect('Auth');
		//}
        //
        //if(!$this->login->hakaksesmodul(1)){
		//	redirect('Dashboard');
        //}
    }

    

}