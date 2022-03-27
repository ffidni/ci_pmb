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
<div class="notif">
        <div class="content">
            <p>Detail pendaftaran berhasil dirubah.</p>
        </div>
    </div>
<div class="container tab-daftar">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#home" id="target0">Data Diri</a></li>
        <li><a href="#menu1" id="target1">Latar Belakang Pendidikan</a></li>
        <li><a href="#menu2" id="target2">Data Orang Tua / Wali</a></li>
        <li><a href="#menu3" id="target3">Data Pendukung Lainnya</a></li>
        <li><a href="#menu4" id="target4">Pilihan Program Studi</a></li>
      </ul>

    <?= form_open(base_url(($is_edit) ? 'form/validateForm/update' : 'form/validateForm'), array("method" => "post", "onsubmit" => "return validateForm()"))?>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Informasi Data Diri</h3>
            <table class="form-table" border="0">
                <tr>
                    <td><label>Nama Lengkap</label></td>
                    <td colspan="3" ><input class="form-control" class="form-control" name="mhs_nama" type="text" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_nama']?>"></td>
                </tr>
                <tr>
                    <td><label>NIK (Nomor KTP)</label></td>
                    <td colspan="3" ><input class="form-control" class="form-control" name="mhs_nik" type="text" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_nik']?>"></td>
                </tr>
                <tr>
                    <td><label>Tempat Lahir</label></td>
                    <td><input class="form-control" name="mhs_tempat_lahir" type="text" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_tempat_lahir']?>"></td>
                    <td><label for="">Tgl, Bln, Thn Lahir</label></td>
                    <td><input class="form-control" name="mhs_tgl_lahir" type="date" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_tgl_lahir']?>"></td>
                </tr>
                <tr>
                    <td><label>Jenis Kelamin</label></td>
                    <td colspan="3"><input type="radio" id="laki-laki" name="mhs_jk" value="l" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['mhs_jk'] == 'l') ? 'checked' : ''?>><label for="laki-laki">Laki-laki</label><input type="radio" id="perempuan" name="mhs_jk" value="p" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['mhs_jk'] == 'p') ? 'checked' : ''?>><label for="perempuan">Perempuan</label></td>
                </tr>
                <tr>
                    <td><label for="">Alamat (Kampung / Jalan)</label></td>
                    <td colspan="4"><textarea class="form-control" name="mhs_alamat" id="" cols="30" rows="5"><?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_alamat']?></textarea></td>
                </tr>
                <tr>
                <td><label for="">Provinsi</label></td>
                    <td>
                        <select class="form-control select2" name="provinsi" id="provinsi" >
					        <option value="">-- Pilih --</option>
					        <?php foreach($provinsi as $row):?>
					            <option value="<?php echo $row->id_prov;?>" value="<?= (!empty($detail_pendaftaran) && $row->id_prov == $detail_pendaftaran['provinsi']) ?  'selected'  : '' ?>"><?php echo $row->nama;?></option>
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
                    <td><input class="form-control" type="text" name="mhs_rt_rw" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_rt_rw']?>"></td>
                    <td><label for="">Kode POS</label></td>
                    <td><input class="form-control" type="number" name="kode_pos" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['kode_pos']?>"> </td>
                </tr>
                <tr>
                    <td><label for="">No. HP / WhatsApp</label></td>
                    <td colspan="3"><input class="form-control <?= (form_error('no_hp')) ? 'error': ''?>" type="text" name="no_hp" value="<?= (empty($detail_pendaftaran)) ? $this->session->userdata('username') : $detail_pendaftaran['no_hp']?>"></td>
                </tr>
                <?php if (form_error("no_hp")) {?>
                <tr>
                    <td></td>
                <td class="error-text" id="no_hp_error"><?= form_error("no_hp")?></td>
                </tr>
                <?php }?>
                <tr>
                    <td><label for="">Alamat E-Mail</label></td>
                    <td colspan="3"><input class="form-control <?= (form_error('email')) ? 'error': ''?>" type="text" name="email" value="<?= (empty($detail_pendaftaran)) ? $this->session->userdata('email') : $detail_pendaftaran['email']?>"></td>
                </tr>
                <?php if (form_error("email")) {?>
                <tr>
                    <td></td>
                <td class="error-text" id="email_error"><?= form_error("email")?></td>
                </tr>
                <?php }?>
            </table>
            <div class="button-navigation">
            <?php if ($is_edit) {?>
                    <input type="submit" class="btn btn-perbarui" value="Perbarui">
                <?php }?>
                <a data-target="target1" class="btn  btn-next" href="#menu1">Selanjutnya</a>

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
                                <option value="<?= $row->id?>" <?= (!empty($detail_pendaftaran) && $row->id == $detail_pendaftaran['pendidikan_id']) ? 'selected' : '' ?>><?= $row->singkatan?></option>
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
                    <input type="text" class="form-control" name="nama_sekolah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['nama_sekolah']?>">
                 </td>
                 <td>
                    <label for="">NISN</label>
                 </td>
                 <td>
                    <input type="number" class="form-control" name="nisn" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['nisn']?>">
                 </td>
             </tr>
             <td>
                 <label for="">Nomor Seri Ijazah</label>
             </td>
             <td>
                 <input class="form-control <?= (form_error('nomor_ijazah')) ? 'error': ''?>" type="text" name="nomor_ijazah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['nomor_ijazah']?>">
             </td>
             <?php if (form_error('nomor_ijazah')) {?>
             <tr>
                 <td></td>
             <td class="error-text" id="ijazah_error"><?= form_error("nomor_ijazah")?></td>
             </tr>
             <?php }?>
             <td>
                 <label for="">Tahun Ijazah</label>
             </td>
             <td>
                <input type="number" class="form-control" name="tahun_ijazah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['tahun_ijazah']?>">
             </td>
         </table>
         <div class="button-navigation">
                <a data-target="target0" class="btn btn-previous" href="#home">Sebelumnya</a>
                <?php if ($is_edit) {?>
                    <input type="submit" class="btn btn-perbarui" value="Perbarui">
                <?php }?>
                <a data-target="target2" class="btn btn-next" href="#menu2">Selanjutnya</a>
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
                          <input type="text" class="form-control" name="nama_ayah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['nama_ayah']?>">
                      </td>
                      <td>
                          <label for="">Tgl Lahir</label>
                      </td>
                      <td colspan="3">
                        <input type="date" class="form-control" name="tgl_lahir_ayah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['tgl_lahir_ayah']?>">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Pendidikan Terakhir</label>
                      </td>
                      <td>
                      <select class="form-control select2" name="pendidikan_ayah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['pendidikan_ayah']?>">
                         <option value="">-- Pilih --</option>
                         <?php foreach($pendidikan as $row):?>
                            <option value="<?= $row->id?>" <?= (!empty($detail_pendaftaran) && $row->id == $detail_pendaftaran['pendidikan_ayah']) ? 'selected' : '' ?>><?= $row->singkatan?></option>
                         <?php endforeach?>
                     </select>
                      </td>
                  <td>
                        <label for="">Pekerjaan</label>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="pekerjaan_ayah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['pekerjaan_ayah']?>">
                      </td>
                      <td>
                          <label for="">Penghasilan - Rp</label>
                      </td>
                      <td>
                        <input type="number" class="form-control" name="penghasilan_ayah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['penghasilan_ayah']?>">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Nama Ibu Kandung</label>
                      </td>
                      <td>
                          <input type="text" class="form-control" name="nama_ibu" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['nama_ibu']?>">
                      </td>
                      <td>
                          <label for="">Tgl Lahir</label>
                      </td>
                      <td>
                        <input type="date" class="form-control" name="tgl_lahir_ibu" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['tgl_lahir_ibu']?>">
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
                            <option value="<?= $row->id?>" <?= (!empty($detail_pendaftaran) && $row->id == $detail_pendaftaran['pendidikan_ibu']) ? 'selected' : '' ?>><?= $row->singkatan?></option>
                         <?php endforeach?>
                     </select>
                      </td>
                  <td>
                        <label for="">Pekerjaan</label>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="pekerjaan_ibu" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['pekerjaan_ibu']?>">
                      </td>
                      <td>
                          <label for="">Penghasilan - Rp</label>
                      </td>
                      <td>
                        <input type="number" class="form-control" name="penghasilan_ibu" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['penghasilan_ibu']?>">
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label for="">Alamat Orang Tua (Kampung / Jalan)</label>
                      </td>
                      <td colspan="5">
                        <textarea class="form-control" name="alamat_orangtua" cols="30" rows="5" ><?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['alamat_orangtua']?></textarea>
                      </td>
                  </tr>
                  <tr>
                <td><label for="">Provinsi</label></td>
                    <td colspan="2">
                        <select class="form-control select2" name="provinsi_orangtua" id="provinsi_orangtua" >
					        <option value="">-- Pilih --</option>
					        <?php foreach($provinsi as $row):?>
					            <option value="<?php echo $row->id_prov;?>" <?= (!empty($detail_pendaftaran) && $row->id_prov == $detail_pendaftaran['provinsi_orangtua']) ? 'selected' : '' ?>><?php echo $row->nama;?></option>
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
                        <input type="text" class="form-control" name="rt_rw_orangtua" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['rt_rw_orangtua']?>">
                      </td>
                      <td>
                          <label for="">Kode POS</label>
                      </td>
                      <td colspan="2">
                        <input type="number" class="form-control" name="kode_pos_orangtua" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['kode_pos_orangtua']?>">
                      </td>
                  </tr>
              </table>
              <div class="button-navigation">
                <a data-target="target1" class="btn  btn-previous" href="#menu1">Sebelumnya</a>
                <?php if ($is_edit) {?>
                    <input type="submit" class="btn btn-perbarui" value="Perbarui">
                <?php }?>
                <a data-target="target3" class="btn  btn-next" href="#menu3">Selanjutnya</a>

            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
          <h3>Data Pendukung Lainnya</h3>
          <table class="form-table">
              <tr>
                  <td><label for="">Status Perkawinan</label></td>
                  <td>
                     <input type="radio" id="belum_kawin" name="status_mhs" value="Belum Kawin" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['status_mhs'] == 'Belum Kawin') ? 'checked' : ''?>>
                     <label for="belum_kawin">Belum Kawin</label>
                     <input type="radio" id="kawin" name="status_mhs" value="Kawin" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['status_mhs'] == 'Kawin') ? 'checked' : ''?>>
                     <label for="kawin">Kawin</label>
                     <input type="radio" id="cerai_hidup" name="status_mhs" value="Cerai Hidup" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['status_mhs'] == 'Cerai Hidup') ? 'checked' : ''?>>
                     <label for="cerai_hidup">Cerai Hidup</label>
                     <input type="radio" id="cerai_mati" name="status_mhs" value="Cerai Mati" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['status_mhs'] == 'Cerai Mati') ? 'checked' : ''?>>
                     <label for="cerai_mati">Cerai Mati</label>
                    </td>
            </tr>
              <tr>
                  <td>
                      <label for="">Pekerjaan</label>
                  </td>
                  <td>
                      <input type="text" class="form-control" name="pekerjaan_mhs" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['pekerjaan_mhs']?>">
                  </td>
                  <td>
                      <label for="">Penghasilan - Rp</label>
                  </td>
                  <td>
                      <input type="number" class="form-control" name="penghasilan" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['penghasilan']?>">
                  </td>
              </tr>
                  
              <tr>
                  <td>
                  <label for="">Jenis Tinggal</label>
                  </td>
                  <td>
                     <input class="form-radio-input" type="radio" id="orangtua" name="id_tinggal" value="1" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '1') ? 'checked' : ''?>>
                     <label for="orangtua">Bersama Orang Tua</label>
                     <input type="radio" id="wali" name="id_tinggal" value="2" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '2') ? 'checked' : ''?>>
                     <label for="wali">Wali</label>
                     <input type="radio" id="kos" name="id_tinggal" value="3" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '3') ? 'checked' : ''?>>
                     <label for="kos">Kos</label>
                     <input type="radio" id="asrama" name="id_tinggal" value="4" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '4') ? 'checked' : ''?>>
                     <label for="asrama">Asrama</label>
                     <input type="radio" id="pesantren" name="id_tinggal" value="5" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '5') ? 'checked' : ''?>>
                     <label for="pesantren">Pesantren</label>
                     <input type="radio" id="lainnya" name="id_tinggal" value="6" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '6') ? 'checked' : ''?>>
                     <label for="lainnya">Lainnya</label>
                </td>
              </tr>
              <tr>
                  <td>
                      <label for="">Nama Pesantren (opsional)</label>
                  </td>
                  <td>
                      <input type="text" class="form-control" name="nama_pesantren" value="<?= (!empty($detail_pendaftaran) && array_key_exists('nama_pesantren', $detail_pendaftaran)) ? $detail_pendaftaran['nama_pesantren'] : ''?>">
                  </td>
              </tr>
              <tr>
                  <td>
                      <label for="">Alat Transportasi</label>
                  </td>
                  <td>
                     <input type="radio" id="angkutan_umum" name="id_transportasi" value="1" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '1') ? 'checked' : ''?>>
                     <label for="angkutan_umum">Angkutan Umum</label>
                     <input type="radio" id="ojek" name="id_transportasi" value="2" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '2') ? 'checked' : ''?>>
                     <label for="ojek">Ojek</label>
                     <input type="radio" id="sepeda" name="id_transportasi" value="3" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '3') ? 'checked' : ''?>>
                     <label for="angkutan_umum">Sepeda</label>
                     <input type="radio" id="mobil_pribadi" name="id_transportasi" value="4" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '4') ? 'checked' : ''?>>
                     <label for="mobil_pribadi">Mobil Pribadi</label>
                     <input type="radio" id="sepeda_motor" name="id_transportasi" value="5" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '5') ? 'checked' : ''?>>
                     <label for="sepeda_motor">Sepeda Motor</label>
                     <input type="radio" id="lainnya" name="id_transportasi" value="6" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '6') ? 'checked' : ''?>>
                     <label for="lainnya">Lainnya</label>
                  </td>
              </tr>
          </table>
          <div class="button-navigation">
                <a data-target="target2" class="btn  btn-previous" href="#menu2">Sebelumnya</a>
                <?php if ($is_edit) {?>
                    <input type="submit" class="btn btn-perbarui" value="Perbarui">
                <?php }?>
                <a data-target="target4" class="btn  btn-next" href="#menu4">Selanjutnya</a>
            </div>
        </div>
        <div id="menu4" class="tab-pane fade">
          <h3>Pilihan Program Studi</h3>
          <table class="form-table">
              <tr>
                  <td>
        
                    <input type="radio" id="manajemen_pendidikan_islam" name="id_prodi" value="1" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_prodi'] == '1') ? 'checked' : ''?>>
                    <label for="manajemen_pendidikan_islam">Manajemen Pendidikan Islam (S1)</label>
                </td>
            </tr>
            <tr>
            <td>
                <input type="radio" id="komunikasi_penyiaran_islam" name="id_prodi" value="2" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_prodi'] == '2') ? 'checked' : ''?>>
                    <label for="komunikasi_penyiaran_islam">Komunikasi Penyiaran Islam (S1)</label>
                </td>
            </tr>
            <tr>
            <td>
                <input type="radio" id="hukum_keluarga_islam" name="id_prodi" value="3" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_prodi'] == '3') ? 'checked' : ''?>>
                    <label for="hukum_keluarga_islam">Hukum Keluarga Islam (S1)</label>
                </td>
            </tr>          
            <tr>
            <td>
                <input type="radio" id="reguler" name="is_reguler" value="Reguler" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['is_reguler'] == 'Reguler') ? 'checked' : ''?>>
                <label for="reguler">Kelar Reguler</label>
                </td>
                <td>
                <input type="radio" id="nonreguler" name="is_reguler" value="Non Reguler" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['is_reguler'] == 'Non Reguler') ? 'checked' : ''?>>
                <label for="nonreguler">Kelar Non Reguler</label>
                </td>
            </tr>          
          </table>
          <div class="tahu-stainu">
              <h4>Tahu STAINU dari mana ?</h4>
              <textarea name="keterangan_tahu" id="tahu-textarea" cols="50" rows="8"><?= (!empty($detail_pendaftaran) && array_key_exists('tahu_stainu', $detail_pendaftaran)) ? $detail_pendaftaran['tahu_stainu'] : ''?></textarea>
              <table>
                          <tr>
                      <td>
                      <input type="radio" name="tahu_stainu" value="1" id="sosial_media" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '1') ? 'checked' : ''?>>
                        <label for="sosial_media">Sosial Media</label>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <input type="radio" name="tahu_stainu" value="2" id="dosen" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '2') ? 'checked' : ''?>>
                          <label for="dosen">Dosen</label>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <input type="radio" name="tahu_stainu" value="3" id="alumni" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '3') ? 'checked' : ''?>>
                          <label for="alumni">Alumni</label>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <input type="radio" name="tahu_stainu" value="4" id="via_nu" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '4') ? 'checked' : ''?>>
                          <label for="via_nu">Via NU</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                      <input type="radio" name="tahu_stainu" value="5" id="checkbox_lainnya" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '5') ? 'checked' : ''?>>
                          <label for="lainnya">Lainnya</label>
                      </td>
                  </tr>
                          </table>
          </div>
          <div class="button-navigation">
          <?php if (!$is_edit) { ?>
            <input type="submit" class="btn">
          <?php } else {?>
            <a data-target="target3" class="btn  btn-previous" href="#menu3">Sebelumnya</a>
            <<input type="submit" class="btn btn-perbarui" value="Perbarui">
            <?php }?> 
          </div>

        </div>
      </div>
    </form>
    </div>

    <script>
    
    var invalidChars = [
        "-",
        "+",
        "e",
      ];
      
          function validateRadio(){
              const inputs = document.querySelectorAll("input[type=radio]");
              var formValid = false;
              var count = 0;
              inputs.forEach((input) => {
                  if (input.checked){
                      formValid = true;
                      count++;
                  }
              });
              if (count === 0){
                  inputs.forEach((input) => {
                      input.style.border = "1px solid red";
                  });
              }
              return formValid;
              
          }
      
          function validateSelect(){
              const selects = Array.from(document.getElementsByTagName("select"));
              var valid = true;
              console.log(selects);
              selects.forEach((select) => {
                  console.log(select.value);
                  if (select.value === ""){
                      valid = false;
                      select.classList.add("error");
                  }
                  
              });
              return valid;
          }
      
          function validateInput(type){   
              const inputs = document.querySelectorAll(`input[type=${type}]`);
              var valid = true;
              console.log("HALO")
              console.log(inputs);
              
              inputs.forEach((input) => {
                  console.log(input.value === "" && input.name !== "nama_pesantren");
                  if (input.value === "" && input.name !== "nama_pesantren"){
                      valid = false
                      input.classList.add("error");
                      console.log(input.classList);
                  }
                  //if (input.type === "number" && input.value )
              });
              console.log(valid);
              return valid;
          }
      
          function trimField(str) { 
              return str.replace(/^\s+|\s+$/g,''); 
          }
      
          function validateTextarea(){
              const inputs = document.querySelectorAll("textarea");
              const lainnya = document.querySelector("#checkbox_lainnya");
              var valid = true;
              inputs.forEach((input) => {
                  if (input.name === "keterangan_tahu" && lainnya.checked){
                      if (trimField(input.value) == ""){
                          valid = false;
                          input.classList.add("error");
                      }
                  } else if (input.name === "keterangan_tahu" && !lainnya.checked){
                  } else {
                      if (trimField(input.value) == ""){
                          valid = false;
                          input.classList.add("error");
      
                      }
                  }
      
              });
              return valid;
          }
      
          function validateForm(){
              const inputs = validateInput("text");
              const inputNumbers = validateInput("number");
              const inputDates = validateInput("date");
              const selects = validateSelect();
              const radios = validateRadio();
              const textareas = validateTextarea();;
              if (!inputs || !inputNumbers || !inputDates || !selects || !radios || !textareas){
                  alert("Pastikan semua field sudah diisi !");
                  return false;
              }
          }
      
      
          const inputStyle = document.querySelectorAll("input")[0].style;
          $(document).ready(function () {

            <?php if ($update_status) {?> 
                $('.notif').show();
            <?php }?>

            $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

      

      $('input[type=number]').keydown(function (e) {
          if (invalidChars.includes(e.key)) {
              e.preventDefault();
          }
          
      });
      
      $('input[type=number]').on("input", function (e) {
          this.value = this.value.replace(/[e\+\-]/gi, "");
      });
      
      
      $('input').keydown(function () {
          if (this.classList.contains("error")){
              this.classList.remove("error");
          }
          if (this.name === 'nomor_ijazah') {
              $('#ijazah_error').hide();
          } else if (this.name === 'no_hp'){
              $('#no_hp_error').hide();
          } else if (this.name === 'email'){
              $('#email_error').hide();
          }
          
      });

      $('.btn-perbarui').click(() => {
          
      });
      
      $('input').change(function () {
          if (this.classList.contains("error")){
              this.classList.remove("error");
          }

          if (this.name === 'nomor_ijazah') {
              $('#ijazah_error').hide();
          } else if (this.name === 'no_hp'){
              $('#no_hp_error').hide();
          } else if (this.name === 'email'){
              $('#email_error').hide();
          }
          
      });
      $('textarea').keydown(function () {
          if (this.classList.contains("error")){
              this.classList.remove("error");
          }
      });
      $('select').change(function () {
          if (this.classList.contains("error")){
              this.classList.remove("error");
          }
      });
      $('input[type=radio]').change(function () {
          const radios = Array.from(document.getElementsByName(this.name));
          radios.forEach((radio) => {
              if (radio.style.border === "1px solid red"){
                  radio.style.border = "1px solid lightgrey";
          }
          });
      
      });
      
      $('input[type=checkbox]').change(() => {
          const inputs = document.querySelectorAll("input[type=checkbox]");
          inputs.forEach((input) => {
              if (input.classList.contains("error")){
              input.classList.remove("error");
              }
          });
      });
      
      $('#provinsi').change(function () {
          console.log("AHALOW");
          var id = $(this).val();
          $.ajax({
              url: "<?php echo site_url('Form/get_kabupaten');?>",
              method: "POST",
              data: {
                  id: id
              },
              async: true,
              dataType: 'json',
              success: function (data) {
                  var html = '';
                  console.log(data);
                  if (data.length === 0){
                      html = "<option>-- Pilih --</option>";
                      $('#kecamatan').html(html);
                      $('#kelurahan').html(html);
                  } else {
                      var i;
                  for (i = 0; i < data.length; i++) {
                      html += '<option value=' + data[i].id_kab + '>' + data[i].nama +
                          '</option>';
                  }
                  }
                  $('#kabupaten').html(html);
                  $('#kabupaten').trigger("change");
              }
          });
          return false;
      });
      
      $('#kabupaten').change(function () {
          var id = $(this).val();
          $.ajax({
              url: "<?php echo site_url('Form/get_kecamatan');?>",
              method: "POST",
              data: {
                  id: id
              },
              async: true,
              dataType: 'json',
              success: function (data) {
                  var html = '';
                  if (data.length === 0){
                      html = "<option>-- Pilih --</option>";
                      $('#kelurahan').html(html);
                  } else {
                      var i;
                  for (i = 0; i < data.length; i++) {
                      html += '<option value=' + data[i].id_kec + '>' + data[i].nama +
                          '</option>';
                  }
                  }
      
                  $('#kecamatan').html(html);
                  $('#kecamatan').trigger("change");
              }
          });
          return false;
      });
      
      $('#kecamatan').change(function () {
          var id = $(this).val();
          $.ajax({
              url: "<?php echo site_url('Form/get_kelurahan');?>",
              method: "POST",
              data: {
                  id: id
              },
              async: true,
              dataType: 'json',
              success: function (data) {
                  var html = '';
                  if (data.length === 0){
                      html = "<option>-- Pilih --</option>";
                  } else {
                      var i;
                  for (i = 0; i < data.length; i++) {
                      html += '<option value=' + data[i].id_kel + '>' + data[i].nama +
                          '</option>';
                  }
                  }
                  $('#kelurahan').html(html);
                  $('#kelurahan').trigger("change");
              }
          });
          return false;
      });
      $('#provinsi_orangtua').change(function () {
          var id = $(this).val();
          $.ajax({
              url: "<?php echo site_url('Form/get_kabupaten');?>",
              method: "POST",
              data: {
                  id: id
              },
              async: true,
              dataType: 'json',
              success: function (data) {
                  var html = '';
                  console.log(data);
                  if (data.length === 0){
                      html = "<option>-- Pilih --</option>";
                      $('#kecamatan_orangtua').html(html);
                      $('#kelurahan_orangtua').html(html);
                  } else {
                      var i;
                  for (i = 0; i < data.length; i++) {
                      html += '<option value=' + data[i].id_kab + '>' + data[i].nama +
                          '</option>';
                  }
                  }
                  $('#kabupaten_orangtua').html(html);
                  $('#kabupaten_orangtua').trigger("change");
              }
          });
          return false;
      });
      
      $('#kabupaten_orangtua').change(function () {
          var id = $(this).val();
          $.ajax({
              url: "<?php echo site_url('Form/get_kecamatan');?>",
              method: "POST",
              data: {
                  id: id
              },
              async: true,
              dataType: 'json',
              success: function (data) {
                  var html = '';
                  if (data.length === 0){
                      html = "<option>-- Pilih --</option>";
                      $('#kelurahan_orangtua').html(html);
                  } else {
                      var i;
                  for (i = 0; i < data.length; i++) {
                      html += '<option value=' + data[i].id_kec + '>' + data[i].nama +
                          '</option>';
                  }
                  }
      
                  $('#kecamatan_orangtua').html(html);
                  $('#kecamatan_orangtua').trigger("change");
              }
          });
          return false;
      });
      
      $('#kecamatan_orangtua').change(function () {
          var id = $(this).val();
          $.ajax({
              url: "<?php echo site_url('Form/get_kelurahan');?>",
              method: "POST",
              data: {
                  id: id
              },
              async: true,
              dataType: 'json',
              success: function (data) {
                  var html = '';
                  if (data.length === 0){
                      html = "<option>-- Pilih --</option>";
                  } else {
                      var i;
                  for (i = 0; i < data.length; i++) {
                      html += '<option value=' + data[i].id_kel + '>' + data[i].nama +
                          '</option>';
                  }
                  }
                  $('#kelurahan_orangtua').html(html);
                  $('#kelurahan_orangtua').trigger("change");
      
              }
          });
          return false;
      });

      <?php if (!empty($detail_pendaftaran)) {?>
                $('#provinsi').val(<?= $detail_pendaftaran['provinsi']?>).change();
                $('#kabupaten').val(<?= $detail_pendaftaran['kab_kota']?>).change();
                $('#kecamatan').val(<?= $detail_pendaftaran['kec']?>).change();
                $('#kelurahan').val(<?= $detail_pendaftaran['kel']?>).change();
                $('#provinsi_orangtua').val(<?= $detail_pendaftaran['provinsi_orangtua']?>).change();
                $('#kabupaten_orangtua').val(<?= $detail_pendaftaran['kota_orangtua']?>).change();
                $('#kecamatan_orangtua').val(<?= $detail_pendaftaran['kec_orangtua']?>).change();
                $('#kelurahan_orangtua').val(<?= $detail_pendaftaran['kel_orangtua']?>).change();

        <?php }?>

      $("#checkbox_lainnya").change(function() {
                  const textarea = document.getElementById("tahu-textarea");
                  console.log(this.checked);
                  if (this.checked === true){
                      textarea.style.display = "inline-block";
                  } else {
                      textarea.style.display = "none";
                  }
                  
              });
      $("#sosial_media,#dosen,#via_nu,#alumni").change(() => {
          const textarea = document.getElementById("tahu-textarea");
          if (textarea.style.display !== "none") {
              textarea.style.display = "none";
          }
      });
              $(".nav-tabs a").click(function(){
                  $(this).tab('show');
              });
              $(".btn-next").click(function(){
                  const targetName = this.dataset.target;
                  const target = document.getElementById(targetName);
                  console.log(`${targetName}, ${target}`);
                  $(target).tab('show');
              });
              $(".btn-previous").click(function(){
                  const targetName = this.dataset.target;
                  const target = document.getElementById(targetName);
                  console.log(`${targetName}, ${target}`);
                  $(target).tab('show');
              });
              $('.nav-tabs a').on('shown.bs.tab', function(event){
                  console.log(event)
                  var x = $(event.target).text();         
                  var y = $(event.relatedTarget).text();  
                  $(".act span").text(x);
                  $(".prev span").text(y);
                  console.log($(".prev span").text(y));
              })
      });
    </script>
</body>
</html>