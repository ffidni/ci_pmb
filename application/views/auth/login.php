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
<img src="<?= base_url('assets/auth/images/bg.jpg')?>" alt="" id="bg">
    <div class="container">
<div class="spacer"></div>

    <div class="title">
        <img src="<?= base_url('assets/homepage/images/logo_stainu.png')?>" alt="">
        <h3>Penerimaan Mahasiswa Baru STAINU<br>Tahun Ajaran 2022/2023</h3>
    </div>
    <div class="form">
        <?= form_open(base_url('auth/login/validate'), array("method" => "post"))?>
        <h3>Akses Akun</h3>
        <?php if (array_key_exists("error_login", $_SESSION)) {?>
            <h4 class="error-text error-style"><?= $_SESSION['error_login'] ?></h4>
            <?php unset($_SESSION['error_login'])?>
        <?php }?>
            <div class="form-field">
            <label for="no_hp">Nomor HP</label>
            <input type="number" name="no_hp" data-target="#hperror" class="form-control <?= (form_error('no_hp')) ? 'error' : '' ?>">
            <p class="error-text"><?= form_error('no_hp', '<p class="error-text" id="hperror">', '</p>')?></p>
            </div>
            <div class="form-field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" data-target="#passworderror" class="form-control <?= (form_error('password')) ? 'error' : '' ?>">
            <p class="error-text"><?= form_error('password', '<p class="error-text" id="passworderror">')?></p>
            </div>
            <div class="buttons">
            <input type="submit" href="" class="btn" value="Masuk">
            </div>
            <p class="already">Belum punya akun? <a href="<?= base_url('auth/register')?>">Daftar</a></p>
        </form>
    </div>
    </div>

    <script>

        $('input').keydown(function () {
            if (this.classList.contains("error")){
                this.classList.remove("error");
                
                if (this.dataset.target) {
                    $(this.dataset.target).addClass("hide");
                }
                
            }
        });
    </script>

</body>
</html>
