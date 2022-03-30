<!DOCTYPE html>
<html lang="en">
<head>
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
                <span class="close-sidebar">&times;</span>
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
                    <?php if (!empty($detail_pendaftaran)) {?>
                        <a href="<?= base_url('form/daftar/detail')?>"  class="sidebar-button">Detail Pendaftaran</a>
                                
                    <?php } else {?>
                        <a href="<?= base_url('form/daftar')?>"  class="sidebar-button">Form Pendaftaran</a>   
                    <?php }?>
                </li>
                <li>
                    <a href="<?= base_url('auth/pengaturan')?>"  class="sidebar-button">Pengaturan Akun</a>           
                </li>
                <?php if ($this->session->userdata('hak_akses') == 'admin') {?>
                    <li>
                        <a href="<?= base_url('admin/verifikasi')?>"  class="sidebar-button">Verifikasi Data</a>           
                    </li>
                <?php }?>   
                <li>
                    <a href="<?= base_url('auth/logout')?>" class="sidebar-button responsive-visibility" >Keluar</a>
                </li>
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
    <script>
    const menuIcon = document.body.querySelector('.menu');
    const closeIcon = document.getElementsByClassName("close-sidebar")[0];
    const sidebar = document.body.querySelector('.wrapper');
    const navbar = document.body.querySelector('.nav-header');

    closeIcon.addEventListener("click", () => {
        sidebar.classList.toggle("hide");
        sidebar.classList.toggle("show");        
    });
    menuIcon.addEventListener("click", () => {
        sidebar.classList.toggle("hide");
        sidebar.classList.toggle("show");
    });
    </script>
</body>
</html>