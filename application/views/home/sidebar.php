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

    <div class="wrapper hide">
        <!--Top menu -->
        <div class="sidebar">
            <ul>
                <li>
                    <span>Image</span>
                    <span>Text</span>
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
                        <h4><a href="">Website Stainu</a></h4>
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