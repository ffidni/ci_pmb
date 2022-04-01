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