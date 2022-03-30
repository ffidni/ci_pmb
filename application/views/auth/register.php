<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun - PMBB 2022</title>
    <link rel="stylesheet" href="<?= base_url('assets/auth/css/style.css')?>">
  <script src="<?= base_url('assets/bootstrap/js/jquery.min.js')?>"></script>

</head>
<body>
    <div class="container">
    <div class="title">
        <img src="<?= base_url('assets/homepage/images/logo_stainu.png')?>" alt="">
        <h3>Penerimaan Mahasiswa Baru STAINU<br>Tahun Ajaran 2022/2023</h3>
    </div>
    <div class="form">
        <?= form_open(base_url('auth/register/validate'), array("method" => "post", "onsubmit" => "return validate()"))?>
        <h3>Buat Akun</h3>
        <?php if (array_key_exists("error_register", $_SESSION)) {?>
            <h4 class="error-text error-style"><?= $_SESSION['error_register'] ?></h4>
            <?php unset($_SESSION['error_register'])?>
        <?php }?>
            <div class="form-field">
            <label for="no_hp">Nomor HP</label>
            <input type="number" name="no_hp" data-target="#hperror" class="form-control <?= (form_error('no_hp')) ? 'error' : '' ?>">
            <?= form_error("no_hp", '<p class="error-text" id="hperror">', '</p>')?>
            </div>
            <div class="form-field">
            <label for="email">Email</label>
            <input type="text" name="email" data-target="#emailerror" class="form-control <?= (form_error('email')) ? 'error' : ''?>">
            <?= form_error("email", '<p class="error-text" id="emailerror">', '</p>')?>
            </div>
            <div class="form-field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" data-target="#passworderror" class="form-control <?= (form_error('password')) ? 'error' : ''?>">
            <?= form_error("password", '<p class="error-text" id="passworderror">', '</p>')?>
            <p class="error-text message hide">Password tidak sama</p>
            </div>
            <div class="form-field">
            <label for="konfirmasi_password">Konfirmasi Password</label>
            <input type="password" data-target="#passworderror2" class="form-control <?= (form_error('password')) ? 'error' : ''?>" id="konfirmasi" name="konfirmasi_password">
            <?= form_error("password", '<p class="error-text" id="passworderror2">', '</p>')?>
            <p class="error-text message hide" id="message">Password tidak sama</p>
            </div>

            <div class="buttons">
            <input type="submit" class="btn" value="Daftar">

            </div>
            <p class="already">Sudah punya akun? <a href="<?= base_url('auth/login')?>">Masuk</a></p>

        </form>
    </div>
    </div>

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
    </script>


</body>
</html>
