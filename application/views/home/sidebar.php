<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <link rel="icon" href="<?= base_url('assets/homepage/images/logo_stainu.png')?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('assets/homepage/css/styles.css')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
</head>
<body>
    <?php $detail_pendaftaran = $this->session->userdata("detail_pendaftaran")?>
    <div class="wrapper">

        <div class="sidebar">
            <ul>
                <li>
                <span class="close-sidebar mdi mdi-menu-open"></span>
                </li>
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
                    <a href="<?= base_url()?>" class="sidebar-button responsive-visibility">Home</a>
                </li>
                <li>
                    <a href="https://stainu-tasikmalaya.ac.id/2021/" class="sidebar-button responsive-visibility">Website STAINU</a>
                </li>
                <li>
                    <?php if (!empty($detail_pendaftaran) && $this->session->userdata('hak_akses') == 'user') {?>
                        <a href="<?= base_url('form/daftar/detail')?>"  class="sidebar-button">Detail Pendaftaran</a>
                                
                    <?php } else if ($this->session->userdata("hak_akses") == 'user'){?>
                        <a href="<?= base_url('form/daftar')?>"  class="sidebar-button">Form Pendaftaran</a>   
                    <?php }?>
                </li>
                <?php if (!empty($detail_pendaftaran) && $this->session->userdata("hak_akses") == "user") {?>
                    <li>
                        <a href="<?= base_url('main/pembayaran')?>" class="sidebar-button">Konfirmasi Pembayaran</a>
                    </li>
                    <li>
                        <a href="<?= base_url('main/dokumen')?>" class="sidebar-button">Lengkapi Dokumen</a>
                    </li>
                <?php }?>

                <li>
                    <a href="<?= base_url('auth/pengaturan')?>"  class="sidebar-button">Pengaturan Akun</a>           
                </li>
                <?php if ($this->session->userdata('hak_akses') == 'admin') {?>
                    <li>
                        <a href="<?= base_url('admin/verifikasi/pengguna')?>"  class="sidebar-button">Verifikasi Data</a>           
                    </li>
                    <li>
                        <a href="<?= base_url('admin/stats')?>" class="sidebar-button">Statistik</a>
                    </li>
                <?php }?>   
                <li>
                    <a href="<?= base_url('auth/logout')?>" class="sidebar-button responsive-visibility last" >Keluar</a>
                </li>
            </ul>
        </div>
    </div>


    <nav class="nav-header dont-print">
        <div class="header-container">
        <?php if (!isset($is_print)) {?>
        <div class="menu">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
        <?php }?>
            <div class="title">
                <img src="<?= base_url('assets/homepage/images/logo_stainu.png')?>" alt="">
                <h3>STAINU Penerimaan Mahasiswa Baru 2022/2023</h3>
            </div>
            <?php if (!isset($is_print)) {?>
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
            <?php }?>
        </div>
    </nav>
    <script>
    const menuIcon = document.body.querySelector('.menu');
    const closeIcon = document.getElementsByClassName("close-sidebar")[0];
    const sidebar = document.body.querySelector('.wrapper');

    closeIcon.addEventListener("click", () => {

        sidebar.classList.toggle("active")
    });

    menuIcon.addEventListener("click", () => {

        sidebar.classList.toggle("active")
        

    });

    </script>
</body>
</html>