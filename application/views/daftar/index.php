<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css')?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="<?= base_url('assets/images/logo_stainu.png')?>" alt="">
            <h3>Formulir Pendaftaran Mahasiswa Baru 2022/2023</h3>
        </div>
        <div class="links">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Logout</a></li>
            </ul>
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
    <form action="" method="post" onsubmit="return validateForm()">
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Informasi Data Diri</h3>
            <table class="form-table" border="0">
                <tr>
                    <td><label>Nama Lengkap</label></td>
                    <td colspan="3" ><input class="form-control" class="form-control" name="nama" type="text"></td>
                </tr>
                <tr>
                    <td><label>Tempat Lahir</label></td>
                    <td><input class="form-control" name="tempat_lahir" type="text"></td>
                    <td><label for="">Tgl, Bln, Thn Lahir</label></td>
                    <td><input class="form-control" name="tanggal_lahir"type="date"></td>
                </tr>
                <tr>
                    <td><label>Jenis Kelamin</label></td>
                    <td colspan="3"><input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki"><label for="laki-laki">Laki-laki</label><input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan"><label for="perempuan">Perempuan</label></td>
                </tr>
                <tr>
                    <td><label for="">Alamat (Kampung / Jalan)</label></td>
                    <td colspan="4"><textarea class="form-control" name="alamat" id="" cols="30" rows="5"></textarea></td>
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
                    <select class="form-control select2" id="kabupaten" name="kabupaten" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>



                </tr>
                <tr>
                <td><label for="">Kecamatan</label></td>
                    <td>
                    <select class="form-control select2" id="kecamatan" name="kecamatan" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                <td><label for="">Desa/Kelurahan</label></td>
                    <td>
                    <select class="form-control select2" id="kelurahan" name="kelurahan" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                    
                </tr>
                <tr>
                <td><label for="">RT / RW</label></td>
                    <td><input class="form-control" type="text" name="rt_rw"></td>
                    <td><label for="">Kode POS</label></td>
                    <td><input class="form-control" type="text" name="kode_pos"></td>
                </tr>
                <tr>
                    <td><label for="">No. HP / WhatsApp</label></td>
                    <td colspan="3"><input class="form-control" type="text" name="nomor_hp" value="<?= $username?>"></td>
                </tr>
                <tr>
                    <td><label for="">Alamat E-Mail</label></td>
                    <td colspan="3"><input class="form-control" type="text" name="email"></td>
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
                     <input type="radio" id="sma" name="pendidikan_terakhir" value="SMA">
                     <label for="sma">SMA</label>
                     <input type="radio" id="smk" name="pendidikan_terakhir" value="SMK">
                     <label for="smk">SMK</label>
                     <input type="radio" id="ma" name="pendidikan_terakhir" value="MA">
                     <label for="ma">MA</label>
                     <input type="radio" id="paket_c" name="pendidikan_terakhir" value="Paket C">
                     <label for="paket_c">Paket C</label>
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
                    <input type="text" class="form-control" name="nama_sekolah">
                 </td>
             </tr>
             <td>
                 <label for="">Nomor Seri Ijazah</label>
             </td>
             <td>
                 <input type="text" class="form-control" name="nomor_ijazah">
             </td>
             <td>
                 <label for="">Tahun Ijazah</label>
             </td>
             <td>
                <input type="text" class="form-control" name="tahun_ijazah">
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
                        <input type="date" class="form-control" name="tanggal_lahir_ayah">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Pendidikan Terakhir</label>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="pendidikan_terakhir_ayah">
                      </td>
                  <td>
                        <label for="">Pekerjaan</label>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="pekerjaan_ayah" >
                      </td>
                      <td>
                          <label for="">Penghasilan</label>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="penghasilan_ayah">
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
                        <input type="date" class="form-control" name="tanggal_lahir_ibu">
                      </td>
                  </tr>
                  <tr>
                  <td>
                          <label for="">Pendidikan Terakhir</label>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="pendidikan_terakhir_ibu">
                      </td>
                  <td>
                        <label for="">Pekerjaan</label>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="pekerjaan_ibu">
                      </td>
                      <td>
                          <label for="">Penghasilan</label>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="penghasilan_ibu">
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
                    <select class="form-control select2" id="kabupaten_orangtua" name="kabupaten_orangtua" >
									<option value="">-- Pilih --</option>
                </select>
                    </td>
                </tr>
                <tr>
                <td><label for="">Kecamatan</label></td>
                    <td colspan="2">
                    <select class="form-control select2" id="kecamatan_orangtua" name="kecamatan_orangtua" >
									<option value="">-- Pilih --</option>
								</select>
                    </td>
                <td><label for="">Desa/Kelurahan</label></td>
                    <td colspan="2">
                    <select class="form-control select2" id="kelurahan_orangtua" name="kelurahan_orangtua" >
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
                        <input type="text" class="form-control" name="kode_pos_orangtua">
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
                     <input type="radio" id="belum_kawin" name="status_perkawinan" value="Belum Kawin">
                     <label for="belum_kawin">Belum Kawin</label>
                     <input type="radio" id="kawin" name="status_perkawinan" value="Kawin">
                     <label for="kawin">Kawin</label>
                     <input type="radio" id="cerai_hidup" name="status_perkawinan" value="Cerai Hidup">
                     <label for="cerai_hidup">Cerai Hidup</label>
                     <input type="radio" id="cerai_mati" name="status_perkawinan" value="Cerai Mati">
                     <label for="cerai_mati">Cerai Mati</label>
                    </td>
            </tr>
              <tr>
                  <td>
                      <label for="">Pekerjaan</label>
                  </td>
                  <td>
                      <input type="text" class="form-control" name="pekerjaan">
                  </td>
                  <td>
                      <label for="">Penghasilan</label>
                  </td>
                  <td>
                      <input type="text" class="form-control" name="penghasilann">
                  </td>
              </tr>
                  
              <tr>
                  <td>
                  <label for="">Jenis Tinggal</label>
                  </td>
                  <td>
                     <input class="form-radio-input" type="radio" id="orangtua" name="jenis_tinggal" value="Orang Tua">
                     <label for="orangtua">Bersama Oranng Tua</label>
                     <input type="radio" id="wali" name="jenis_tinggal" value="Wali">
                     <label for="wali">Wali</label>
                     <input type="radio" id="kos" name="jenis_tinggal" value="Kos">
                     <label for="kos">Kos</label>
                     <input type="radio" id="asrama" name="jenis_tinggal" value="Asrama">
                     <label for="asrama">Asrama</label>
                     <input type="radio" id="pesantren" name="jenis_tinggal" value="Pesantren">
                     <label for="pesantren">Pesantren</label>
                     <input type="radio" id="lainnya" name="jenis_tinggal" value="lainnya">
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
                     <input type="radio" id="angkutan_umum" name="transportasi" value="Angkutan Umum">
                     <label for="angkutan_umum">Angkutan Umum</label>
                     <input type="radio" id="ojek" name="transportasi" value="Ojek">
                     <label for="ojek">Ojek</label>
                     <input type="radio" id="sepeda" name="transportasi" value="Sepeda">
                     <label for="angkutan_umum">Sepeda</label>
                     <input type="radio" id="mobil_pribadi" name="transportasi" value="Mobil Pribadi">
                     <label for="mobil_pribadi">Mobil Pribadi</label>
                     <input type="radio" id="sepeda_motor" name="transportasi" value="Sepeda Motor">
                     <label for="sepeda_motor">Sepeda Motor</label>
                     <input type="radio" id="lainnya" name="transportasi" value="Lainnya">
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
        
                    <input type="radio" id="manajemen_pendidikan_islam" name="program_studi" value="Manajemen Pendidikan Islam">
                    <label for="manajemen_pendidikan_islam">Manajemen Pendidikan Islam (S1)</label>
                </td>
            </tr>
            <tr>
            <td>
                <input type="radio" id="komunikasi_penyiaran_islam" name="program_studi" value="Komunikasi Penyiaran Islam">
                    <label for="komunikasi_penyiaran_islam">Komunikasi Penyiaran Islam (S1)</label>
                </td>
            </tr>
            <tr>
            <td>
                <input type="radio" id="hukum_keluarga_islam" name="program_studi" value="Hukum Keluarga Islam">
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
              <textarea name="tahu_stainu" id="tahu-textarea" cols="50" rows="8"></textarea>
              <table>
                          <tr>
                      <td>
                      <input type="checkbox" name="sosial_media" value="Sosial Media" id="sosial_media">
                        <label for="sosial_media">Sosial Media</label>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <input type="checkbox" name="dosen" value="Dosen" id="dosen">
                          <label for="dosen">Dosen</label>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <input type="checkbox" name="alumni" value="Alumni" id="alumni">
                          <label for="alumni">Alumni</label>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <input type="checkbox" name="via_nu" value="Via NU" id="via_nu">
                          <label for="via_nu">Via NU</label>
                      </td>
                  </tr>
                  <tr>
                  <td>
                      <input type="checkbox" name="lainnya" value="Lainnya" id="checkbox_lainnya">
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

