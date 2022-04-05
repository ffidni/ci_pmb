<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="title">
            <img src="<?= base_url('assets/auth/images/key.jpg')?>" alt="">
            <h3>Reset Kata Sandi<br><?= $email?></h3>
        </div>
        <?= form_open(base_url('admin/reset_process'))?>
            <input type="text" class="hidden" value="<?= $user_id?>">
            <div class="row">
                <label for="">Kata Sandi Baru</label>
                <input type="password" class="form-control" name="password">
                <?= form_error('password')?>
            </div>
            <input class="btn" value="Ubah">
        </form>
    </div>
</body>
</html>