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
        <?= form_open(base_url('auth/validateLogin'), array("method" => "post"))?>
        <h3>Akses Akun</h3>
            <div class="form-field">
            <label for="no_hp">Nomor HP</label>
            <input type="number" name="no_hp" class="form-control">
            <p class="error"><?= form_erorr('no_hp')?></p>
            </div>
            <div class="form-field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <p class="error"><?= form_erorr('password')?></p>
            </div>
            <div class="buttons">
            <input type="submit" href="" class="btn" value="Masuk">
            </div>
            <p class="already">Belum punya akun? <a href="<?= base_url('auth/register')?>">Daftar</a></p>
        </form>
    </div>
    </div>



</body>
</html>