<script>

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

    function validateCheckbox(){
        const inputs = document.querySelectorAll("input[type=checkbox]");
        var formValid = false;
        inputs.forEach((input) => {
            if (input.checked){
                formValid = true;
            }
        });
        return formValid;
    }

    function validateSelect(){
        const selects = Array.from(document.getElementsByTagName("select"));
        var valid = true;
        selects.forEach((select) => {
            if (select.value === "-- Pilih --"){
                valid = false;
                select.style.border = "1px solid red";
            }
            
        });
        return valid;
    }

    function validateInput(){   
        const inputs = Array.from(document.getElementsByTagName("input[type=text]"));
        var valid = true;
        inputs.forEach((input) => {
            if (input.value === "" && input.name !== "nama_pesantren"){
                valid = false
                console.log(input.style.border);
                input.style.border = "1px solid red";
                console.log(input.style.border);
            }
        });
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
            console.log(input.style.display);
            if (input.name === "tahu_stainu" && lainnya.checked){
                if (trimField(input.value) == ""){
                    valid = false;
                }
            } else if (input.name === "tahu_stainu" && !lainnya.checked){
            } else {
                if (trimField(input.value) == ""){
                    valid = false;
                }
            }

        });
        return valid;
    }

    function validateForm(){
        const inputs = validateInput();
        const selects = validateSelect();
        const checkboxes = validateCheckbox();
        const radios = validateRadio();
        const textareas = validateTextarea();
        if (!inputs || !selects || !checkboxes || !radios || !textareas){
            alert("Pastikan semua field sudah diisi !");
            return false;
        }
    }

    const inputStyle = document.querySelectorAll("input")[0].style;
	$(document).ready(function () {

$('input').change(function () {
    if (this.style.border === '1px solid red'){
        this.style = inputStyle;
    }
    
});
$('textarea').change(function () {
    if (this.style.border === '1px solid red'){
        this.style = inputStyle;
    }
});
$('select').change(function () {
    if (this.style.border === '1px solid red'){
        this.style = inputStyle;
    }
});
$('input[type=radio]').change(function () {
    if (this.style.border === '1px solid red'){
        this.style = inputStyle;
    }
});

$('#provinsi').change(function () {
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
        }
    });
    return false;
});
$("#checkbox_lainnya").click(function() {
            const textarea = document.getElementById("tahu-textarea");
            if (this.checked === true){
                textarea.style.display = "inline-block";
            } else {
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