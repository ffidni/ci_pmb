<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/homepage/css/styles.css')?>">
</head>
<body class="home-body">
    <section>
    <div class="home-container">
        <?php if (empty($detail_pendaftaran)) {?>
            <h1>Daftarkan dirimu sekarang!</h1>
        <?php } else {?>
            <h1>Selamat!<br>Kamu sudah terdaftar.</h1>
        <?php }?>
        <div class="buttons">
            
            <?php if (!empty($detail_pendaftaran)) {?>
                <a href="<?= base_url('form/daftar_edit')?>" class="btn"><span class="mdi mdi-note"></span>Data Pendaftaran-mu</a>
                <a href="" class="btn"><span class="mdi mdi-information-variant"></span>Info Lebih Lanjut</a>
            <?php } else {?>
                <a href="<?= base_url('form/daftar')?>" class="btn"><span class="mdi mdi-note"></span>Daftar</a>
                <?php }?>
        </div>
    </div>
    </section>


</body>
</html>