<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css')?>">

  <script src="<?= base_url('assets/bootstrap/js/jquery.min.js')?>"></script>
  <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
</head>
<body>
<div class="container tab-daftar">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#home" id="target0">Data Diri</a></li>
        <li><a href="#menu1" id="target1">Latar Belakang Pendidikan</a></li>
        <li><a href="#menu2" id="target2">Data Orang Tua / Wali</a></li>
        <li><a href="#menu3" id="target3">Data Pendukung Lainnya</a></li>
        <li><a href="#menu4" id="target4">Pilihan Program Studi</a></li>
      </ul>
    <form action="<?= base_url('form/daftarProcess')?>" method="post" onsubmit="return validateForm()">
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Informasi Data Diri</h3>
            <table class="form-table" border="0">
                <tr>
                    <td><label>Nama Lengkap</label></td>
                    <td colspan="3" ><input class="form-control" class="form-control" name="mhs_nama" type="text"></td>
                </tr>
                <tr>
                    <td><label>NIK (Nomor KTP)</label></td>
                    <td colspan="3" ><input class="form-control" class="form-control" name="mhs_nik" type="text"></td>
                </tr>
                <tr>
                    <td><label>Tempat Lahir</label></td>
                    <td><input class="form-control" name="mhs_tempat_lahir" type="text"></td>
                    <td><label for="">Tgl, Bln, Thn Lahir</label></td>
                    <td><input class="form-control" name="mhs_tgl_lahir"type="date"></td>
                </tr>
                <tr>
                    <td><label>Jenis Kelamin</label></td>
                    <td colspan="3"><input type="radio" id="laki-laki" name="mhs_jk" value="l"><label for="laki-laki">Laki-laki</label><input type="radio" id="perempuan" name="mhs_jk" value="p"><label for="perempuan">Perempuan</label></td>
                </tr>
                <tr>
                    <td><label for="">Alamat (Kampung / Jalan)</label></td>
                    <td colspan="4"><textarea class="form-control" name="mhs_alamat" id="" cols="30" rows="5"></textarea></td>
                </tr>
                <tr>
                <td><label for="">Provinsi</label></td>
                    <td>
                        <select class="form-control select2" name="provinsi" id="provinsi" >
					        <option value="">-- Pilih --</option>
					        <?php foreach($provinsi as $row):?>
					            <option value="<?php echo $row->id_prov;?>"><?php echo $row->nama;?></option>
					        <?php endforeach;?>
					    </select>
                    </td>
                    <td><label for="">Kabupaten/Kota</label></td>
                    <td>
                    <select class="form-control select2" id="kabupaten" name="kab_kota" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>



                </tr>
                <tr>
                <td><label for="">Kecamatan</label></td>
                    <td>
                    <select class="form-control select2" id="kecamatan" name="kec" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                <td><label for="">Desa/Kelurahan</label></td>
                    <td>
                    <select class="form-control select2" id="kelurahan" name="kel" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                    
                </tr>
                <tr>
                <td><label for="">RT / RW</label></td>
                    <td><input class="form-control" type="text" name="mhs_rt_rw"></td>
                    <td><label for="">Kode POS</label></td>
                    <td><input class="form-control" type="number" name="kode_pos" > </td>
                </tr>
                <tr>
                    <td><label for="">No. HP / WhatsApp</label></td>
                    <td colspan="3"><input class="form-control" type="text" name="no_hp" value="<?= $username?>"></td>
                </tr>
                <tr>
                    <td><label for="">Alamat E-Mail</label></td>
                    <td colspan="3"><input class="form-control" type="text" name="email" value="<?= $email?>"></td>
                </tr>
            </table>
            <div class="button-navigation">
                <a data-target="target1" class="btn btn-navigation btn-next" href="#menu1">Selanjutnya</a>
            </div>

            
        </div>
        <div id="menu1" class="tab-pane fade">
         <h3>Latar Belakang Pendidikan</h3>
         <table class="form-table">
             <tr>
                 <td><label for="">Pendidikan Terakhir</label></td>
                 <td>
                     <select class="form-control select2" name="pendidikan_id">
                         <option value="">-- Pilih --</option>
                         <?php foreach($pendidikan as $row):?>
                            <?php if (in_array($row->singkatan, $mhs_pendidikan)):?>
                                <option value="<?= $row->id?>"><?= $row->singkatan?></option>
                                <?php endif?>
                         <?php endforeach?>
                     </select>
                </td>
             </tr>
             <tr>
                 <td>
                     <label for="">Nama Sekolah</label>
                </td>
                 <td>
                    <input type="text" class="form-control" name="nama_sekolah">
                 </td>
                 <td>
                    <label for="">NISN</label>
                 </td>
                 <td>
                    <input type="number" class="form-control" name="nisn">
                 </td>
             </tr>
             <td>
                 <label for="">Nomor Seri Ijazah</label>
             </td>
             <td>
                 <input type="number" class="form-control" name="nomor_ijazah">
             </td>
             <td>
                 <label for="">Tahun Ijazah</label>
             </td>
             <td>
                <input type="number" class="form-control" name="tahun_ijazah">
             </td>
         </table>
         <div class="button-navigation">
                <a data-target="target0" class="btn btn-navigation btn-previous" href="#home">Sebelumnya</a>
                <a data-target="target2" class="btn btn-navigation btn-next" href="#menu2">Selanjutnya</a>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Data Orang Tua / Wali</h3>
              <table class="form-table">
                  <tr>
                      <td>
                          <label for="">Nama Ayah Kandung</label>
                      </td>
                      <td>
                          <input type="text" class="form-control" name="nama_ayah">
                      </td>
                      <td>
                          <label for="">Tgl Lahir</label>
                      </td>
                      <td colspan="3">
                        <input type="date" class="form-control" name="tgl_lahir_ayah">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Pendidikan Terakhir</label>
                      </td>
                      <td>
                      <select class="form-control select2" name="pendidikan_ayah">
                         <option value="">-- Pilih --</option>
                         <?php foreach($pendidikan as $row):?>
                            <option value="<?= $row->id?>"><?= $row->singkatan?></option>
                         <?php endforeach?>
                     </select>
                      </td>
                  <td>
                        <label for="">Pekerjaan</label>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="pekerjaan_ayah" >
                      </td>
                      <td>
                          <label for="">Penghasilan - Rp</label>
                      </td>
                      <td>
                        <input type="number" class="form-control" name="penghasilan_ayah">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Nama Ibu Kandung</label>
                      </td>
                      <td>
                          <input type="text" class="form-control" name="nama_ibu">
                      </td>
                      <td>
                          <label for="">Tgl Lahir</label>
                      </td>
                      <td>
                        <input type="date" class="form-control" name="tgl_lahir_ibu">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Pendidikan Terakhir</label>
                      </td>
                      <td>
                      <select class="form-control select2" name="pendidikan_ibu">
                         <option value="">-- Pilih --</option>
                         <?php foreach($pendidikan as $row):?>
                            <option value="<?= $row->id?>"><?= $row->singkatan?></option>
                         <?php endforeach?>
                     </select>
                      </td>
                  <td>
                        <label for="">Pekerjaan</label>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="pekerjaan_ibu">
                      </td>
                      <td>
                          <label for="">Penghasilan - Rp</label>
                      </td>
                      <td>
                        <input type="number" class="form-control" name="penghasilan_ibu">
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label for="">Alamat Orang Tua (Kampung / Jalan)</label>
                      </td>
                      <td colspan="5">
                        <textarea class="form-control" name="alamat_orangtua" cols="30" rows="5"></textarea>
                      </td>
                  </tr>
                  <tr>
                <td><label for="">Provinsi</label></td>
                    <td colspan="2">
                        <select class="form-control select2" name="provinsi_orangtua" id="provinsi_orangtua" >
					        <option value="">-- Pilih --</option>
					        <?php foreach($provinsi as $row):?>
					            <option value="<?php echo $row->id_prov;?>"><?php echo $row->nama;?></option>
					        <?php endforeach;?>
					    </select>
                    </td>
                    <td><label for="">Kabupaten/Kota</label></td>
                    <td colspan="2">
                    <select class="form-control select2" id="kabupaten_orangtua" name="kota_orangtua" >
									<option value="">-- Pilih --</option>
                </select>
                    </td>
                </tr>
                <tr>
                <td><label for="">Kecamatan</label></td>
                    <td colspan="2">
                    <select class="form-control select2" id="kecamatan_orangtua" name="kec_orangtua" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                <td><label for="">Desa/Kelurahan</label></td>
                    <td colspan="2">
                    <select class="form-control select2" id="kelurahan_orangtua" name="kel_orangtua" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                    
                </tr>
                  <tr>
                      <td>
                          <label for="">RT / RW</label>
                      <td colspan="2">
                        <input type="text" class="form-control" name="rt_rw_orangtua">
                      </td>
                      <td>
                          <label for="">Kode POS</label>
                      </td>
                      <td colspan="2">
                        <input type="number" class="form-control" name="kode_pos_orangtua">
                      </td>
                  </tr>
              </table>
              <div class="button-navigation">
                <a data-target="target1" class="btn btn-navigation btn-previous" href="#menu1">Sebelumnya</a>
                <a data-target="target3" class="btn btn-navigation btn-next" href="#menu3">Selanjutnya</a>
            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
          <h3>Data Pendukungn Lainnya</h3>
          <table class="form-table">
              <tr>
                  <td><label for="">Status Perkawinan</label></td>
                  <td>
                     <input type="radio" id="belum_kawin" name="status_mhs" value="Belum Kawin">
                     <label for="belum_kawin">Belum Kawin</label>
                     <input type="radio" id="kawin" name="status_mhs" value="Kawin">
                     <label for="kawin">Kawin</label>
                     <input type="radio" id="cerai_hidup" name="status_mhs" value="Cerai Hidup">
                     <label for="cerai_hidup">Cerai Hidup</label>
                     <input type="radio" id="cerai_mati" name="status_mhs" value="Cerai Mati">
                     <label for="cerai_mati">Cerai Mati</label>
                    </td>
            </tr>
              <tr>
                  <td>
                      <label for="">Pekerjaan</label>
                  </td>
                  <td>
                      <input type="text" class="form-control" name="pekerjaan_mhs">
                  </td>
                  <td>
                      <label for="">Penghasilan - Rp</label>
                  </td>
                  <td>
                      <input type="number" class="form-control" name="penghasilan">
                  </td>
              </tr>
                  
              <tr>
                  <td>
                  <label for="">Jenis Tinggal</label>
                  </td>
                  <td>
                     <input class="form-radio-input" type="radio" id="orangtua" name="id_tinggal" value="1">
                     <label for="orangtua">Bersama Orang Tua</label>
                     <input type="radio" id="wali" name="id_tinggal" value="2">
                     <label for="wali">Wali</label>
                     <input type="radio" id="kos" name="id_tinggal" value="3">
                     <label for="kos">Kos</label>
                     <input type="radio" id="asrama" name="id_tinggal" value="4">
                     <label for="asrama">Asrama</label>
                     <input type="radio" id="pesantren" name="id_tinggal" value="5">
                     <label for="pesantren">Pesantren</label>
                     <input type="radio" id="lainnya" name="id_tinggal" value="6">
                     <label for="lainnya">Lainnya</label>
                </td>
              </tr>
              <tr>
                  <td>
                      <label for="">Nama Pesantren (opsional)</label>
                  </td>
                  <td>
                      <input type="text" class="form-control" name="nama_pesantren">
                  </td>
              </tr>
              <tr>
                  <td>
                      <label for="">Alat Transportasi</label>
                  </td>
                  <td>
                     <input type="radio" id="angkutan_umum" name="id_transportasi" value="Angkutan Umum">
                     <label for="angkutan_umum">Angkutan Umum</label>
                     <input type="radio" id="ojek" name="id_transportasi" value="1">
                     <label for="ojek">Ojek</label>
                     <input type="radio" id="sepeda" name="id_transportasi" value="2">
                     <label for="angkutan_umum">Sepeda</label>
                     <input type="radio" id="mobil_pribadi" name="id_transportasi" value="3">
                     <label for="mobil_pribadi">Mobil Pribadi</label>
                     <input type="radio" id="sepeda_motor" name="id_transportasi" value="4">
                     <label for="sepeda_motor">Sepeda Motor</label>
                     <input type="radio" id="lainnya" name="id_transportasi" value="5">
                     <label for="lainnya">Lainnya</label>
                  </td>
              </tr>
          </table>
          <div class="button-navigation">
                <a data-target="target2" class="btn btn-navigation btn-previous" href="#menu2">Sebelumnya</a>
                <a data-target="target4" class="btn btn-navigation btn-next" href="#menu4">Selanjutnya</a>
            </div>
        </div>
        <div id="menu4" class="tab-pane fade">
          <h3>Pilihan Program Studi</h3>
          <table class="form-table">
              <tr>
                  <td>
        
                    <input type="radio" id="manajemen_pendidikan_islam" name="id_prodi" value="1">
                    <label for="manajemen_pendidikan_islam">Manajemen Pendidikan Islam (S1)</label>
                </td>
            </tr>
            <tr>
            <td>
                <input type="radio" id="komunikasi_penyiaran_islam" name="id_prodi" value="2">
                    <label for="komunikasi_penyiaran_islam">Komunikasi Penyiaran Islam (S1)</label>
                </td>
            </tr>
            <tr>
            <td>
                <input type="radio" id="hukum_keluarga_islam" name="id_prodi" value="3">
                    <label for="hukum_keluarga_islam">Hukum Keluarga Islam (S1)</label>
                </td>
            </tr>          
            <tr>
            <td>
                <input type="radio" id="reguler" name="is_reguler" value="Reguler">
                <label for="reguler">Kelar Reguler</label>
                </td>
                <td>
                <input type="radio" id="nonreguler" name="is_reguler" value="Non Reguler">
                <label for="nonreguler">Kelar Non Reguler</label>
                </td>
            </tr>          
          </table>
          <div class="tahu-stainu">
              <h4>Tahu STAINU dari mana ?</h4>
              <textarea name="keterangan_tahu" id="tahu-textarea" cols="50" rows="8"></textarea>
              <table>
                          <tr>
                      <td>
                      <input type="radio" name="tahu_stainu" value="1" id="sosial_media">
                        <label for="sosial_media">Sosial Media</label>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <input type="radio" name="tahu_stainu" value="2" id="dosen">
                          <label for="dosen">Dosen</label>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <input type="radio" name="tahu_stainu" value="3" id="alumni">
                          <label for="alumni">Alumni</label>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <input type="radio" name="tahu_stainu" value="4" id="via_nu">
                          <label for="via_nu">Via NU</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                      <input type="radio" name="tahu_stainu" value="5" id="checkbox_lainnya">
                          <label for="lainnya">Lainnya</label>
                      </td>
                  </tr>
                          </table>
          </div>
          <input type="submit">
        </div>
      </div>
    </form>
    </div>

    <script src="<?= base_url('assets/homepage/js/daftar.js')?>"></script>
</body>
</html>