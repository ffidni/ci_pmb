<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/print_style.css')?>">

  <script src="<?= base_url('assets/bootstrap/js/jquery.min.js')?>"></script>
</head>
<body>
    <div class="container">
        <h3>STAINU Formulir Pendaftaran Mahasiswa Baru Tahun 2022/2023</h3>
        <div class="container-row">
        <h3>Data Diri Calon Mahasiswa Baru</h3>
        <table>
            <tr>
                <td><label for="">Nama Lengkap</label></td>
                <td><p><?= $detail_pendaftaran['mhs_nama']?></p></td>
                <td><label for="">NIK (Nomor KTP)</label></td>
                <td><p><?= $detail_pendaftaran['mhs_nik']?></p></td>
            </tr>

            <tr>
                <td><label for="">Tempat Lahir</label></td>
                <td><p><?= $detail_pendaftaran['mhs_tempat_lahir']?></p>
                <td><label for="">Tgl, Bln, Thn Lahir</label></td>
                <td><p><?= $detail_pendaftaran['mhs_tgl_lahir']?></p></td>
            </tr>
            <tr>
                <td><label for="">Jenis Kelamin</label></td>
                <td><input type="radio" name="jk" value="l" <?= ($detail_pendaftaran['mhs_jk'] == 'l') ? 'checked': ''?>>Laki-Laki
                <input type="radio" name="jk" value="p" <?= ($detail_pendaftaran['mhs_jk'] == 'p') ? 'checked': ''?>>Perempuan</td>
                <td><label for="">Alamat</label></td>
                <td><p><?= $detail_pendaftaran['mhs_alamat']?></p></td>
            </tr>
            <tr>
                <td><label for="">RT / RW</label></td>
                <td><p><?= $detail_pendaftaran['mhs_rt_rw']?></p></td>
                <td><label for="">Desa/Kelurahan</label></td>
                <td><p><?= $detail_pendaftaran['kel']?></p></td>
            </tr>
            <tr>
                <td><label for="">Kecamatan</label></td>
                <td><p><?= $detail_pendaftaran['kec']?></p></td>
                <td><label for="">Kabupaten/Kota</label></td>
                <td><p><?= $detail_pendaftaran['kab_kota']?></p></td>
            </tr>
            <tr>
                <td><label for="">Provinsi</label></td>
                <td><p><?= $detail_pendaftaran['provinsi']?></p></td>
                <td><label for="">Kode POS</label></td>
                <td><p><?= $detail_pendaftaran['kode_pos']?></p></td>
            </tr>
            <tr>
                <td><label for="">No. HP</label></td>
                <td><p><?= $detail_pendaftaran['no_hp']?></p></td>
                <td><label for="">Alamat E-Mail</label></td>
                <td><p><?= $detail_pendaftaran['email']?></p></td>
            </tr>
        </table>
        </div>
        <div class="container-row">
            <h3>Latar Belakang Pendidikan</h3>
            <table>
                <tr>
                    <td><label for="">Pendidikan Terakhir</label></td>
                    <td>
                        <input type="radio" name="pendidikan_id" value="1" <?= ($detail_pendaftaran['pendidikan_id'] == '1') ? 'checked': ''?>>SMA
                        <input type="radio" name="pendidikan_id" value="2" <?= ($detail_pendaftaran['pendidikan_id'] == '2') ? 'checked': ''?>>MA
                        <input type="radio" name="pendidikan_id" value="3" <?= ($detail_pendaftaran['pendidikan_id'] == '3') ? 'checked': ''?>>SMK
                        <input type="radio" name="pendidikan_id" value="4" <?= ($detail_pendaftaran['pendidikan_id'] == '4') ? 'checked': ''?>>Paket C
                </td>
                <td><label for="">Nama Sekolah</label></td>
                <td><p><?= $detail_pendaftaran['nama_sekolah']?></p></td>
                </tr>
                <tr>
                    <td><label for="">Nomor Seri Ijazah</label></td>
                    <td><p><?= $detail_pendaftaran['nomor_ijazah']?></p></td>
                    <td><label for="">Tahun Ijazah</label></td>
                    <td><p><?= $detail_pendaftaran['tahun_ijazah']?></p></td>
                </tr>
            </table>
        </div>
        <div class="container-row">
            <h3>Data Orang Tua / Wali</h3>
            <table>
                <tr>
                    <td><label for="">Nama Ayah Kandung</label></td>
                    <td><p><?= $detail_pendaftaran['nama_ayah']?></p></td>
                    <td><label for="">Tanggal Lahir</label></td>
                    <td colspan="2"><p><?= $detail_pendaftaran['tgl_lahir_ayah']?></p></td>
                </tr>
                <tr>
                    <td><label for="">Pendidikan Terakhir</label></td>
                    <td><p><?= $detail_pendaftaran['pendidikan_ayah']?></p></td>
                    <td><label for="">Pekerjaan</label></td>
                    <td><p><?= $detail_pendaftaran['pekerjaan_ayah']?></p></td>
                    <td><label for="">Penghasilan</label></td>
                    <td><p><?= $detail_pendaftaran['penghasilan_ayah']?></p></td>
                </tr>
                <tr>
                    <td><label for="">Nama Ibu Kandung</label></td>
                    <td><p><?= $detail_pendaftaran['nama_ibu']?></p></td>
                    <td><label for="">Tanggal Lahir</label></td>
                    <td colspan="2"><p><?= $detail_pendaftaran['tgl_lahir_ibu']?></p></td>
                </tr>
                <tr>
                    <td><label for="">Pendidikan Terakhir</label></td>
                    <td><p><?= $detail_pendaftaran['pendidikan_ibu']?></p></td>
                    <td><label for="">Pekerjaan</label></td>
                    <td><p><?= $detail_pendaftaran['pekerjaan_ibu']?></p></td>
                    <td><label for="">Penghasilan</label></td>
                    <td><p><?= $detail_pendaftaran['penghasilan_ibu']?></p></td>
                </tr>
                <tr>
                    <td><label for="">Alamat Orang Tua</label></td>
                    <td><p><?= $detail_pendaftaran['alamat_orangtua']?></p></td>
                    <td><label for="">RT / RW</label></td>
                    <td><p><?= $detail_pendaftaran['rt_rw_orangtua']?></p></td>
                    <td><label for="">Desa / Kelurahan</label></td>
                    <td><p><?= $detail_pendaftaran['kel_orangtua']?></p></td>
                </tr>
                <tr>
                    <td><label for="">Kecamatan</label></td>
                    <td><p><?= $detail_pendaftaran['kec_orangtua']?></p></td>
                    <td><label for="">Provinsi</label></td>
                    <td><p><?= $detail_pendaftaran['provinsi_orangtua']?></p></td>
                    <td><label for="">Kode POS</label></td>
                    <td><p><?= $detail_pendaftaran['kode_pos_orangtua']?></p></td>
                </tr>
            </table>
        </div>

        <div class="container-row">
            <h3>Data Pendukung Lainnya</h3>
            <table>
                <tr>
                    <td><label for="">Status Perkawinan</label></td>
                    <td>
                        <input type="radio" name="status_mhs" value="Kawin" <?= ($detail_pendaftaran['status_mhs'] == 'Kawin') ? 'checked': ''?>>Menikah
                        <input type="radio" name="status_mhs" value="Belum Kawin" <?= ($detail_pendaftaran['status_mhs'] == 'Belum Kawin') ? 'checked': ''?>>Belum Menikah
                        <input type="radio" name="status_mhs" value="Cerai Hidup" <?= ($detail_pendaftaran['status_mhs'] == 'Cerai Hidup') ? 'checked': ''?>>Cerai Hidup
                        <input type="radio" name="status_mhs" value="Cerai Mati" <?= ($detail_pendaftaran['status_mhs'] == 'Cerai Mati') ? 'checked': ''?>>Cerai Mati
                </td>
                <td><label for="">Pekerjaan</label></td>
                <td><p><?= $detail_pendaftaran['pekerjaan_mhs']?></p></td>
                </tr>
                <tr>
                    <td><label for="">Penghasilan</label></td>
                    <td><p><?= $detail_pendaftaran['penghasilan']?></p></td>
                </tr>
                <tr>
                <td><label for="">Jenis Tinggal</label></td>
                    <td>
                        <input type="radio" name="tinggal" value="1" <?= ($detail_pendaftaran['id_tinggal'] == '1') ? 'checked': ''?>>Bersama Orang Tua
                        <input type="radio" name="tinggal" value="2" <?= ($detail_pendaftaran['id_tinggal'] == '2') ? 'checked': ''?>>Wali
                        <input type="radio" name="tinggal" value="3" <?= ($detail_pendaftaran['id_tinggal'] == '3') ? 'checked': ''?>>Kos
                        <input type="radio" name="tinggal" value="4" <?= ($detail_pendaftaran['id_tinggal'] == '4') ? 'checked': ''?>>Asrama
                        <input type="radio" name="tinggal" value="5" <?= ($detail_pendaftaran['id_tinggal'] == '5') ? 'checked': ''?>>Pesantren
                        <input type="radio" name="tinggal" value="6" <?= ($detail_pendaftaran['id_tinggal'] == '6') ? 'checked': ''?>>Lainnya
                </td>
                <td><label for="">Nama Pesantren (Opsional)</label></td>
                <td><p><?= $detail_pendaftaran['nama_pesantren']?></p></td>
                </tr>
                <tr>
                    <td><label for="">Alat Transportasi</label></td>
                    <td>
                        <input type="radio" name="id_transportasi" value="1" <?= ($detail_pendaftaran['id_transportasi'] == '1') ? 'checked': ''?>>Angkutan Umum
                        <input type="radio" name="id_transportasi" value="2" <?= ($detail_pendaftaran['id_transportasi'] == '2') ? 'checked': ''?>>Ojek
                        <input type="radio" name="id_transportasi" value="3" <?= ($detail_pendaftaran['id_transportasi'] == '3') ? 'checked': ''?>>Sepeda
                        <input type="radio" name="id_transportasi" value="4" <?= ($detail_pendaftaran['id_transportasi'] == '4') ? 'checked': ''?>>Mobil Pribadi
                        <input type="radio" name="id_transportasi" value="5" <?= ($detail_pendaftaran['id_transportasi'] == '5') ? 'checked': ''?>>Sepeda Motor
                        <input type="radio" name="id_transportasi" value="6" <?= ($detail_pendaftaran['id_transportasi'] == '6') ? 'checked': ''?>>Lainnya
                </td>
                </tr>
            </table>
        </div>

        <div class="container-row">
            <h3>Pilihan Program Studi</h3>
            <table>
                <tr>
                    <td><input type="radio" name='id_prodi' value="1" <?= ($detail_pendaftaran['id_prodi'] == '1') ? 'checked' : ''?>>Manajemen Pendidikan Islam (S1)</td>
                    <td><input type="radio" name='id_prodi' value="2" <?= ($detail_pendaftaran['id_prodi'] == '2') ? 'checked' : ''?>>Komunikasi Penyiaran Islam (S1)</td>
                    <td><input type="radio" name='id_prodi' value="3" <?= ($detail_pendaftaran['id_prodi'] == '3') ? 'checked' : ''?>>Hukum Keluarga Islam (S1)</td>
                </tr>
                <tr>
                <td><input type="radio" name='is_reguler' value="Reguler" <?= ($detail_pendaftaran['is_reguler'] == 'Reguler') ? 'checked' : ''?>>Reguler</td>
                <td><input type="radio" name='is_reguler' value="Non Reguler" <?= ($detail_pendaftaran['is_reguler'] == 'Non Reguler') ? 'checked' : ''?>>Non Reguler</td>
                </tr>
            </table>
        </div>

        <div class="row-container">
              <h4>Tahu STAINU dari mana ?</h4>
              <table class="tahu">
                  <tr>
                      <td>
                      <input <?= (isset($admin_view)) ? 'disabled': ''?> type="radio" name="tahu_stainu" value="1" id="sosial_media" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '1') ? 'checked' : ''?>>Sosmed
                      <input <?= (isset($admin_view)) ? 'disabled': ''?> type="radio" name="tahu_stainu" value="2" id="dosen" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '2') ? 'checked' : ''?>>Dosen                   
                      <input <?= (isset($admin_view)) ? 'disabled': ''?> type="radio" name="tahu_stainu" value="3" id="alumni" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '3') ? 'checked' : ''?>>Alumni                    
                        <input <?= (isset($admin_view)) ? 'disabled': ''?> type="radio" name="tahu_stainu" value="4" id="via_nu" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '4') ? 'checked' : ''?>>Via NU                   
                        <input <?= (isset($admin_view)) ? 'disabled': ''?> type="radio" name="tahu_stainu" value="5" id="lainnnya" <?= (!empty($detail_pendaftaran) && $detail_pendaftaran['tahu_stainu'] == '5') ? 'checked' : ''?>>Lainnya                   
                      </td>
                  </tr>
              </table>

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

      window.print();
    </script>
</body>
</html>