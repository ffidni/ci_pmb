<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/homepage/css/styles.css')?>">
</head>
<body>
    <?php $detail_pendaftaran = $this->session->userdata("detail_pendaftaran")?>

    <div class="wrapper hide">
        <!--Top menu -->
        <div class="sidebar">
            <ul>
                <li>
                    <div class="profile">
                        <img src="<?= base_url('assets/homepage/images/account.png')?>" alt="">
                        <?php if (!empty($detail_pendaftaran)) {?>
                            <h4><?= $detail_pendaftaran['mhs_nama']?></h4>
                        <?php } else {?>
                            <h4>Belum Terdaftar</h4>
                        <?php }?>
                    </div>
                </li>
                <li>
                    <?php if (!empty($detail_pendaftaran)) {?>
                        <a href="<?= base_url('form/daftar/detail')?>"  class="sidebar-button">Detail Pendaftaran</a>
                                
                    <?php } else {?>
                        <a href="<?= base_url('form/daftar')?>"  class="sidebar-button">Form Pendaftaran</a>   
                    <?php }?>
                </li>
                <li>
                    <a href=""  class="sidebar-button">Pengaturan Akun</a>           
                </li>
                <?php if ($this->session->userdata('hak_akses') == 'admin') {?>
                    <li>
                        <a href="<?= base_url('admin/verifikasi')?>"  class="sidebar-button">Verifikasi Data</a>           
                    </li>
                <?php }?>   
            </ul>
        </div>
    </div>

    <nav class="nav-header">
        <div class="header-container">
        <div class="menu">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            <div class="title">
                <img src="<?= base_url('assets/homepage/images/logo_stainu.png')?>" alt="">
                <h3>STAINU Penerimaan Mahasiswa Baru 2022/2023</h3>
            </div>
            <div class="links">
                <ul>
                        <li>
                            <h4><a href="<?= base_url()?>">Home</a></h4>
                        </li>
                    <li>
                            <h4><a href="https://stainu-tasikmalaya.ac.id/2021/">Website Stainu</a></h4>
                    </li>
                    <li>
                        <h4><a href="<?= base_url('auth/logout')?>">Keluar</a></h4>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="<?= base_url('assets/homepage/js/scripts.js')?>"></script>
</body>
</html>