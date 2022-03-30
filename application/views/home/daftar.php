<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css')?>">

  <script src="<?= base_url('assets/bootstrap/js/jquery.min.js')?>"></script>
</head>
<body>
<div class="notif">
        <div class="content">
            <p><?= (isset($update_status) && $update_status) ? 'Data berhasil diperbarui.': 'Data gagal diperbarui. Pastikan anda terkoneksi dengan internet.'?></p>
        </div>
    </div>
<div class="tab-daftar">
      <div class="container tab">
        <button class="tab-links data_diri active" onClick="openTab(event, 'data_diri')">Data Diri</button>
        <button class="tab-links latar_belakang" onClick="openTab(event, 'latar_belakang')"> Latar Belakang Pendidikan</button>
        <button class="tab-links data_ortu" onClick="openTab(event, 'data_ortu')"> Data Orang Tua / Wali</button>
        <button class="tab-links data_pendukung" onClick="openTab(event, 'data_pendukung')"> Data Pendukung Lainnya</button>
        <button class="tab-links prodi" onClick="openTab(event, 'prodi')"> Pilihan Program Studi</button>
        </div>

    <?= form_open(base_url(($is_edit) ? 'form/validateForm/update' : 'form/validateForm'), array("method" => "post", "onsubmit" => "return validateForm()"))?>
      <div class="container">
      <div id="data_diri" class="tab-content active">
            <h3>Informasi Data Diri</h3>
            <table class="mobile-table">
            <tr>
                    <td><label>Nama Lengkap</label></td>
            </tr>
            <tr>
            <td colspan="3" ><input class="form-control" name="mhs_nama" type="text" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_nama']?>"></td>
            </tr>
            <tr>
                    <td><label>NIK (Nomor KTP)</label></td>
                </tr>
            <tr>
            <td colspan="3" ><input class="form-control" name="mhs_nik" type="text" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_nik']?>"></td>
            </tr>
                <tr>
                    <td><label>Tempat Lahir</label></td>
                </tr>
                <tr>
                <td><input class="form-control" name="mhs_tempat_lahir" type="text" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_tempat_lahir']?>"></td>
                </tr>
                <tr>
                <td><label for="">Tgl, Bln, Thn Lahir</label></td>
                </tr>
                <tr>
                <td><input class="form-control" name="mhs_tgl_lahir" type="date" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_tgl_lahir']?>"></td>
                </tr>
                <tr>
                    <td><label>Jenis Kelamin</label></td>
                </tr>
                <tr>
                <td colspan="3"><input type="radio" id="laki-laki" name="mhs_jk_1" value="l" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['mhs_jk'] == 'l') ? 'checked' : ''?>><label for="laki-laki">Laki-laki</label></td>
                </tr>
                <tr>
                <td><input type="radio" id="perempuan" name="mhs_jk_1" value="p" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['mhs_jk'] == 'p') ? 'checked' : ''?>><label for="perempuan">Perempuan</label></td>
                </tr>
                <tr><td><div class="spacer"></div></td></tr>
                <tr>
                    <td><label for="">Alamat (Kampung / Jalan)</label></td>
                </tr>
                <tr>
                <td colspan="4"><textarea class="form-control form-textarea" name="mhs_alamat" id="" cols="30" rows="5"><?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_alamat']?></textarea></td>
                </tr>
                <tr>
                <td><label for="">Provinsi</label></td>
                </tr>
                <tr>
                <td>
                        <select class="form-control select2" name="provinsi" id="provinsi" >
					        <option value="">-- Pilih --</option>
					        <?php foreach($provinsi as $row):?>
					            <option value="<?php echo $row->id_prov;?>" value="<?= (!empty($detail_pendaftaran) && $row->id_prov == $detail_pendaftaran['provinsi']) ?  'selected'  : '' ?>"><?php echo $row->nama;?></option>
					        <?php endforeach;?>
					    </select>
                    </td>
                </tr>
                <tr>
                <td><label for="">Kabupaten/Kota</label></td>
                </tr>
                <tr>
                <td>
                    <select class="form-control select2" id="kabupaten" name="kab_kota" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                </tr>
                <tr>
                <td><label for="">Kecamatan</label></td>
                </tr>
                <tr>
                <td>
                    <select class="form-control select2" id="kecamatan" name="kec" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                </tr>
                <tr>
                <td><label for="">Desa/Kelurahan</label></td>
                </tr>
                <tr>
                <td>
                    <select class="form-control select2" id="kelurahan" name="kel" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                </tr>
                <tr>
                <td><label for="">RT / RW</label></td>
                </tr>
                <tr>
                <td><input class="form-control" type="text" name="mhs_rt_rw" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['mhs_rt_rw']?>"></td>
                </tr>
                <tr>
                <td><label for="">Kode POS</label></td>
                </tr>
                <tr>
                <td><input class="form-control" type="number" name="kode_pos" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['kode_pos']?>"> </td>
                </tr>

                <tr>
                    <td><label for="">No. HP / WhatsApp</label></td>
                </tr>
                <tr>
                <td colspan="3"><input class="form-control <?= (form_error('no_hp')) ? 'error': ''?>" type="text" name="no_hp" value="<?= (empty($detail_pendaftaran)) ? $this->session->userdata('no_hp') : $detail_pendaftaran['no_hp']?>"></td>
                </tr>
                <tr>
                <?php if (form_error("no_hp")) {?>
                </tr>
                <tr>
                    <td></td>
                <td class="error-text" id="no_hp_error"><?= form_error("no_hp")?></td>
                </tr>
                <?php }?>
                <tr>
                    <td><label for="">Alamat E-Mail</label></td>
                </tr>
                <tr>
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
                <a data-target="latar_belakang" class="btn btn-next">Selanjutnya</a>

            </div>
        </div>
        <div id="latar_belakang" class="tab-content">
         <h3>Latar Belakang Pendidikan</h3>
         <table class="mobile-table">
         <tr>
            <td><label for="">Pendidikan Terakhir</label></td>
             </tr>
             <tr>
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



             </tr>
             <tr>
             <td>
                    <input type="text" class="form-control" name="nama_sekolah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['nama_sekolah']?>">
                 </td>
             </tr>
             <tr>
             <td>
                    <label for="">NISN</label>
                 </td>
             </tr>
             <tr>
             <td>
                    <input type="number" class="form-control" name="nisn" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['nisn']?>">
                 </td>
             </tr>
             <tr>
             <td>
                 <label for="">Nomor Seri Ijazah</label>
             </td>

            </tr>
            <tr>
            <td>
                 <input class="form-control <?= (form_error('nomor_ijazah')) ? 'error': ''?>" type="text" name="nomor_ijazah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['nomor_ijazah']?>">
             </td>
            </tr>
            <?php if (form_error('nomor_ijazah')) {?>
             <tr>
                 <td></td>
             <td class="error-text" id="ijazah_error"><?= form_error("nomor_ijazah")?></td>
             </tr>
             <?php }?>
             <tr>
             <td>
                 <label for="">Tahun Ijazah</label>
             </td>
             </tr>
             <tr>
             <td>
                <input type="number" class="form-control" name="tahun_ijazah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['tahun_ijazah']?>">
             </td>
             </tr>
         </table>
         <div class="button-navigation">
                <a data-target="data_diri" class="btn btn-previous">Sebelumnya</a>
                <?php if ($is_edit) {?>
                    <input type="submit" class="btn btn-perbarui" value="Perbarui">
                <?php }?>
                <a data-target="data_ortu" class="btn btn-next">Selanjutnya</a>
            </div>
        </div>
        <div id="data_ortu" class="tab-content">
          <h3>Data Orang Tua / Wali</h3>
          <table class="mobile-table">
                  <tr>
                      <td>
                          <label for="">Nama Ayah Kandung</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <input type="text" class="form-control" name="nama_ayah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['nama_ayah']?>">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Tgl Lahir</label>
                      </td>
                  </tr>
                  <tr>
                  <td colspan="3">
                        <input type="date" class="form-control" name="tgl_lahir_ayah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['tgl_lahir_ayah']?>">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Pendidikan Terakhir</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                      <select class="form-control select2" name="pendidikan_ayah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['pendidikan_ayah']?>">
                         <option value="">-- Pilih --</option>
                         <?php foreach($pendidikan as $row):?>
                            <option value="<?= $row->id?>" <?= (!empty($detail_pendaftaran) && $row->id == $detail_pendaftaran['pendidikan_ayah']) ? 'selected' : '' ?>><?= $row->singkatan?></option>
                         <?php endforeach?>
                     </select>
                      </td>
                  </tr>
                  <tr>
                  <td>
                        <label for="">Pekerjaan</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                        <input type="text" class="form-control" name="pekerjaan_ayah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['pekerjaan_ayah']?>">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Penghasilan - Rp</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                        <input type="number" class="form-control" name="penghasilan_ayah" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['penghasilan_ayah']?>">
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label for="">Nama Ibu Kandung</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <input type="text" class="form-control" name="nama_ibu" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['nama_ibu']?>">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Tgl Lahir</label>
                      </td>
                  </tr>
                  <tr>
                  <td colspan="3">
                        <input type="date" class="form-control" name="tgl_lahir_ibu" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['tgl_lahir_ibu']?>">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Pendidikan Terakhir</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                      <select class="form-control select2" name="pendidikan_ibu" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['pendidikan_ibu']?>">
                         <option value="">-- Pilih --</option>
                         <?php foreach($pendidikan as $row):?>
                            <option value="<?= $row->id?>" <?= (!empty($detail_pendaftaran) && $row->id == $detail_pendaftaran['pendidikan_ibu']) ? 'selected' : '' ?>><?= $row->singkatan?></option>
                         <?php endforeach?>
                     </select>
                      </td>
                  </tr>
                  <tr>
                  <td>
                        <label for="">Pekerjaan</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                        <input type="text" class="form-control" name="pekerjaan_ibu" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['pekerjaan_ibu']?>">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Penghasilan - Rp</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                        <input type="number" class="form-control" name="penghasilan_ibu" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['penghasilan_ibu']?>">
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label for="">Alamat Orang Tua (Kampung / Jalan)</label>

                  </tr>
                  <tr>
                  </td>
                      <td colspan="5">
                        <textarea class="form-control form-textarea" name="alamat_orangtua" cols="30" rows="5" ><?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['alamat_orangtua']?></textarea>
                      </td>
                  </tr>
                  <tr>
                <td><label for="">Provinsi</label></td>


                </tr>
                <tr>
                <td colspan="2">
                        <select class="form-control select2" name="provinsi_orangtua" id="provinsi_orangtua" >
					        <option value="">-- Pilih --</option>
					        <?php foreach($provinsi as $row):?>
					            <option value="<?php echo $row->id_prov;?>" <?= (!empty($detail_pendaftaran) && $row->id_prov == $detail_pendaftaran['provinsi_orangtua']) ? 'selected' : '' ?>><?php echo $row->nama;?></option>
					        <?php endforeach;?>
					    </select>
                    </td>
                </tr>
                <tr>
                <td><label for="">Kabupaten/Kota</label></td>

                </tr>
                <tr>
                <td colspan="2">
                    <select class="form-control select2" id="kabupaten_orangtua" name="kota_orangtua" >
									<option value="">-- Pilih --</option>
                </select>
                    </td>
                </tr>
                <tr>
                <td><label for="">Kecamatan</label></td>
                </tr>
                <tr>
                <td colspan="2">
                    <select class="form-control select2" id="kecamatan_orangtua" name="kec_orangtua" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                </tr>
                <tr>
                <td><label for="">Desa/Kelurahan</label></td>

                </tr>
                <tr>
                <td colspan="2">
                    <select class="form-control select2" id="kelurahan_orangtua" name="kel_orangtua" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                </tr>
                <tr>
                      <td>
                          <label for="">RT / RW</label>
                  </tr>
                  <tr>
                  <td colspan="2">
                        <input type="text" class="form-control" name="rt_rw_orangtua" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['rt_rw_orangtua']?>">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Kode POS</label>
                      </td>
                  </tr>
                  <tr>
                  <td colspan="2">
                        <input type="number" class="form-control" name="kode_pos_orangtua" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['kode_pos_orangtua']?>">
                      </td>
                  </tr>
          </table>

              <div class="button-navigation">
                <a data-target="latar_belakang" class="btn  btn-previous">Sebelumnya</a>
                <?php if ($is_edit) {?>
                    <input type="submit" class="btn btn-perbarui" value="Perbarui">
                <?php }?>
                <a data-target="data_pendukung" class="btn  btn-next">Selanjutnya</a>

            </div>
        </div>
        <div id="data_pendukung" class="tab-content">
          <h3>Data Pendukung Lainnya</h3>
          <table class="mobile-table">
          <tr>
                  <td><label for="">Status Perkawinan</label></td>
            </tr>
            <tr>
                <td><input type="radio" id="belum_kawin" name="status_mhs_1" value="Belum Kawin" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['status_mhs'] == 'Belum Kawin') ? 'checked' : ''?>><label for="belum_kawin">Belum Kawin</label></td>
            </tr>
            <tr>
            <td><input type="radio" id="kawin" name="status_mhs_1" value="Kawin" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['status_mhs'] == 'Kawin') ? 'checked' : ''?>><label for="kawin">Kawin</label></td>
            </tr>
            <tr>
            <td><input type="radio" id="cerai_hidup" name="status_mhs_1" value="Cerai Hidup" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['status_mhs'] == 'Cerai Hidup') ? 'checked' : ''?>><label for="cerai_hidup">Cerai Hidup</label></td>
            </tr>
            <tr>
            <td><input type="radio" id="cerai_mati" name="status_mhs_1" value="Cerai Mati" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['status_mhs'] == 'Cerai Mati') ? 'checked' : ''?>><label for="cerai_mati">Cerai Mati</label></td>
            </tr>
            <tr><td><div class="spacer"></div></td></tr>
            <tr>
                  <td>
                      <label for="">Pekerjaan</label>
                  </td>
              </tr>
              <tr>
              <td>
                      <input type="text" class="form-control" name="pekerjaan_mhs" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['pekerjaan_mhs']?>">
                  </td>
              </tr>
              <tr>

              <td>
                      <label for="">Penghasilan - Rp</label>
                  </td>
              </tr>
              <tr>
              <td>
                      <input type="number" class="form-control" name="penghasilan" value="<?= (empty($detail_pendaftaran)) ? "" : $detail_pendaftaran['penghasilan']?>">
                  </td>
              </tr>
              <tr>
                  <td>
                  <label for="">Jenis Tinggal</label>
                  </td>
              </tr>
              <tr>
                  <td>
                  <input class="form-radio-input" type="radio" id="orangtua" name="id_tinggal_1" value="1" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '1') ? 'checked' : ''?>>
                     <label for="orangtua">Bersama Orang Tua</label>
                  </td>
              </tr>
              <tr>
                  <td>
                  <input type="radio" id="wali" name="id_tinggal_1" value="2" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '2') ? 'checked' : ''?>>
                     <label for="wali">Wali</label>
                  </td>
              </tr>
              <tr>
                  <td>
                  <input type="radio" id="kos" name="id_tinggal_1" value="3" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '3') ? 'checked' : ''?>>
                     <label for="kos">Kos</label>
                  </td>
              </tr>
              <tr>
                  <td>
                  <input type="radio" id="asrama" name="id_tinggal_1" value="4" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '4') ? 'checked' : ''?>>
                     <label for="asrama">Asrama</label>
                  </td>
              </tr>
              <tr>
                  <td>
                  <input type="radio" id="pesantren" name="id_tinggal_1" value="5" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '5') ? 'checked' : ''?>>
                     <label for="pesantren">Pesantren</label>
                  </td>
              </tr>
              <tr>
                  <td>
                  <input type="radio" id="lainnya" name="id_tinggal_1" value="6" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_tinggal'] == '6') ? 'checked' : ''?>>
                     <label for="lainnya">Lainnya</label>
                  </td>
              </tr>
              <tr><td><div class="spacer"></div></td></tr>
              <tr>
                  <td>
                      <label for="">Nama Pesantren (opsional)</label>
                  </td>

              </tr>
              <tr>
              <td>
                      <input type="text" class="form-control" name="nama_pesantren" value="<?= (!empty($detail_pendaftaran) && array_key_exists('nama_pesantren', $detail_pendaftaran)) ? $detail_pendaftaran['nama_pesantren'] : ''?>">
                  </td>
              </tr>
              <tr>
                  <td>
                      <label for="">Alat Transportasi</label>
                  </td>
              </tr>
              <tr>
               <td>
               <input type="radio" id="angkutan_umum" name="id_transportasi_1" value="1" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '1') ? 'checked' : ''?>>
                     <label for="angkutan_umum">Angkutan Umum</label>
               </td>
              </tr>
              <tr>
                  <td>
                  <input type="radio" id="ojek" name="id_transportasi_1" value="2" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '2') ? 'checked' : ''?>>
                     <label for="ojek">Ojek</label>
                  </td>
              </tr>
              <tr>
                  <td>
                  <input type="radio" id="sepeda" name="id_transportasi_1" value="3" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '3') ? 'checked' : ''?>>
                     <label for="angkutan_umum">Sepeda</label>
                  </td>
              </tr>
              <tr>
                  <td>
                  <input type="radio" id="mobil_pribadi" name="id_transportasi_1" value="4" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '4') ? 'checked' : ''?>>
                     <label for="mobil_pribadi">Mobil Pribadi</label>
                  </td>
              </tr>
              <tr>
                  <td>
                  <input type="radio" id="sepeda_motor" name="id_transportasi_1" value="5" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '5') ? 'checked' : ''?>>
                     <label for="sepeda_motor">Sepeda Motor</label>
                  </td>
              </tr>
              <tr>
                  <td>
                  <input type="radio" id="lainnya" name="id_transportasi_1" value="6" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['id_transportasi'] == '6') ? 'checked' : ''?>>
                     <label for="lainnya">Lainnya</label>
                  </td>
              </tr>
          </table>
          <div class="button-navigation">
                <a data-target="data_ortu" class="btn  btn-previous">Sebelumnya</a>
                <?php if ($is_edit) {?>
                    <input type="submit" class="btn btn-perbarui" value="Perbarui">
                <?php }?>
                <a data-target="prodi" class="btn  btn-next">Selanjutnya</a>
            </div>
        </div>
        <div id="prodi" class="tab-content">
          <h4>Pilihan Program Studi</h4>
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
              <table class="form-table">
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
                <textarea name="keterangan_tahu" id="tahu-textarea" style="<?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '5') ? 'display: block' : 'display: none'?>" class="form-control form-textarea" cols="50" rows="8"><?= (!empty($detail_pendaftaran) && array_key_exists('keterangan_tahu', $detail_pendaftaran)) ? $detail_pendaftaran['keterangan_tahu'] : ''?></textarea>

          </div>
          <div class="button-navigation">
          <?php if (!$is_edit) { ?>
            <input type="submit" class="btn">
          <?php } else {?>
            <a data-target="data_pendukung" class="btn  btn-previous" >Sebelumnya</a>
            <input type="submit" class="btn btn-perbarui" value="Perbarui">
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

          function openTab(event, tab){
              var tab_content, tab_links;

              tab_content = document.querySelectorAll(".tab-content");
              console.log(tab_content);
              tab_content.forEach((content) => {
                  console.log(content);
                  content.style.display = "none";
              });

              tab_links = document.querySelectorAll(".tab-links");
              tab_links.forEach((links) => {
                  links.classList.remove("active");
              });
              
              document.getElementById(tab).style.display = "block";
              if (event) {
              event.currentTarget.classList.add("active");

              }
              

          }
      
      
          const inputStyle = document.querySelectorAll("input")[0].style;
          $(document).ready(function () {

            <?php if (isset($update_status)) {?> 
                if (!$update_status){
                    $('.notif').css({"background-color", "rgb(206, 103, 103)", "border", "rgb(169, 85, 85)"});
                }
                $('.notif').show();
                var count = 1
                var interval = setInterval(() => {
                    console.log(count);
                    if (count === 2 || $('.notif').is(':hidden')) {
                        clearInterval(interval);
                        $('.notif').hide();
                        count = 1;
                    } else {
                        count++;
                    }
                }, 3000);
            <?php }?>
            
            $('.notif').click(() => {
                $('.notif').hide();
            });

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
              $(".btn-next, .btn-previous").click(function(){
                  const targetName = this.dataset.target;
                  const target = document.getElementsByClassName(targetName)[0];
                  console.log("A");
                  console.log(target);
                  openTab(false, targetName);
                  target.classList.add("active");
                  console.log("B");
                  console.log(target);
              });
      });
    </script>
</body>
</html>