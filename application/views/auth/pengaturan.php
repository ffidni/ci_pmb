<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/auth/css/pengaturan.css')?>">
    <script src="<?= base_url('assets/bootstrap/js/jquery.min.js')?>"></script>
</head>
<body>
<div class="notif">
        <div class="content">
            <p><?= (isset($update_status) && $update_status) ? "Data akun berhasil diperbarui." : "Memperbarui akun gagal. Pastikan anda terkoneksi dengan internet."?></p>
        </div>
    </div>
    <?= form_open(base_url(($ubah_pass) ? 'auth/ubah/pass': 'auth/ubah/detail'), array("id" => "form_pengaturan", "method" => "POST", "onsubmit" => "return validate()"))?>
    <div class="container">
    <div class="profile settings">
        <?php if ($ubah_pass) {?>
            <img src="<?= base_url('assets/auth/images/key.jpg')?>" alt="">
            <h3>Ubah Kata Sandi</h3>
        <?php } else {?>
            <img src="<?= base_url('assets/auth/images/account.jpg')?>" alt="">
            <h3>Pengaturan Akun</h3>
        <?php }?>
    </div>

    <div class="details">
    <?php if ($ubah_pass) {?>
        <div class="row">
            <p>Kata Sandi Lama</p>
            <input type="password" class="form-control <?= (form_error('passwordLama')) ? 'error' : ''?>" data-target="#oldpasserror" name="passwordLama">
            <?= form_error("passwordLama", '<p class="error-text" id="oldpasserror">', '</p>')?>
        </div>
        <div class="row">
            <p>Kata Sandi Baru</p>
            <input type="password" class="form-control <?= (form_error('password')) ? 'error' : ''?>" data-target="#passworderror" id="password" name="password">
            <?= form_error("password", '<p class="error-text" id="passworderror">', '</p>')?>
            <p class="error-text message hide">Password tidak sama.</p>
        </div>
        <div class="row">
            <p>Konfirmasi Kata Sandi Baru</p>
            <input type="password" class="form-control <?= (form_error('konfirmasi')) ? 'error' : ''?>" data-target="#konfirmpassword" id="konfirmasi" name="konfirmasi">
            <?= form_error("konfirmasi", '<p class="error-text" id="konfirmpassword">', '</p>')?>
            <p class="error-text message hide">Password tidak sama.</p>
        </div>
        <?php } else {?>
            <div class="row">
            <p>Nomor HP</p>
            <input type="number" value="<?= $this->session->userdata('no_hp') ?>" class="form-control <?= (form_error('no_hp')) ? 'error' : ''?>" name="no_hp" data-target="#hperror">
            <?= form_error("no_hp", '<p class="error-text" id="hperror">', '</p>')?>
        </div>
        <div class="row">
            <p>Email</p>
            <input type="text"  value="<?= $this->session->userdata('email') ?>" class="form-control <?= (form_error('email')) ? 'error' : ''?>" name="email" data-target="#emailerror">
            <?= form_error("email", '<p class="error-text" id="emailerror">', '</p>')?>
        </div>
        <?php }?>
    </div>
    <div class="btn-navigation">
    <?php if ($ubah_pass) {?>
            <a href="<?= base_url('auth/pengaturan')?>" class="btn settings-btn">Ubah Details</a>
            <a href="javascript:document.getElementById('form_pengaturan').submit();" class="btn settings-btn">Perbarui</a>
        <?php } else {?>
            <a href="<?= base_url('auth/pengaturan/sandi')?>" class="btn settings-btn">Ubah Kata Sandi</a>
            <a href="javascript:document.getElementById('form_pengaturan').submit();" class="btn settings-btn">Perbarui</a>
        <?php }?>
    </div>
    </div>
    </form>

    <script>
        $('#password, #konfirmasi').on('keyup', () => {
            const errors = document.querySelectorAll('.message');
            if ($('#password').val() !== $('#konfirmasi').val()){
                errors.forEach((error) => {
                    error.classList.remove("hide");
                });
                $('#password').addClass("error");
                $('#konfirmasi').addClass("error");
            } else {
                errors.forEach((error) => {
                    error.classList.add("hide");
                });
                $('#password').removeClass("error");
                $('#konfirmasi').removeClass("error");
            }
        });

        $('input').keydown(function () {
            console.log(this.classList.contains("error"));
            if (this.classList.contains("error")){
                this.classList.remove("error");
                
                
                if (this.dataset.target) {
                    $(this.dataset.target).addClass("hide");
                }
                
            }
        });

        function validate(){
            const errors = document.querySelectorAll(".error");
            if (errors.length != 0){
                return false;
            }

            return true;
        }

        <?php if (isset($update_status)) {?> 
                if (!$update_status){
                    $('.notif').css({"background-color", "rgb(206, 103, 103)", "border", "rgb(169, 85, 85)"});
                }
                $('.notif').show();
                var count = 1;
                var interval = setInterval(() => {
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
    </script>
</body>
</html>